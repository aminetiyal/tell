<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Aminetiyal\Tell\Http\Controllers')
    ->middleware(['web'])
    ->as('api.tell.')
    ->prefix('api/' . config('tell.prefix'))
    ->group(function () {
        Route::get('/', fn () => '')->name('base');

        Route::apiResource('posts', 'PostController')->parameter('posts', 'post:slug');

        Route::post('/images', 'ImageController@store')->name('images.store');

        Route::apiResource('tags', 'TagController')->parameter('tags', 'tag:slug');
        Route::get('/tags/{tag:name}/posts', 'TagController@posts')->name('tags.posts.index');
    });


Route::namespace('Aminetiyal\Tell\Http\Controllers')
    ->middleware(['web'])
    ->as('tell.')
    ->prefix(config('tell.prefix'))
    ->group(function () {
        Route::get('/', 'SpaController@index')->name('spa.page');
        Route::get('{any}', 'SpaController@index')->where('any', '.*')->name('spa');
    });
