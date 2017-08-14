<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    //
    public $table = 'citys' ;
    public $timestamps = false ;

    public function tourist_type(){
        return $this->belongsTo("App\Tourist_types");
    }

    public function offers(){
        return $this->hasMany('App\Offers');
    }

}
