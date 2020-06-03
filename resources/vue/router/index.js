import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import loadMiddleware from "./loadMiddleware";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        //meta: {middleware: [authMiddleware]}
    },
    {
        path: '/tell',
        name: 'posts.index',
        component: require('../views/Posts/Index').default
    },
    {
        path: '/tell/create',
        name: 'posts.create',
        component: require('../views/Posts/Create').default
    },
    {
        path: '/tell/:post',
        name: 'posts.show',
        component: require('../views/Posts/Show').default
    },
    {
        path: '/tell/:post/edit',
        name: 'posts.edit',
        component: require('../views/Posts/Edit').default
    }
]

const router = new VueRouter({
    mode: 'history', routes
})



router.beforeEach(loadMiddleware);

export default router
