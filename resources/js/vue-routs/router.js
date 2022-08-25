import vueRouter from 'vue-router';
import Vue from 'vue';
import Products from "../components/Products";

Vue.use(vueRouter);

export default new vueRouter( {
    routes: [
        {
            path: "/products",
            component: Products
        }
    ],
    mode: "history",
})
