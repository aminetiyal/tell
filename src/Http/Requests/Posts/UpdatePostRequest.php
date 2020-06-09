<?php

namespace Aminetiyal\Tell\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules()
    {
        $id = request()->route('post')->id;

        return [
            'slug' => 'required|string|max:255|unique:tell_posts,slug,' . $id,
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'tags' => 'sometimes|nullable|array',
            'tags.*.id' => 'sometimes|nullable|integer|exists:tell_tags,id',
            'excerpt' => 'required|string',
            'body' => 'required|string|',
            'published' => 'required|boolean',
            'published_at' => 'sometimes|date|nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tags' => collect($this->input('tags'))->map(fn ($item) => $item['id'])->all()
        ]);
    }
}
