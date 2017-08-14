@extends('layouts/templete2')

@section('content')
   
   @foreach($offers as $offer)
   <a href="/details/{{$offer->id}}">
     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
       <div class="travel wow fadeInLeft" data-wow-duration="2s">
             <img src="../offer_photos/{{$photos[$count++]->photo_name}}">
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
