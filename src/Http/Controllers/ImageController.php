<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Requests\Posts\StorePostRequest;
use Aminetiyal\Tell\Http\Requests\Posts\UpdatePostRequest;
use Aminetiyal\Tell\Http\Resources\PostResource;
use Aminetiyal\Tell\Models\TellPost;
use Illuminate\Support\Facades\Storage;

class ImageController
{

    public function store()
    {
        $path = request()->image->store(config('tell.storage.path'), [
            'disk' => config('tell.storage.disk'),
            'visibility' => 'public',
        ]);

        return response()->json([
            'url' => Storage::disk(config('tell.storage.disk'))->url($path),
        ]);
    }
}
