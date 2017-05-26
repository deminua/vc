
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//import VueWebsocket from "vue-websocket";

window.Vue = require('vue');
Vue.use(require('vue-resource'));

import VueClip from 'vue-clip';
Vue.use(VueClip);

//Vue.component('vclip', require('./components/vclip.vue'));
Vue.component('vclip2', require('./components/vclip2.vue'));

import Users from './components/Users.vue';

//Vue.component('users', require('./components/Users.vue'));

//Vue.use(VueClip);
Vue.http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;

const app = new Vue({
	el: '#app',
	components: { Users }
});
