import guestMiddleware from '../middlewares/guest';

export const authRoutes = [
    {
        path: '/login',
        name: 'login',
        component: require('../../views/Auth/Login').default,
        meta: {middleware: [guestMiddleware]}
    }
];
