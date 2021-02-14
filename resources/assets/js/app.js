require('./bootstrap');
import Vue from 'vue';
window.Vue = Vue;

import App from './components/App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    render: h => h(App)
});