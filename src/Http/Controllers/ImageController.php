<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController
{

    public function store()
    {
        // TODO: validate image request
        $path = request()->image->store(config('tell.storage.path'), [
            'disk' => config('tell.storage.disk'),
            'visibility' => 'public',
        ]);

        return response()->json([
            'url' => Storage::disk(config('tell.storage.disk'))->url($path),
        ]);
    }

    public function destroy($image)
    {
        return Storage::delete('/public/tell/images/' . $image);
    }
}
