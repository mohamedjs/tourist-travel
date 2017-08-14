@extends('layouts.templete2')

@section('content')
    @foreach($citys as $city)

     <a href="/offers/{{$city->id}}">
           <div class="col-lg-6 col-md-6 col-sm-12 wow bounceIn" data-wow-duration="2s">
               <div class="pic">
                   <img src="../offer_photos/{{$city->tourist_types_id}}01.jpg">
               </div>
               <div class="back">
                   <p>{{$city->city_name}}</p>
               </div>
           </div>
     </a>
    @endforeach
@endsection
