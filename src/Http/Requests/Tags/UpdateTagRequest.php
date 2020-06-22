<?php

namespace Aminetiyal\Tell\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    public function rules()
    {
        $tag = request()->route('tag');

        return [
            'name' => 'required|string|max:255|unique:tell_tags,name,' . $tag->id,
            'slug' => 'required|string|max:255|unique:tell_tags,slug,' . $tag->id
        ];
    }
}
