export const tagRoutes = [
    {
        path: '/tags/manage',
        name: 'tags.manage',
        component: require('../../views/Tags/Manage').default,
    },
    {
        path: '/tags/:tag',
        name: 'tags.posts',
        component: require('../../views/Tags/Posts').default,
    }
];
