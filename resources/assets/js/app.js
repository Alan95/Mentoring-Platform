
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

import VModal from 'vue-js-modal';
Vue.use(VModal)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('profile', require('./components/Profile.vue'));
Vue.component('profilecard', require('./components/ProfileCard.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));



const app = new Vue({
    el: '#app',

    data: {
        chats: []
    },

    created() {
        this.fetchChats();
        Echo.private('chat')
            .listen('ChatSent', (e) => {
            this.chats.push({
            chat: e.chats.chat,
            user: e.user
        });
    });
    },
    methods: {
        fetchChats() {
            axios.get('/chats').then(response => {
                this.chats = response.data;
        });
        },

        addChat(chates) {
            this.chats.push(chates);
            console.log(chates);
            axios.post('/chats', chates).then(response => {
                console.log(response.data);
            });
        }
    }
});
