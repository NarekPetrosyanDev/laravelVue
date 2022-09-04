require('../bootstrap');

window.Vue = require('vue').default;


import 'bootstrap';
import router from "./vue-routs/router";
import axios from "axios";
import Vuelidate from "vuelidate";
import store from './store'

Vue.use(Vuelidate)

Vue.component('AdminApp', require('./components/AdminApp.vue').default);


const app = new Vue({
    el: '#adminApp',
    router: router,
    axios: axios,
    store: store,
    // render: h => h('AdminApp'),
});
