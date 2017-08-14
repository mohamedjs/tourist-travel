<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist_types extends Model
{
    //
    public $table = 'tourist_types' ;
     public $timestamps = false ;

     public function citys(){
         return $this->hasMany('App\Citys');
     }
}
