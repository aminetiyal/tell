<?php

namespace Aminetiyal\Tell\Http\Controllers;

use Aminetiyal\Tell\Http\Requests\Tags\StoreTagRequest;
use Aminetiyal\Tell\Http\Requests\Tags\UpdateTagRequest;
use Aminetiyal\Tell\Http\Resources\TagResource;
use Aminetiyal\Tell\Models\TellTag;

class TagController
{

    public function index()
    {
        $tags = TellTag::all();

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
}