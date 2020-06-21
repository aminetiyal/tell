<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Requests\Tags\StoreTagRequest;
use Aminetiyal\Tell\Http\Requests\Tags\UpdateTagRequest;
use Aminetiyal\Tell\Http\Resources\PostResource;
use Aminetiyal\Tell\Http\Resources\TagResource;
use Aminetiyal\Tell\Models\TellTag;
use Illuminate\Http\Request;

class TagController
{

    public function index(Request $request)
    {
        $tags = TellTag::withCount('posts')
            ->where('name', 'like', '%' . $request->query('search') . '%')
            ->get();

        return TagResource::collection($tags);
    }

    public function store(StoreTagRequest $request)
    {
        $tag = new TellTag($request->validated());
        $tag->save();

        return new TagResource($tag);
    }

    public function show(TellTag $tag)
    {
        return new TagResource($tag);
    }

    public function update(UpdateTagRequest $request, TellTag $tag)
    {
        $tag->update($request->validated());

        return new TagResource($tag);
    }

    public function destroy(TellTag $tag)
    {
        $tag->delete();

        return response()->json(null, 204);
    }

    public function posts(TellTag $tag)
    {
        $posts = $tag->posts()->live()
            ->where('title', 'like', '%' . request()->query('search') . '%')
            ->paginate(5);
        return PostResource::collection($posts);
    }
}
