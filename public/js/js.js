var slideIndexx = 0;
showSlidess();



function showSlidess() {
    var i;
    var slidess = document.getElementsByClassName("mySlides");
    for (i = 0; i < slidess.length; i++) {
        slidess[i].style.display = "none";
    }
    slideIndexx++;
    if (slideIndexx> slidess.length) {slideIndexx = 1;}
    slidess[slideIndexx-1].style.display = "block";
    setTimeout(showSlidess, 4000); // Change image every 2 seconds
}
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
});
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
