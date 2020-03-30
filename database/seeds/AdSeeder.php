<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Ad;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');

        $adCounter = 0;

        do {
            $header = "Fake :). ".$faker->realText(rand(10, 100));            
            $text = "Fake :). ".$faker->realText(rand(100, 500));
            $userId = rand(1, env('SEED_USERS'));

            $ad = new Ad();
            $ad->header = $header;
            $ad->text = $text;
            $ad->user_id = $userId;
            $ad->save();

            $adCounter++;
        } while($adCounter < env('SEED_ADS'));
    }
}
