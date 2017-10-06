<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use App\Role;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function photo() 
    {
        return $this->belongsTo(Photo::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

}
