<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer_not_content_ofs extends Model
{
    //
    public $table = 'offer_not_content_ofs' ;
    public $timestamps = false ;

    public function offer(){
        return $this->belongsTo('App\Offer');
    }
}
