<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourist_types;
use App\Citys ;
class publicCityController extends Controller
{
    //
    public function show($id)
    {
        //
        $tourist_type = Tourist_types::find($id);
        $citys = $tourist_type->citys;
        return view('city.citys' , array('citys' => $citys ) );
    }
}
