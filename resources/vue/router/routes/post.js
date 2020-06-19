import authMiddleware from '../middlewares/auth';

export const postRoutes = [
    {
        path: '/',
        name: 'posts.index',
        component: require('../../views/Posts/Index').default
    },
    {
        path: '/create',
        name: 'posts.create',
        component: require('../../views/Posts/Create').default,
        meta: {middleware: [authMiddleware]}
    },
    {
        path: '/:post',
        name: 'posts.show',
        component: require('../../views/Posts/Show').default
    },
    {
        path: '/:post/edit',
        name: 'posts.edit',
        component: require('../../views/Posts/Edit').default,
        meta: {middleware: [authMiddleware]}
    }
];
