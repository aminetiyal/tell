<?php

namespace Aminetiyal\Tell\Models;

use Illuminate\Database\Eloquent\Model;

class TellPost extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published', 'published_at'];

    public function author()
    {
        return $this->belongsTo(config('tell.users.model'));
    }
}
