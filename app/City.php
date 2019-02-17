<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function Comments(){
        return $this->hasManyThrough(Comment::class,User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
