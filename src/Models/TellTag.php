<?php

namespace Aminetiyal\Tell\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class TellTag extends Model
{
    use HasSlug;

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(TellPost::class, 'tell_post_tag', 'tag_id', 'post_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
