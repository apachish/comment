<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path','type'];


    public function users()
    {
        return $this->morphedByMany(User::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'imageable');
    }
}
