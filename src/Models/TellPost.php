<?php

namespace Aminetiyal\Tell\Models;

use Aminetiyal\Tell\Scopes\LatestPostsScope;
use Illuminate\Database\Eloquent\Model;

class TellPost extends Model
{
    public $dates = ['published_at'];

    protected $with = ['tags'];

    protected $fillable = ['title', 'slug', 'image', 'excerpt', 'body', 'published', 'published_at'];

    protected $casts = ['published' => 'boolean'];

    protected static function booted()
    {
        static::addGlobalScope(new LatestPostsScope);
    }

    public function author()
    {
        return $this->belongsTo(config('tell.users.model'));
    }

    public function tags()
    {
        return $this->belongsToMany(TellTag::class, 'tell_post_tag', 'post_id', 'tag_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }

    public function scopeLive($query)
    {
        return $query->published()->where('published_at', '<=', now()->addHour());
    }
    
    public function scopeScheduled($query)
    {
        return $query->where('published_at', '>', now());
    }
}
