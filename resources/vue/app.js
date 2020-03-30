require('./bootstrap');

import Vue from 'vue';
import App from './App';

import routes from './routes';

import VueRouter from 'vue-router';
import VueMaterial from 'vue-material';
import Vuelidate from 'vuelidate';

Vue.use(VueRouter);
Vue.use(VueMaterial);
Vue.use(Vuelidate);

const router = new VueRouter({
    mode: 'history',
    routes
});

var Root = new Vue({
    render: h => h(App),
    router
}).$mount('#app');

window.App = Root.$children[0];