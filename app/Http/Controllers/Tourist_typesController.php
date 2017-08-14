<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourist_types; 
class Tourist_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tourist_type = new Tourist_types();
        $tourist_type->type_name = "سياحه داخليه" ;
        $tourist_type->save() ;

        $tourist_type1 = new Tourist_types();
        $tourist_type1->type_name = "سياحه خارجيه" ;
        $tourist_type1->save() ;

        $tourist_type2 = new Tourist_types();
        $tourist_type2->type_name = "حج و عمره" ;
        $tourist_type2->save() ;

        $tourist_type3 = new Tourist_types();
        $tourist_type3->type_name = "سفارى" ;
        $tourist_type3->save() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
