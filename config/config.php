<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'users' => [
        'table' => 'users',
        'model' => config('auth.providers.users.model')
    ],

    'storage' => [
        'disk' => 'local',
        'path' => 'public/tell/images'
    ]
];