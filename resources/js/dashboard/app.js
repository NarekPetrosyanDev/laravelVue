require('../bootstrap');

window.Vue = require('vue').default;


Vue.component('MainApp', require('./components/MainApp.vue').default);

import 'bootstrap';
import router from "./vue-routs/router";

const app = new Vue({
    el: '#app',
    router: router,
});
