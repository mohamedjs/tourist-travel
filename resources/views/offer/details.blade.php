<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="شركة دار الوعد للرحلات للحج والعمرة وبعض الاماكن العااامة">
        <title>دار الوعد</title>
        <link rel="shortcut icon" href="../image/80.jpg" />
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/Normalize.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="slideshow">
           <div class="header" style=" background-image: url(../offer_photos/{{$photos[0]->photo_name}});
            background-size: cover;height: 670;background-attachment: fixed;">
           </div>
           <div class="our-companye">
              <div class="container">
               <h1>دار الوعد للرحلات</h1>
               <h3>اكتشف معنا بلدان العالم ورحلات الحج والعمرة</h3>
               <a href="" class="btn btn-primary">احجز الان</a>
              </div>
           </div>
       </div>
         <nav class="navbar navbar-default navbar-fixed-top">
             <div class="container-flauid">
               <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
                  <a class="navbar-brand" href="../layouts/templete.blade.php"><i class="fa fa-home fa-2x"></i></a>
              </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav navbar-right">
                     <li><a class="activee" href="../home"><i class="fa fa-home fa-2x"></i></a></li>
                     <li>
                        <a href="/citys/1">السياحة الداخلية</a>
                     </li>
                     <li><a href="/citys/2">السياحة الخارجية</a></li>
                     <li><a href="/citys/3">السياحة الدينية</a></li>
                     <li><a href="/citys/4">شهر العسل</a></li>
                     <li><a href="/citys/5">رحلات اليوم الواحد</a></li>
                     <li><a href="/citys/6">السياحة العلاجية</a></li>
                     <li><a href="#home">معرض الصور</a></li>
                     <li><a href="#home">عن الشركة</a></li>
                     <li><a href="#home">تواصل معنا</a></li>
                 </ul>
               </div>
                </div>
            </nav>
           <div class="logo">
               <a href="Home.html"><img src="../image/80.jpg"></a>
           </div>
        <div class="tour-program">
         <div class="container">
     	  <div class="country">
              	 <h2>
                      {{$offer->hotel}}
                    </h2>
              	 <h3>{{$offer->days_num}}ايام/{{$offer->days_num-1}} ليالى</h3>
           	</div>
	<div class="description">
            <div class="name">
                <p>العرض يشمل :</p>
            </div>
            <div class="content">
                <ul>
                    @foreach($content_ofs as $content_of)
                        <li>{{ $content_of->feature }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <br>
        <div class="description">
            <div class="name">
                <p>العرض لا يشمل :</p>
            </div>
            <div class="content">
                <ul>
                    @foreach($notContent_ofs as $notContent_of)
                        <li>{{ $notContent_of->feature }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <br>
        <div class="description">
            <div class="name">
                <p>السعر :</p>
            </div>
            <div class="content">
                <ul>
                    @foreach($prices as $price)
                        <li>{{$price->room_type}} : {{$price->price}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="description">
            <div class="name">
                <p>وصف العرض</p>
            </div>
            <div class="content">
                    <p>
                        {{$offer->content}}
                    </p>
            </div>
        </div>


           <!--kdddddddddddddddddddddddddddddddddddddddddddddddddd-->
         </div>
        </div>
         <div class="trip-slide">
           <div class="col-lg-12">
             <div class="owl-carousel owl-theme">

               @foreach($photos as $photo)
                  <div class="item">
                      <img src="../offer_photos/{{$photo->photo_name}}" class="img-responsive" alt="">
                  </div>
                @endforeach

             </div>
            </div>
          </div>
          <div class="book-tour wow bounceIn" data-wow-duration="2s">
             <h2>للحجز والاستعلام</h2>
             <p>السعر يبدا من 2000 جنية</p>
             <a href="" class="btn btn-primary">احجز الان</a>
          </div>
           <div class="contact">
           <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="contact-branch wow fadeInLeft" data-wow-duration="1s">
                  <h3>مكان الفرع</h3>
                  <iframe style="height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.3962855438967!2d31.2797173146658!3d30.08283498186832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x566749604d4909b4!2sDr.+Hatem+Adam+Mohamed+Adam!5e0!3m2!1sen!2seg!4v1489482632494" width="100%" height="68%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
               <div class="contact-branch wow bounceIn" data-wow-duration="1s"">
                  <h3>أتصل بنا</h3>
                  <h5>التواصل عن طريق الهاتف:</h5>
                  <p>مصر والسودان &nbsp;&nbsp;&nbsp; 01124568723</p>
                  <p>مصر والسودان &nbsp;&nbsp;&nbsp; 01124568723</p>
                  <p>مصر والسودان &nbsp;&nbsp;&nbsp; 01124568723</p>
                  <p>مصر والسودان &nbsp;&nbsp;&nbsp; 01124568723</p>
                  <h5>التواصل عن طريق الايميل:</h5>
                  <p>darElw3d@Elw3d.com</p>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="contact-branch wow fadeInRight" data-wow-duration="1s">
                  <img src="image/80.jpg">
                  <p>لتواصل عن طريق الايميل لتواصل عن طريق الايميل لتواصل عن طريق الايميل لتواصل عن طريق الايميل<br>
                     لتواصل عن طريق الايميل لتواصل عن طريق الايميل لتواصل عن طريق الايميل لتواصل عن طريق الايميل<br>
                  </p>
               </div>
           </div>
         </div>
        </div>
        <div class="footer">
         <div class="container">
            <div class="social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook x" style="background-color: #3B5998;padding:10px;"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter xx" style=" background-color: #6ACFF4;padding:10px"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus xxx" style="background-color: #D13F2D;padding:10px;"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin xxxx" style="background-color: #3272BD;padding:10px;"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram xxxxx" style="background-color: #FAC855;padding:10px;"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype xxxxxx" style="background-color: #03ACEC;padding:10px;"></i></a></li>
                </ul>
            </div>
                <p>&copy;Copyright 2017 DarElw3d. All Rights Reserved.</p>
          </div>
        </div>
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>
         <script src="../js/wow.min.js"></script>
         <script src="../js/jquery.nicescroll.min.js"></script>
         <script src="../js/jss.js"></script>
        <script src="../js/owl.carousel.js"></script>
           <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                 nav:true,
                loop: true,
                margin: 10,
                autoplayHoverPause: true,
                 rtl:true,
                 stagePadding: 50
              });
            })
             $(function(){
           'use strict';
           var  nav=$('.navbar-default');
           var drop=$('.dropdown-menu');
           var image=$('.mySlides img');
           $(window).scroll(function(){
              var scroll=$(window).scrollTop();
              if(scroll >= image.outerHeight()){
                nav.addClass('navecolor').slideDown();
              }
              else{
                nav.removeClass('navecolor');
              }
           });
         });
          </script>
        <script src="../js/js.js"></script>
       
    </body>
</html>
