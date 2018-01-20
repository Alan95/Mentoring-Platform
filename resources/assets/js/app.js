
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');
window.Laravel = { csrfToken: $('meta[name=csrf-token]').attr("content") };
require('./bootstrap');

window.Vue = require('vue');
import VueParticles from 'vue-particles'
Vue.use(VueParticles)



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('profile', require('./components/Profile.vue'));
Vue.component('chat', require('./components/Chat.vue'));
Vue.component('profilecard', require('./components/ProfileCard.vue'));

const app = new Vue({
    el: '#app'
});

