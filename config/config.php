<?php


return [
    /**
     * to disable title or logo just set the value to false
     */
    'nav' => [
        'title' => 'TELL',
        'logo' => '/vendor/tell/logo.svg'
    ],

    /**
     * leave empty to mount the app on the main url: 'prefix' => ''
     * otherwise put whatever uri you want "blog", "v1/blog"
     */
    'prefix' => 'blog',

    'users' => [
        'guard' => 'sanctum',
        'model' => config('auth.providers.users.model')
    ],

    'storage' => [
        'disk' => 'local',
        'path' => 'public/tell/images'
    ],

    /**
     * to add extra pages related to a tag just follow the example bellow
     */
    'pages' => [
        // ['title' => 'Laravel','tag' => 'Laravel']
    ],

    /**
     * Costumize the sentences shown while loading posts
     */
    'infiniteLoading' => [
        'noMore' => 'No more posts',
        'noResults' => 'No results'
    ],

    /** Google Analytics Tracking Id*/
    'google_analytics_id' => '',
];
