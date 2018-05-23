/**===============================================**/
/** my.js = used for displaying modal with product
 * information. The button & modal is in index.blade.php
 */

/**
 * Button btnProductDetails in index.blade.php
 */
// $(document).ready(function(){
//   $('.btnProductDetails').on('click',function(){
//     $product = $.parseJSON(this.value);
//     //$imageSrc = (window.location.href).slice(0,-1) +  $product['image'];
//     $imageSrc = $product.image; // $product['image']
//     console.log($imageSrc);


//     $('.modal-body #title').html($product.title);
//     $('.modal-body #description').html($product.description);
//     $('.modal-body #price').html('Price : $ ' + $product.price);
//     $('.modal-body #image').attr('src',$imageSrc);
//     $('#productDetails').modal('show');
//   });
// });

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

