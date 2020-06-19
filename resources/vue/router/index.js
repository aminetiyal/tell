import Vue from 'vue'
import VueRouter from 'vue-router'
import loadMiddleware from "./loadMiddleware";
import { postRoutes } from './routes/post';
import { tagRoutes } from './routes/tag';
import { authRoutes } from './routes/auth';

Vue.use(VueRouter);

const routes = [
    ...authRoutes,
    ...tagRoutes,
    ...postRoutes,
]

const router = new VueRouter({
    mode: 'history',
    base: window.Laravel.routes.prefix,
    routes
})

router.beforeEach(loadMiddleware);

export default router
