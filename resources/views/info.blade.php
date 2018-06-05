@extends('layouts.master')

@section('title')
    {{ $settings->site_name}}
@endsection

@section('content')

    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">

            <div class="text-center block-center text-success well">
                
                <legend>
                    <h3>Thank You For Shopping With Us!
                    <br>
                    <small>We have received a payment for your following order and will process it shortly</small>
                    <br>
                    <small>
                    Order id : {{ $order->id }}
                    <br>
                    BTC Received : {{ $order->order_total_btc}}
                    <br>
                    USD Received : ${{ $order->order_total_usd }}
                    </small>
                    </h3>
                </legend>
                <p>
                    We will update you via email upon shipment.
                </p>
            </div>
        
        </div>
    </div>
<br>
                <br><br>
                <br>
@endsection