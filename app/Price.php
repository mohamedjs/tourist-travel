<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    public $table = 'prices' ;
    public $timestamps = false ;

    public function offer(){
        return $this->belongsTo('App\Offers');
    }
}
