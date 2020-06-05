<?php

namespace Aminetiyal\Tell\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'published' => $this->published,
            'published_at' => $this->published_at,
            'image' => $this->image,
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'author' => $this->author,
        ];
    }
}
