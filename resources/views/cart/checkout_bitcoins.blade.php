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
                {{--  <a href="{{ route('get_response',['orderid' => $orderid]) }}" hidden id="get_btc_address"></a>  --}}
                <a href="{{ route('get_btc_address',['orderid' => $order->id]) }}" hidden id="get_btc_address"></a>
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
                            <img src="{{ asset('img/bitcoin.png') }}" >
                        </div>
                        
                    </div>
                    <hr>
                    <div class="" id="qr_address">
                        <div class="loader center-block" id="loader"></div><p class="text-center">Please wait while we fetch the Bitcoin payment address for you</p>
                    </div>
                
            </div>

        </div>

    </div>
</div>

@endsection


@section('scripts')
<script>
//Global Variables
$url = '';
$bitcoins = "{{ $order->order_total_btc }}";
$qr = ''; 
$order_id = "{{ $order->id }}";

/** Count Down Timer */
function startTimer(duration,display){
    var timer = duration, minutes, seconds;
    var myVar = setInterval(function(){
        minutes = parseInt(timer / 60,10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" +  minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        
        display.textContent = minutes + ":" + seconds ;

        if(--timer < 0){
            //Our time is up - Clear the Interval
            clearInterval(myVar);
            //Time is up, Remove QR and show Sorry Page
            timeup($qr);
        }
    },1000);    
}

//Actual Code for Qr Display
$(document).ready(function(){

    $url = $('#get_btc_address').attr('href');
    console.log($url);

    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        success: function (response) {
            //TODO:
            console.log(response);
            $qr = response; //Set the qr to the response address
            var html ="<div class='row'>"
            html += "<div class='col-md-8'>"
            html += "<div class='center-block'><p class='text-center'>" + $qr + "</p></div>";
            html += "<div class='center-block text-center'><img src='https://blockchain.info/qr?data=" + $qr + "&size=250' class='img img-responsive' style='display:block;margin:auto;'></div>";
            html +=  "<p class='text-center'>Please scan this QR code with your bitcoin wallet and send <strong class='text-success'>btc " + $bitcoins + "</strong> to MCCS</p>";
            html += "<strong><div id='websockets' class='text-center text-success'>Monitoring...</div></strong>";
            html += "</div><div class='col-md-4 text-center'><strong><h3>Time Remaining<br><div id='time'></div></h3></strong></div></div>";

            $('#qr_address').html(html);
            //We got Qr Adress -  Now Show it
            showQr();
        }
    });
    
});

//Run this function after address is fetched
function showQr(){
    /** Start Timer **/
    var fiveMinutes = 60 * 15; //Duration to keep our clock working
    display = document.querySelector('#time'); //Get the Element
    startTimer(fiveMinutes,display);   //Start the Timer()

    //Websocket - Bitcoin Receive information
    var btcs = new WebSocket('wss://ws.blockchain.info/inv');
    btcs.onopen = function(){
        $message = JSON.stringify({"op":"addr_sub", "addr":$qr});
        btcs.send($message);
        document.getElementById("websockets").innerHTML = "Monitoring Started...";
    };

    btcs.onmessage = function(onmsg){
        var response = JSON.parse(onmsg.data);
        // console.log(response);
        var getOuts = response.x.out;
        var countOuts = getOuts.length;

        for(i=0; i < countOuts; i++){
            var outAdd = response.x.out[i].addr; //Out address
            var address = $qr;
            if(outAdd == address){
                var amount = response.x.out[i].value;
                var calAmount = amount / 100000000; //In USD 
                document.getElementById("websockets").innerHTML = "Received Satoshi's : " + amount + " equvilaent to BTC: " + calAmount;
                //TODO: call a function to which removes the unused address and set the transaction straight:but first check if btc callback working or not
                //Also show thank you page
                thankYou($qr,$order_id);
            }
        }
    };
}
//Function to send back user to Thank You Page, if payment received
function thankYou($qr,$order_id){
    $act_url = "{{ route('payment.thankyou',['address' => 0,'orderid' => 0]) }}";
    $url = $act_url.slice(0,-3);
    console.log("URL TO ThankYou Page : " + $url);
    $.ajax({
        type: "GET",
        url: $url + $qr + "/" + $order_id,
        dataType: "json",
        success: function(response){
            window.location.replace(response);
        }
    });
}
//Function to send back user to Sorry Page , if payment not received
function timeup($qr){
    $act_url = "{{ route('payment.timeup',['address' => 0 ]) }}";   //Url Address
    $url = $act_url.slice(0,-1);
    console.log("URL TO TIMEUP : " + $url );
    $.ajax({
        type: "GET",
        url: $url + $qr,
        dataType: "json",
        success: function (response) {
            //Respone will be return to index page 
            //Save address in unused address
            window.location.replace(response);
        }
    });
}


</script>
@endsection
