<?php

namespace App\Http\Controllers;

use App\Offer_not_content_ofs;
use Illuminate\Http\Request;
use App\Offer_content_ofs;
use App\Tourist_types ;
use App\Offer_photo ;
use App\Offers ;
use Validator;
use Redirect;
use Session;
use Input ;
use App\Citys;
use App\Price ;
// use Illuminate\Support\Facades\Input;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
     }
    //  public function __construct()
    //  {
    //      $this->middleware('auth');
    //  }
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
        $citys=null ;
        $offers = null ;
        $tourist_types = Tourist_types::all();
        if(count($tourist_types) > 0){
            $citys = $tourist_types[0]->citys ;
            //$offers = 0 ;
            if(count($citys) > 0){
            $offers = $citys[0]->offers ;
            }
        }
        // return view('testform');
        return view('offer.create' , array('citys'=>$citys , "tourist_types" => $tourist_types , "offers"=> $offers ));
    }

    public function getCitys(Request $request){
      $tourist_types = Tourist_types::find($request->id) ;

      $citys = $tourist_types->citys ;
      $data = json_encode($citys) ;
      return response()->json($data) ;

    }

    public function showCP(Request $request)
    {
        //
        $city = Citys::find($request->id) ;
        $offers = $city->offers ;
        $offers = json_encode($offers) ;
        return response()->json($offers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "hotel :" . Input::get('hotel');
        // echo "<br />stars_num :" . Input::get('stars_num');
        // echo "<br />days_num :" . Input::get('days_num');
        // echo "<br />city :" . Input::get('city');
        // echo "<br />content :" . Input::get('content');
        // echo "<br />content_of :" . Input::get('content_of')[1];
        // echo "<br />notContent_of :" . Input::get('notContent_of')[2];
        // echo "<br />support_images :" . Input::get('images')[0];

        $offer = new Offers();
        $offer->stars_num = Input::get('stars_num');
        $offer->citys_id  = Input::get('city') ;
        $offer->hotel     = Input::get('hotel') ;
        $offer->content   = Input::get('content') ;
        $offer->days_num  = Input::get('days_num') ;
        $offer->users_id  =  1 ;
        $offer->save() ;

        $offer_content_ofs = Input::get('content_of') ;

        foreach ($offer_content_ofs as $offer_content_of) {
            $content = new Offer_content_ofs();
            $content->offers_id = $offer->id ;
            $content->feature = $offer_content_of;
            $content->save() ;
        }

        $pricenames = Input::get('pricename') ;
        $pricevalues = Input::get('pricevalue') ;
        $pricesCount = count($pricenames) ;

        for ($count=0; $count < $pricesCount; $count++) {
            $price = new Price() ;
            $price->room_type = $pricenames[$count] ;
            $price->price = $pricevalues[$count] ;
            $price->offers_id = $offer->id ;
            $price->save() ;
        }

        $offer_not_content_ofs = Input::get('notContent_of') ;

        foreach ($offer_not_content_ofs as $offer_not_content_of) {
            $content = new Offer_not_content_ofs();
            $content->offers_id = $offer->id ;
            $content->feature = $offer_not_content_of;
            $content->save() ;
        }

        $files = Input::file('images');
        $file_count = count($files) ;
        // echo $file_count;
        $uploadcount = 0;
        $i = 1 ;
        foreach ($files as $file) {

            // $rules = array('image' => 'required' );
            // $validator = Validator::make(array('file'=>$file),$rules);
            $rules = array('file' => 'required');//'required|mimes:png,gif,jpeg,txt,pdf,dox'
            $validator = Validator::make(array('file' => $file ) , $rules);
            echo "this is in foreach and befor if condition<br />";
            if($validator->passes()){
              echo "insed ifs<br />";
              $destinationPath = 'offer_photos' ;
              $extension = $file->getClientOriginalExtension();
              $offerid = (string)$offer->id ;
              $filename = $offerid."0".$i.".".$extension ;
              $i=$i+1;
              echo $filename ;
              //$file_path = 'offer_photos' + $filename;
              $upload_success = $file->move($destinationPath,$filename);
              $uploadcount++;
              //save into database
              $photo = new Offer_photo() ;
              $photo->photo_name = $filename ;
              //$photo->photo_path = $file_path ;
              $photo->mime = $extension ;
              $photo->offers_id = $offer->id ;
              $photo->save() ;

            }
        }
        if($uploadcount == $file_count){
        Session::flash('success','upload successfully');
        return Redirect::to('admin/createoffer');
        }else{
          return Redirect::to('admin/createoffer')->withInput()->withErrors($validator);
        }

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
        $offer = Offers::find($id) ;
        $photos = $offer->photos ;
        $content_ofs = $offer->offer_content_of ;
        $notContent_ofs = $offer->offer_not_content_of ;
        $prices = $offer->prices ;

        return view('offer.details',array('offer'=>$offer , 'photos'=>$photos , 'content_ofs'=>$content_ofs ,'notContent_ofs'=>$notContent_ofs, 'prices'=>$prices));
        //,array('offer'=>$offer , 'photos'=>$photos , 'content_ofs'=>$content_ofs ,'notContent_ofs'=>$notContent_ofs )
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function offers($id)
    {
        //
        $city = Citys::find($id) ;
        $offers = $city->offers ;
        return view('offer.offers' ,array('city'=>$city , 'offers'=>$offers));
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
    public function destroy(Request $request)
    {
        //
        $offer = Offers::find($request->id) ;
        $city = Citys::find($offer->citys_id);
        $offer_content_ofs = $offer->offer_content_of ;
        //$offer_content_ofs->delete() ;
        foreach ($offer_content_ofs as $offer_content_of) {
          $offer_content_of->delete();
        }

        $offer_not_content_ofs = $offer->offer_not_content_of ;
        //$offer_not_content_ofs->delete();
        foreach ($offer_not_content_ofs as $offer_not_content_of) {
          $offer_not_content_of->delete();
        }

        $prices = $offer->prices ;
        foreach ($prices as $price) {
           $price->delete() ;
        }

        $photos = $offer->photos ;
        foreach ($photos as $photo) {
            //$photo_path = public_path("offer_photos/") + $photo->photo_name  ;
            unlink(public_path("offer_photos/".$photo->photo_name));
            $photo->delete() ;
        }


        $offer->delete() ;

        $offers = $city->offers ;
        $offers = json_encode($offers) ;
        return response()->json($offers);


    }
}
