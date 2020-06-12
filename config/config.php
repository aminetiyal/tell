<?php


return [
    /**
     * leave empty to mount the app on the main url: 'prefix' => ''
     * otherwise put whatever uri you want "blog", "v1/blog"
     */
    'prefix' => 'blog',

    'users' => [
        'table' => 'users',
        'model' => config('auth.providers.users.model')
    ],

    'storage' => [
        'disk' => 'local',
        'path' => 'public/tell/images'
    ]
];