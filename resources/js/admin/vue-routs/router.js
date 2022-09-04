import vueRouter from 'vue-router';
import Vue from 'vue';
import Products from "../components/Products";
import AdminMain from "../components/AdminMain";
import Product from "../components/Product";
import Categories from "../components/Categories";
import Category from "../components/Category";
import Brands from "../components/Brands";
import Brand from "../components/Brand";

Vue.use(vueRouter);


export default new vueRouter({
    routes: [
        {
            path: "/admin/",
            component: AdminMain,
            name: 'admin-main',
            props: true
        },
        {
            path: '/admin/products',
            component: Products,
            name: 'products',
            props: true
        },
        {
            path: '/admin/products/create',
            component: Product,
            name: 'products-create',
            props: true
        },
        {
            path: '/admin/products/:id/edit',
            component: Product,
            name: 'products-update',
            props: true
        },
        {
            path: '/admin/categories',
            component: Categories,
            name: 'categories',
            props: true
        },
        {
            path: '/admin/categories/create',
            component: Category,
            name: 'categories-create',
            props: true
        },
        {
            path: '/admin/categories/:id/edit',
            component: Category,
            name: 'categories-update',
            props: true
        },
        {
            path: '/admin/brands',
            component: Brands,
            name: 'brands',
            props: true
        },
        {
            path: '/admin/brands/create',
            component: Brand,
            name: 'brands-create',
            props: true
        },
        {
            path: '/admin/brands/:id/edit',
            component: Brand,
            name: 'brands-update',
            props: true
        }
    ],
    mode: "history",
})
