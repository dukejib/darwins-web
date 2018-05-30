@extends('layouts.master')

@section('title')
        {{ $settings->site_name }}
@endsection

@section('content')

<!-- Featured Owl Carousel -->
<div class="mysubheading text-center">Featured</div>
<div class="owl-carousel owl-theme">
        @foreach($featured as $f)
        
        <div class="item">
                <a href="{{ route('show.product',['id' => $f->id]) }}"> 
                         <div class="featured"></div>
                        <img src="{{ asset($f->image) }}" alt="{{ $f->title }}" width = "200px">
                </a>
                <div class="text-center"><strong>{{ $f->title }}</strong></div>
        </div>
        
        @endforeach
</div>
<hr>
<!-- End Featured Owl Carousel -->

<!-- latest Owl Carousel -->
<div class="mysubheading text-center">Latest</div>
<div class="owl-carousel owl-theme">
        @foreach($latest as $l)
       
        <div class="item">
        
        <a href="{{ route('show.product',['id' => $l->id]) }}">
                <div class="latest"></div> 
                <img src="{{ asset($l->image) }}" alt="{{ $l->title }}" width = "200px">
        </a>
        <div class="text-center"><strong>{{ $l->title }}</strong></div>
        </div>
        
        @endforeach
</div>
<hr>
<!-- End latest Owl Carousel -->
    
<!-- popular Owl Carousel -->
<div class="mysubheading text-center">Popular</div>
<div class="owl-carousel owl-theme">
        @foreach($popular as $l)
        <div class="item">
                <a href="{{ route('show.product',['id' => $l->id]) }}"> 
                        <div class="popular"></div>
                        <img src="{{ asset($l->image) }}" alt="{{ $l->title }}" width = "200px">
                </a>
                <div class="text-center"><strong>{{ $l->title }}</strong></div>
        </div>
        
        @endforeach
</div>
<hr>
<!-- End popular Owl Carousel -->

@endsection
