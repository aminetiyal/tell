<?php

namespace Aminetiyal\Tell\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class IndexPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page' => 'nullable|integer',
            //'search' => 'nullable|string',
        ];
    }
}
