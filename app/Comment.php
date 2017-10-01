<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    public function replies() 
    {
        return $this->hasMany(Reply::class);
    }

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }
}
