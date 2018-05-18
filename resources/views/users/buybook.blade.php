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
                                    <label class="btn btn-default">
                                        <input type="radio" name="paymentoptions" value="1" class="hidden">
                                        <img src="{{ asset('img/aevpclogo2.png') }}" class="img-responsive img-thumbnail img-check" width="100px">
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="paymentoptions" value="2" class="hidden">
                                        <img src="{{ asset('img/upsmoney.png') }}" class="img-responsive img-thumbnail img-check"  width="100px">
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="paymentoptions" value="3" class="hidden">
                                        <img src="{{ asset('img/bitcoin.png') }}" class="img-responsive img-thumbnail img-check" width="100px" >
                                    </label>
                                
                                </div>

                                <div class="form-group">
                                <a href="{{ route('cart.order',['toggle' => 2, 'option' => 0 , 'bitcoin' => 0])}}" class="btn btn-success" id="mylink">Proceed with Payment</a>
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
    $paymentoption = 0;
    $url = '';
    //For Bitcoin value calculation
    $(document).ready(function(){
        $usd = 50;
        $reply='';
        $.ajax({
            url: 'https://blockchain.info/tobtc?currency=USD&value='+ $usd,
            dataType: 'json',
            success: function(data){
                $bitcoins = data;
                console.log( data );
                $('#bitcoins').html("Bitcoins : " + data);
            }
        });
    });
    // Process the cart.checkout url
    $('#mylink').on('click',function(){
        //if $paymentoptions is 0, then exit
        if($paymentoption == 0){
            alert('Select payment option first');
            return;
        }
        //$url = $('#url').attr('href').slice(0,-4); //Remove the trailing 0 from the url (hack around)
        //console.log($bitcoins);
        //$new_url = $url + '/' + $paymentoption + '/' +  $bitcoins;
        //console.log($new_url);
        //We are not 0, so proceed
        //We are not 0, so proceed
        //$.ajax({
        //type: "GET",
        //url: $new_url,
        //dataType: "json",
        //success: function (response) {
            //AdminController is sending json reply:answer
            // console.log(response); 
            //document.write(response);
            //},
        //error:function(error){
            // console.log(error.status);
            //alert('some error occured');
            //},
        //complete:function(){

            //}         
        //});
    });
    // For Payment Options
    $(document).ready(function(e){
        $('.img-check').click(function(e) {
            $('.img-check').not(this).removeClass('check').siblings('input').prop('checked',false);
            $(this).addClass('check').siblings('input').prop('checked',true);
            $paymentoption = $('input[name=paymentoptions]:checked').val();
            console.log($paymentoption);
            $url = $('#mylink').attr('href').slice(0,-4);
            console.log($url);
            $href = $url + "/" + $paymentoption + "/" + $bitcoins;
            $('#mylink').attr('href',$href);
        });	
	});
</script>
@endsection