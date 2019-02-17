<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function images(){
        return$this->morphToMany(Image::class,'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
