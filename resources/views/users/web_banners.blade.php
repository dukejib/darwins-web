@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

<div class="well">

    <div class="page-header">
        <h3>Your Referal Banners
        <br>
        <small>Spread them to gain more following</small>
        </h3>
    </div>

{{-- Banners Settings   --}}
    <div id="banners">
        <br>
        @if(count($banners)>0)
        <p>To Use these Banners, Copy and Paste the HTML Code Below Into Any HTML Area On Your Site. Just hover over the link and <kbd>right click</kbd> and select <kbd>Copy</kbd> from the menu</p>
        <br>
            @foreach($banners as $banner)
            <div class="row">
                <div class="col-md-6">
                    <label for="">Banner Preview :{{ $banner->title }}</label>
                    <img src="{{ URL::to('/img/web_banners/' . $banner->image) }}"  width="450px" class="img img-responsive banner-img-responsive">
                </div>

                <div class="col-md-6">
                <!-- PHP CODE HERE -->
                <?php 
                    $text = "<a href='";
                    $text .= url('/') . '/referred?refferal=' . $user->affiliate_id . "'";
                    $text .= " target='_blank'><img src='";
                    $text .= URL::to('/img/web_banners/' . $banner->image);
                    $text .= "' alt=''></a>" ;
                ?>
                <!-- PHP CODE ENDS HERE -->
                    <textarea id="{{ $banner->title }}" class="form-control" rows="3" cols="10" onmouseover="this.select()">{{$text}}</textarea>
                </div>
            
            </div> <!-- Div Row End -->
            <hr>
            @endforeach
        @endif
        
    </div>
 

</div>


@endsection