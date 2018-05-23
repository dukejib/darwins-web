@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                @if($option == 1)
                    Pay via African Express VPC
                @elseif($option == 2)
                    Pay via USPS Money Order
                @elseif($option == 3)
                    Pay via Bitcoin
                @endif
            </div>

            <div class="panel-body">
                @if($option == 1)
                    <h3>Pay with African Express VPC</h3>
                @elseif($option == 2)
                    <h4>Please make your USPS money order payable on the following name & address</h4> 
                    <pre>
                    <h4>
                    <strong>Pay To :</strong> 
                    Tarik C. Richards

                    <strong>Address :</strong>
                    More Credit Card Services 
                    22078 Arbor Avenue Suite #234 Hayward, California 94541
                    
                    <strong>Amount :</strong>
                    ${{ $total }} 
                    </h4>
                    </pre>
                    <h4 calss="text-center">And send us an email with Scan of the USPS money order on <a href="mailto:billing@morecreditcardservices.com" title="billing@morecreditcardservices.com">billing</a> from your protonmail account</h4>
                    <hr>
                    <h3 class="text-center text-primary">Specimen of USPS Money Order</h3>
                    <img src="{{ URL::to('img/uspsfront.jpg') }}" alt="USPS Money Order" class="img img-responsive text-center" width="115%">
                @elseif($option == 3)
                    <a href="{{ route('getbtcaddress',['orderid' => $order->id]) }}" hidden id="getbtc_url"></a>
                    <a href="{{ route('java') }}" hidden id="java_url"></a>
                    
                    <div class="" id="qr_address">
                        <div class="loader center-block" id="loader"></div><p class="text-center">Please wait while we fetch the Bitcoin payment address for you</p>
                    </div>
                    
                    
                        {{--  <img src="https://blockchain.info/qr?data={{$order->btc_address}}&size=200" class="img img-thumbnail img-responsive">  --}}
                        {{--  https://blockchain.info/qr?data=1P6em3kprVgHqbnyf33eYhWy3VUEAJb6ks&size=200  --}}
                @endif
            </div>

            {{--  <div class="panel-footer">
                <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#refillModal">Payment Procedure</button>
            </div>  --}}

        </div>

    </div>
</div>

<!-- Modal Refill Statement -->
<div id="refillModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Payment Refill Statement</h4>
        </div>
        <div class="modal-body">
            {!! $settings->refill_statement  !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>

    </div>
</div>

@endsection


@section('scripts')
    <script>
    //Show Loaders
    console.log('in script for checkout');

    //$(document).ready(function(){
     //   $data = '<div class="loader center-block"></div><p class="text-center">Please wait while we fetch the Bitcoin payment address for you</p>';
      //  $('#qr_address').html($data);
    //});
  

    </script>
@stop
