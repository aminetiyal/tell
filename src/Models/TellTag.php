<?php

namespace Aminetiyal\Tell\Models;

use Illuminate\Database\Eloquent\Model;

class TellTag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(TellTag::class, 'tell_post_tag', 'post_id', 'tag_id');
    }
}
