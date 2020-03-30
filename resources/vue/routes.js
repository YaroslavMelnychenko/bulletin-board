import Auth from './views/auth/Auth';
import Error404 from './views/error404/Error404';
import Home from './views/home/Home';
import Profile from './views/profile/Profile';

export default [
    { name: 'Auth', path: '/', component: Auth },
    { name: 'Home', path: '/home', component: Home },
    { name: 'Profile', path: '/profile', component: Profile },

    { name: 'Error404', path: '*', component: Error404 }
];