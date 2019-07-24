<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable=[
        'file'
    ];

        /*
        =========================================================================
                To minimize the Directory in showing Images in Index pages
        =========================================================================
                protected $uploads = '/laravel_project01/public/images/';

        public function getFileAttribute($photo)    {
        return $this->uploads .$photo;
        }
        =========================================================================
        */
        public function post(){
            return $this->hasOne('App\Post');
        }

}
