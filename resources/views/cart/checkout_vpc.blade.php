@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-primary">

            <div class="panel-heading">Pay via African Express VPC</div>

            <div class="panel-body">

                    <div class="row">
                        <div class="col-md-8">

                            <h3>Order id : {{ $order->id }}
                            <br>
                            <small>Total Amount in $ : {{ $order->order_total_usd }}</small>
                            <br>
                            <small>Total Amount in Bitcoins : {{ $order->order_total_btc  }}</small>
                            </h3>
                   
                        </div>
                        
                        <div class="col-md-4">
                            <img src="{{ asset('img/aevpclogo2.png') }}" >
                        </div>
                        
                    </div>
                    <hr>
                    <div>
                        <p class="text-center">Thank You For Shopping With Us!</p>
                    </div>
            </div>

        </div>

    </div>
</div>

@endsection

