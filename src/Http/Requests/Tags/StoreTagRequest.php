<?php

namespace Aminetiyal\Tell\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:tell_tags,name'
        ];
    }
}
