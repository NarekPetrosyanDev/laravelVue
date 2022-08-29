import vueRouter from 'vue-router';
import Vue from 'vue';
import Products from "../components/Products";
import AdminMain from "../components/AdminMain";
import Product from "../components/Product";

Vue.use(vueRouter);


export default new vueRouter( {
    routes: [
        {
            path: "/admin",
            component: AdminMain,
        },
        {
            path: '/admin/products',
            component: Products,
            name: 'products',
        },
        {
            path: '/admin/products/create',
            component: Product,
            name: 'products-create',
        },
    ],
    mode: "history",
})
