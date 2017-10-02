<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploads = '/images/uploads/users/';

    protected $guarded = [];

    public function getFileAttribute() {
        return $this->uploads . $this->path;
    }

}
