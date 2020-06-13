<?php

namespace Aminetiyal\Tell\Models;

use Illuminate\Database\Eloquent\Model;

class TellTag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(TellPost::class, 'tell_post_tag', 'tag_id', 'post_id');
    }
}
