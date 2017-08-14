<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citys ;
use App\Tourist_types;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth') ;
    }
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
        $tourist_types = Tourist_types::all();
        if(count($tourist_types) > 0){
            $citys = $tourist_types[0]->citys ;
            return view('city.create' , array('tourist_types' => $tourist_types , 'citys' => $citys));
        }else{
            $citys = null ;
            return view('city.create' , array('tourist_types' => $tourist_types , 'citys' => $citys));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('addCity')){
          $city = new Citys();
          $city->city_name = $request->city_name;
          $city->tourist_types_id = $request->tourist_type ;
          $city->save();
        }
        $tourist_type = Tourist_types::find($request->tourist_type) ;
        $citys = $tourist_type->citys ;
        $data = json_encode($citys) ;
        return response()->json($data) ;
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
        $tourist_type = Tourist_types::find($id);
        $citys = $tourist_type->citys;
        return view('city.citys' , array('citys' => $citys ) );
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
    public function update(Request $request)
    {
        //
        $city = Citys::find($request->id) ;
        $tourist_type_id = $city->tourist_types_id ;
        if(!empty($request->name)){

          $city->city_name = $request->name ;
          $city->save() ;


          $othercitys = Tourist_types::find($tourist_type_id)->citys->toArray() ;
          return response()->json([ 'citys'=> $othercitys ,
                                    'message'=> ' تم التعديل ']);
        }else {

          $othercitys = Tourist_types::find($tourist_type_id)->citys->toArray() ;
          return response()->json([ 'citys'=> $othercitys ,
                                    'message'=> $request->name]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $city = Citys::find($request->id) ;
        $tourist_type_id = $city->tourist_types_id ;
        //count($city->offers);
        if(count($city->offers) == 0){
          $city->delete();
          $othercitys = Tourist_types::find($tourist_type_id)->citys->toArray() ;
          //echo "تم مسح المدينه بنجاح";
          return response()->json([ 'delete'=>1 ,
                                  'citys'=> $othercitys ,
                                 'message'=>'تم مسح المدينه بنجاح' ]);

        } else {
        //  echo "هذه المدينه تحتوى على عروض و لا يمكن مسحها " ;
          return response()->json([ 'delete'=>0 ,
                                 'message'=>'هذه المدينه تحتوى على عروض و لا يمكن مسحها' ]);

        }
    }
}
