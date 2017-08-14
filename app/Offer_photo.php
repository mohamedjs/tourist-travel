<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer_photo extends Model
{
    //
    public $table = 'offer_photos' ;
    public $timestamps = false ;

    public function offer(){
        return $this->belongsTo('App\Offer');
    }

}
