<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'bulletin-board');

// Project repository
set('repository', 'git@github.com:YaroslavMelnychenko/bulletin-board.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Npm
set('bin/npm', function () {
    return run('which npm');
});

// Shared files/dirs between deploys 
add('shared_files', [
    '.env',
]);

add('shared_dirs', [
    'storage',
    'vendor',
    'node_modules',
]);

// Writable dirs by web server 
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// Hosts
host('amazon')
    ->user('deployer')
    ->configFile('~/.ssh/config')
    ->set('deploy_path', '/var/www/bulletin-board.yaroslav-melnychenko.pp.ua');    
    
// Tasks
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php7.2-fpm.service');
})->desc('Restart PHP-FPM service');

after('deploy:symlink', 'php-fpm:restart');

// Upload .env.production
task('upload:env', function () {
    runLocally('rsync -v -e ssh .env.production deployer@amazon:{{deploy_path}}/shared/.env');
})->desc('Environment setup');

// Generate application key
task('artisan:key:generate', function () {
    run('{{bin/php}} {{release_path}}/artisan key:generate --ansi');
});

// Refresh migrations & seed
task('artisan:migrate:refresh', function () {
    run('{{bin/php}} {{release_path}}/artisan migrate:refresh --force');
});

// Clear config cache
task('artisan:config:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan config:clear');
});

desc('Install npm packages');
task('npm:install', function () {
    if (has('previous_release')) {
        if (test('[ -d {{previous_release}}/node_modules ]')) {
            run('cp -R {{previous_release}}/node_modules {{release_path}}');
        }
    }
    run("cd {{release_path}} && {{bin/npm}} install");
});

desc('Npm production build');
task('npm:run:prod', function () {
    run("cd {{release_path}} && {{bin/npm}} run prod");
});

// Wipe storage data
task('artisan:storage:wipe', function () {
    run('{{bin/php}} {{release_path}}/artisan storage:wipe');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'upload:env',
    'deploy:shared',
    'deploy:vendors',
    'npm:install',
    'npm:run:prod',
    'deploy:writable',
    'artisan:key:generate',
    'artisan:storage:link',
    'artisan:view:clear',
    //'artisan:migrate:refresh',
    'artisan:migrate',
    'deploy:symlink',
    'php-fpm:restart',
    'artisan:cache:clear',
    'artisan:config:clear',
    'deploy:unlock',
    'cleanup',
]);