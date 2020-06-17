import Vue from 'vue'
import VueRouter from 'vue-router'
import loadMiddleware from "./loadMiddleware";
import authMiddleware from "./middlewares/auth";
import guestMiddleware from "./middlewares/guest";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'posts.index',
        component: require('../views/Posts/Index').default
    },
    {
        path: '/login',
        name: 'login',
        component: require('../views/Auth/Login').default,
        meta: {middleware: [guestMiddleware]}
    },
    {
        path: '/create',
        name: 'posts.create',
        component: require('../views/Posts/Create').default,
        meta: {middleware: [authMiddleware]}
    },
    {
        path: '/:post',
        name: 'posts.show',
        component: require('../views/Posts/Show').default
    },
    {
        path: '/:post/edit',
        name: 'posts.edit',
        component: require('../views/Posts/Edit').default,
        meta: {middleware: [authMiddleware]}
    },
    {
        path: '/tags/:tag',
        name: 'tags.posts',
        component: require('../views/Tags/Posts').default,
    }
]

const router = new VueRouter({
    mode: 'history',
    base: window.Laravel.routes.prefix,
    routes
})

router.beforeEach(loadMiddleware);

export default router
