@extends('layouts/templete')
@section('content')
   <!-- <a href="/details/1">
     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
       <div class="travel">
             <img src="../offer_photos/101.jpg">
             <div class="about-travel">
             <h2>سيراميس <span>4ايام/3 ليالى</span></h2>
              <p>
               <?php
          //      for ($j = 0; $j<4; $j++)
          //         echo '<i class="fa fa-star"></i>';
					//  for ($j = 0; $j<5-4; $j++)
          //             echo '<i class="fa fa-star-o"></i>';
                  ?>
                  </p>
             </div>

 </div>
</div>
</a> -->
@foreach($offers as $offer)
@if($count>5)
    @break
@endif
<a href="/details/{{$offer->id}}">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
    <div class="travel">
          <img src="../offer_photos/{{$photos[$count++]}}">
          <div class="about-travel">
          <h2>{{$offer->hotel}} <span>{{$offer->days_num}}ايام/{{$offer->days_num-1}} ليالى</span></h2>
           <p> <?php $star=$offer->stars_num ?>
            <?php  for ($j = 0; $j<$star; $j++)
               echo '<i class="fa fa-star"></i>';
        for ($j = 0; $j<5-$star; $j++)
                   echo '<i class="fa fa-star-o"></i>';
               ?>
               </p>
          </div>

    </div>
  </div>
</a>

@endforeach

@endsection
