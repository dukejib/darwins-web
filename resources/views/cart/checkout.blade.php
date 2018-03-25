@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-offset-2">
            <h3>Checkout Your Cart</h3>
            <h2>{{ $message }}</h2>
        </div>
    </div>
@endsection