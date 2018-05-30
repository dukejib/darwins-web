@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
         <div class="panel panel-primary">

            <div class="panel-heading">Pay via Bitcoin</div>

            <div class="panel-body">
                {{--  <a href="{{ route('get_response',['orderid' => $orderid]) }}" hidden id="getbtc_url"></a>  --}}
                <a href="{{ route('get_btc_address',['orderid' => $orderid]) }}" hidden id="getbtc_url"></a>
                    <h3>Order id : {{ $orderid }}</h3>
                    <div class="" id="qr_address">
                        <div class="loader center-block" id="loader"></div><p class="text-center">Please wait while we fetch the Bitcoin payment address for you</p>
                    </div>
                    
                    {{--  <img src="https://blockchain.info/qr?data={{$order->btc_address}}&size=200" class="img img-thumbnail img-responsive">  --}}
                    {{--  https://blockchain.info/qr?data=1P6em3kprVgHqbnyf33eYhWy3VUEAJb6ks&size=200  --}}
            </div>

        </div>

    </div>
</div>

@endsection


@section('scripts')
<script>
//Global Variables
$url = '';

$(document).ready(function(){

    $url = $('#getbtc_url').attr('href');
    console.log($url);

    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        success: function (response) {
            //AdminController is sending json reply:answer
            //data = JSON.parse(response);
            //TODO:
            //Ensure you have proper response reqding seput, in case return is false. 
            console.log(response);
            }      
        });
});
</script>
@endsection
