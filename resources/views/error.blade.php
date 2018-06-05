@extends('layouts.master')

@section('title')
    {{ $settings->site_name}}
@endsection

@section('content')

    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">

            <div class="text-center block-center text-warning well">
                <h1>{{ $info }}</h1>
                <br>
                <br>
            </div>
        
        </div>
    </div>
<br>
                <br><br>
                <br>
@endsection