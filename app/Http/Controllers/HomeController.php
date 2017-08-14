<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourist_types ;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourist_types = Tourist_types::all();
        if(count($tourist_types) > 0){
            $citys = $tourist_types[0]->citys ;
            return view('city.create' , array('tourist_types' => $tourist_types , 'citys' => $citys));
        }else{
            $citys = null ;
            return view('city.create' , array('tourist_types' => $tourist_types , 'citys' => $citys));
        }
    }
    public function index2()
    {
        return view('home');
        
    }
}
