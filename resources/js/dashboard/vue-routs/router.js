import vueRouter from 'vue-router';
import Vue from 'vue';
import HomePage from "../components/HomePage";
import Cart from "../components/Cart";

Vue.use(vueRouter);

export default new vueRouter( {
    routes: [
        {
            path: "/",
            component: HomePage,
            name: 'home',
            props: true
        },
        {
            path: "/cart",
            component: Cart,
            name: 'cart',
            props: true
        },
        {
            path: "/login",
            component: Login,
            name: 'login',
            props: true
        },
        {
            path: "/register",
            component: Register,
            name: 'register',
            props: true
        },
    ],
    mode: "history",
});
