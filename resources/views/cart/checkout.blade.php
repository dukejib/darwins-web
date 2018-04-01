@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-offset-2">
            <h3>Checkout Your Cart</h3>
            @if($option == 1)
                <h1>African Express VPC</h1>
                <h3>{{ $message }}</h3>
            @elseif($option == 2)
                <h1>USPS Money Order</h1>
                <h3>{{ $message }}</h3>
            @elseif($option == 3)
                <h1>Bitcoin</h1>
                <h3>{{ $message }}</h3>
            @endif
        </div>
    </div>
@endsection