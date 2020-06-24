<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Requests\Posts\IndexPostRequest;
use Aminetiyal\Tell\Http\Requests\Posts\StorePostRequest;
use Aminetiyal\Tell\Http\Requests\Posts\UpdatePostRequest;
use Aminetiyal\Tell\Http\Resources\PostResource;
use Aminetiyal\Tell\Models\TellPost;
use Illuminate\Database\Eloquent\Builder;

class PostController
{
    public function index(IndexPostRequest $request)
    {
        $posts = TellPost::live()
            ->where('title', 'like', '%' . $request->query('search') . '%')
            ->paginate(5);

        return PostResource::collection($posts);
    }

    public function drafts(IndexPostRequest $request)
    {
        $posts = TellPost::draft()
            ->where('title', 'like', '%' . $request->query('search') . '%')
            ->paginate(5);

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
        if (auth()->check()) {
            return new PostResource($post);
        }
        return $post->published ? new PostResource($post) : abort(404);
    }

    public function update(UpdatePostRequest $request, TellPost $post)
    {
        $post->update($request->validated());

        $post->tags()->sync($request->input('tags'));

        return new PostResource($post);
    }

    public function destroy(TellPost $post)
    {
        $post->tags()->detach();

        $post->delete();

        return response()->json(null, 204);
    }
}
