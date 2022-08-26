import vueRouter from 'vue-router';
import Vue from 'vue';
import Products from "../components/Products";
import AdminMain from "../components/AdminMain";

Vue.use(vueRouter);


export default new vueRouter( {
    routes: [
        {
            path: "admin",
            component: AdminMain
        },
        {
            path: "/admin/products",
            component: Products
        },
    ],
    mode: "history",
})
