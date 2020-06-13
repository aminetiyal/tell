<?php

namespace Aminetiyal\Tell\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LatestPostsScope implements Scope
{
    
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderByDesc('published_at');
    }
}