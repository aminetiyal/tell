import Vue from 'vue'
import VueRouter from 'vue-router'
import loadMiddleware from "./loadMiddleware";
import authMiddleware from "./middlewares/auth";

Vue.use(VueRouter)

const routes = [
    {
        path: '/tell',
        name: 'posts.index',
        component: require('../views/Posts/Index').default
    },
    {
        path: '/tell/create',
        name: 'posts.create',
        component: require('../views/Posts/Create').default,
        meta: {middleware: [authMiddleware]}
    },
    {
        path: '/tell/:post',
        name: 'posts.show',
        component: require('../views/Posts/Show').default
    },
    {
        path: '/tell/:post/edit',
        name: 'posts.edit',
        component: require('../views/Posts/Edit').default,
        meta: {middleware: [authMiddleware]}
    }
]

const router = new VueRouter({
    mode: 'history', routes
})



router.beforeEach(loadMiddleware);

export default router
