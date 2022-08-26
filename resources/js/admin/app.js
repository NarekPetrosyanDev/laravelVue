require('../bootstrap');

window.Vue = require('vue').default;


import 'bootstrap';
import router from "./vue-routs/router";
import axios from "axios";

Vue.component('v-header', require('./components/Header.vue').default);
Vue.component('v-aside', require('./components/Aside.vue').default);
Vue.component('admin-products', require('./components/Products.vue').default);
Vue.component('admin-main', require('./components/AdminMain.vue').default);


const app = new Vue({
    el: '#adminApp',
    router: router,
    axios: axios
});
