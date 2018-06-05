@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-primary">

            <div class="panel-heading">Pay via USPS Money Order</div>

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
                        <img src="{{ asset('img/upsmoney.png') }}" >
                    </div>
                    
                </div>
                <hr>

                <div>
                <h4>Please make your USPS money order payable on the following name & address</h4> 
                    <pre>
                    <h4>
                    <strong>Pay To :</strong> 
                    Tarik C. Richards

                    <strong>Address :</strong>
                    More Credit Card Services 
                    22078 Arbor Avenue Suite #234 Hayward, California 94541
                    
                    <strong>Amount :</strong>
                    ${{ $order->order_total_usd }} 
                    </h4>
                    </pre>
                    <h4 calss="text-center">And send us an email with Scan of the USPS money order on <a href="mailto:billing@morecreditcardservices.com" title="billing@morecreditcardservices.com">billing</a> from your protonmail account</h4>
                    <hr>
                    <h3 class="text-center text-primary">Specimen of USPS Money Order</h3>
                    <img src="{{ URL::to('img/uspsfront.jpg') }}" alt="USPS Money Order" class="img img-responsive text-center" width="115%">
                
                </div>
                
                <div>
                        <p class="text-center">Thank You For Shopping With Us!</p>
                    </div>
                    
                    
            </div>

        </div>

    </div>
</div>

@endsection
