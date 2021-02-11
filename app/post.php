<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable=[
        'id','Name_model','Description','user_id'
    ];

    protected $hidden =[
        'password','remember token',
    ];

    public function photo(){
        return $this->hasMany('App\Photo');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
