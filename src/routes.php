<?php

Route::namespace('Aminetiyal\Tell\Http\Controllers')
    ->middleware(['web'])
    ->as('tell.')
    ->prefix('tell')
    ->group(function () {
        Route::get('/', 'SpaController@index')->name('spa.page');
        Route::get('{any}', 'SpaController@index')->where('any', '.*')->name('spa');
    });

Route::namespace('Aminetiyal\Tell\Http\Controllers')
    ->middleware(['web'])
    ->as('api.tell.')
    ->prefix('api/tell')
    ->group(function () {
        Route::apiResource('posts', 'PostController')
            ->parameter('posts', 'post:slug');

        Route::apiResource('tags', 'TagController')
            ->parameter('tags', 'tag:slug');
    });
