@extends('layouts.master')

@section('content')
    <!-- Include the Main Carousel -->
        @include('partials.carousel')
    <br>
    <br>
    <hr>
    <!-- Include the Products & Services Carousel -->
    <div class="mysubheading text-center">Products</div>
        @include('partials.products_carousel')
    <hr>
    <div class="mysubheading text-center">Services</div>
        @include('partials.services_carousel')

@endsection


@section('scripts')
    <script>
    /** main Carousel */
    $(document).ready(function () {
        //Get the Carousel Interval Time from Settings
        $carouselInterval = $('#carousel_time').attr('value');   
        console.log($carouselInterval);
        /** Carousel Slider Interval **/
        $('.carousel').carousel({
            
        interval: $carouselInterval
        });
    });
    </script>
@stop

