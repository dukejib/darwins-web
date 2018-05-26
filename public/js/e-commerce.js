// e-commerce.js
/** For Menu System  */
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

/** Owl Carousel Slider Interval **/
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoplay:true,
      responsive:{
          0:{
              items:1
          },
          200:{
              items:1
          },
          400:{
              items:2
          },
          600:{
              items:3
          },
          800:{
              items:4
          },
          1000:{
              items:5
          }
      }
  });
});

