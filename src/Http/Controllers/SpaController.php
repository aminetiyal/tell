<?php

namespace Aminetiyal\Tell\Http\Controllers;

class SpaController
{

    public function index()
    {
        $javascriptVars = [
            'authenticated' => auth()->check(),
            'user' => auth()->user(),
            'nav' => config('tell.nav'),
            'pages' =>  config('tell.pages'),
            'infiniteLoading' =>  config('tell.infiniteLoading'),
            'routes' => [
                'prefix' => config('tell.prefix'),
                'api.tell.base' => route('api.tell.base'),
                'api.tell.images.store' => route('api.tell.images.store')
            ]
        ];

        return view('tell::spa', compact('javascriptVars'));
    }
}
