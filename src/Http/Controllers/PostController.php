<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Requests\Posts\StorePostRequest;
use Aminetiyal\Tell\Http\Requests\Posts\UpdatePostRequest;
use Aminetiyal\Tell\Http\Resources\PostResource;
use Aminetiyal\Tell\Models\TellPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController
{

    public function index()
    {
        $posts = TellPost::live()->paginate(5);

        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = new TellPost($request->validated());
        $post->author()->associate(auth()->id());
        $post->save();

        $post->tags()->sync($request->input('tags'));

        return new PostResource($post);
    }

    public function show(TellPost $post)
    {
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, TellPost $post)
    {
        $post->update($request->validated());

        return new PostResource($post);
    }

    public function destroy(TellPost $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}