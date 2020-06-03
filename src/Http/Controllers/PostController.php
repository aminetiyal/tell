<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Resources\PostResource;
use Aminetiyal\Tell\Models\TellPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController
{

    public function index()
    {
        $posts = TellPost::paginate(10);

        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
        // todo: validation and use ->validated() in $request
        $post = new TellPost($request->all());
        $post->save();

        return new PostResource($post);
    }

    public function show(TellPost $post)
    {
        return new PostResource($post);
    }

    public function update(Request $request, TellPost $post)
    {
        // todo: validation and use ->validated() in $request
        $post->update($request->all());

        return new PostResource($post);
    }

    public function destroy(TellPost $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}