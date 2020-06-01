<?php

namespace Aminetiyal\Tell\Models;

use Illuminate\Database\Eloquent\Model;

class TellPost extends Model
{
    protected $fillables = ['title', 'excerpt', 'body', 'published'];
}
