<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Models\TellPost;

class SpaController
{

    public function index()
    {
        $javascriptVars = $this->getJavascriptVariables();

        return view('tell::spa', compact('javascriptVars'));
    }

    public function showPost(TellPost $post)
    {
        $javascriptVars = $this->getJavascriptVariables();

        return view('tell::spa', compact('javascriptVars', 'post'));
    }

    public function getJavascriptVariables()
    {
        return [
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
    }
}
