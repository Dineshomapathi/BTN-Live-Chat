
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-app', require('./components/ChatApp.vue'));
Vue.component('chat-app2', require('./components/ChatApp2.vue'));

const app = new Vue({
    el: '#app'
});

import VueInitialsImg from 'vue-initials-img';

Vue.use(VueInitialsImg);

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
        // return moment(String(value)).format('DD-MM-YYYY hh:mm a')
        return moment.utc(String(value)).local().format('DD-MM-YYYY h:mm a')
        
    }
});
