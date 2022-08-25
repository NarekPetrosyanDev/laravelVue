require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-header', require('./components/Header.vue').default);

import 'bootstrap';
import router from "./vue-routs/router";

const app = new Vue({
    el: '#app',
    router: router,
});
