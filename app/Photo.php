<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\post;
class Photo extends Model
{
    //
    protected $uploads= '/';
    protected $fillable= ['file','post_id'];

    public function getFileAttribute($photo){

        return $this->uploads . $photo;
    }

    public function post(){

        return $this->belongsTo('App\post');
 
    }

}
