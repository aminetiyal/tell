<?php

Route::namespace('Aminetiyal\Tell\Http\Controllers')->middleware(['web'])->as('tell.')->group(function () {

    Route::get('posts/{any}', 'SpaController@index')->where('any', '.*');
    Route::apiResource('posts', 'PostController');

});
