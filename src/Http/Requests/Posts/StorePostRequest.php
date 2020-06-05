<?php

namespace Aminetiyal\Tell\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'slug' => 'required|string|max:255|unique:tell_posts,slug',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'body' => 'required|string|',
            'published' => 'required|boolean',
            'published_at' => 'sometimes|date|nullable',
        ];
    }
}
