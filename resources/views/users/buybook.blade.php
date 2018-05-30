@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">

            <div class="panel-heading text-center"> Buy Our Book</div> 

            <div class="panel-body">
                <div class="col-md-4">
                    <img src="{{ asset('img/affiliatecrowdfundingcover.jpg') }}" alt="Affiliate Crowdfunding Book" width="300px">
                </div>
                
                <div class="col-md-8">
                    <div class="text-center">
                        <h1>    
                        Introductory price of <strong>$50</strong><br>
                        <small id="bitcoins">Calculating</small>
                        </h1>
                    </div>
                    <br>
                    <hr>
                    <div class="text-center">
                    <strong><h4 class="text-primary">Select Payment Option</h4></strong>
                    </div>
                    
                    <div class="text-center">

                            <hr>
                            <div class="form-group">
                                <label class="btn btn-warning">
                                    <input type="radio" name="paymentoptions" value="1" class="hidden">
                                    <img src="{{ asset('img/aevpclogo2.png') }}" class="img-responsive img-thumbnail img-check" width="100px">
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="paymentoptions" value="2" class="hidden">
                                    <img src="{{ asset('img/upsmoney.png') }}" class="img-responsive img-thumbnail img-check"  width="100px">
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="paymentoptions" value="3" class="hidden">
                                    <img src="{{ asset('img/bitcoin.png') }}" class="img-responsive img-thumbnail img-check" width="100px" >
                                </label>
                            
                            </div>

                            <div class="form-group">
                            <a href="{{ route('cart.order.book',['option' => 0 , 'bitcoin' => 0])}}" id="order_url" hidden></a>
                            <button class="btn btn-success" id="processCart"><i class="fa fa-cart-plus"></i> Proceed with Payment</button>
                            </div>
                    </div>

                    <br>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 
@section('scripts')
<script>
       //Global Variables
    $bitcoins = 0;
    $options = 0;
    $url = '';
    //Get the Url
    $(document).ready(function(){
        $url = $('#order_url').attr('href').slice(0,-4);
        console.log("First Url : " + $url);
    })
    // Process the USD to Bitcoin Script
    $(document).ready(function(){
        $usd = 50;
        $reply='';
        $.ajax({
            url: 'https://blockchain.info/tobtc?currency=USD&value='+ $usd,
            dataType: 'json',
            success: function(data){
                console.log( data );
                $('#bit').html(data);
                $bitcoins = data;
                console.log('Bitcoins are : '  + $bitcoins);
            }
        });
    });

    //Check Payment Option and create a link to Actual A
    $(document).ready(function(e){
        $('.img-check').click(function(e) {
            $('.img-check').not(this).removeClass('check').siblings('input').prop('checked',false);
            $(this).addClass('check').siblings('input').prop('checked',true);
            $options = $('input[name=paymentoptions]:checked').val();
            console.log($options);
            $href = $url + "/" + $options + "/" + $bitcoins;
            console.log("HREF after Options : " + $href);
        });	
	});
    
    // Process the cart.checkout url
    $('#processCart').on('click',function(){
       
        //if $paymentoptions is 0, then exit
        if($options == 0){
            alert('Select payment option first');
            return;
        }
        //If no Bitcoinis, then go back
        if($bitcoins == 0){
            alert('Unable to fetch bitcoins amount. Unable to Proceed further');
            return;
        }
        //Now Process the Button

        $new_url = $url + '/' + $options + '/' +  $bitcoins;
        console.log($new_url);
        
        $.ajax({
        type: "GET",
        url: $new_url,
        dataType: "json",
        success: function (response) {
            //AdminController is sending json reply:answer
            //console.log(response); 
            window.location.replace(response);
            //document.write(response);
            },
        error:function(error){
            // console.log(error.status);
            //alert('some error occured');
            },
        complete:function(){
 
            }         
        });
    });
 
</script>
@endsection