@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Terms Of Service</div>

    <div class="panel-body">
        <embed src="{{route('getpdf')}}" width="100%" height="1200px" type='application/pdf' />
    </div>
</div>

@endsection