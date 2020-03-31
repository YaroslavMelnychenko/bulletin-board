import Auth from './views/auth/Auth';
import Error404 from './views/error404/Error404';
import Home from './views/home/Home';
import Profile from './views/profile/Profile';

export default [
    { name: 'Home', path: '/', component: Home },
    { name: 'Auth', path: '/auth', component: Auth },
    { name: 'Profile', path: '/profile', component: Profile },

    { name: 'Error404', path: '*', component: Error404 }
];