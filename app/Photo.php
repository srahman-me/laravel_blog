<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable=[
        'file'
    ];

    protected $uploads = '/laravel_project01/public/images/';

    public function getFileAttribute($photo)    {
        return $this->uploads .$photo;
    }
}
