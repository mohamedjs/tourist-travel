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
use DB ;
use App\Citys;
use App\Price ;

class publicOfferController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $offers = Offers::orderBy('created_at','desc')->get() ;
        // //echo count($offers);die;
        // $photos = array();
        //
        // foreach ($offers as $offer) {
        //     $photos[] = DB::select(DB::raw('select * from offer_photos where offers_id = '.$offer->id))[0];
        // }
        // return view('offer.offers' ,array('offers'=>$offers , 'photos'=>$photos , "count" => 0));
        // $photos = array();
        // $offers =array();
        // $tourist_types = Tourist_types::all();
        // foreach ($tourist_types as $tourist_type) {
        //     $citys = $tourist_type->citys  ;
        //     $cityCoutn = 0 ;
        //     foreach ($citys as $city) {
        //         if($cityCoutn++ >= 3) break ;
        //         $offers_t = $city->offers ;
        //         $offerCount = 0 ;
        //         foreach ($offers_t as $offer) {
        //           if($offerCount++ >= 3) break ;
        //           $offers[] =  $offer;
        //           $offer_ = Offers::find($offer->id);
        //           $photos[] = $offer_->photos[0];
                  /*
                  DB::select(DB::raw('select photo_name from offer_photos where offers_id = '.$offer->id))
                  */
        //         }
        //     }
        // }
        // $city = Citys::find(3) ;
        // $offers = Offers::orderBy('created_at','desc')->get() ;
        // $photos = array();
        //
        // foreach ($offers as $offer) {
        //     $photos[] = DB::select(DB::raw('select * from offer_photos where offers_id = '.$offer->id));
        // }
        $offers = Offers::all();
        $offersCount = 0;
        //echo $offers.'<br/>' ;
        foreach ($offers as $offer) {
            if($offersCount++ > 20) break;
            $photos[] = $offer->photos[0]->photo_name ;
          //   echo '<br/>____________________________________________________________________<br/>' ;
          //   echo $offer->photos[0]->photo_name.'<br/>' ;
          // //  echo $offers.'<br/>' ;
          //   //print_r($photos) ;
          //
          //   echo '<br/>____________________________________________________________________<br/>' ;

        }
        // for ($i=0; $i <count($offers) ; $i++) {

        //}
        //$photos[] = $offers->photos[0] ;
        // for ($i=0; $i <count($photos) ; $i++) {
        //     $photo_name = $photos[$i];
        // }
        // for ($i=0; $i <count($photos) ; $i++) {
        //   echo $photos[$i].'<br/>';
        // }
        // // echo "<pre>".print_r($photo_name)."</pre>";
        // die;
        return view('index' ,array('offers'=>$offers , 'photos'=>$photos , "count" => 0));
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
        $photos = array();

        foreach ($offers as $offer) {
            $photos[] = DB::select(DB::raw('select * from offer_photos where offers_id = '.$offer->id))[0];
        }
        return view('offer.offers' ,array('city'=>$city , 'offers'=>$offers , 'photos'=>$photos , "count" => 0));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



}
