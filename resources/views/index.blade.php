@extends('layouts.master')

@section('title')
        {{ $settings->site_name }}
@endsection

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
