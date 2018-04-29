@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">

                <div class="panel-heading text-center">
                   Buy Our Book
                </div> 

                <div class="panel-body">

                    <div class="col-md-4">
                        <img src="{{ asset('img/affiliatecrowdfundingcover.jpg') }}" alt="Affiliate Crowdfunding Book" width="300px">
                    </div>
                    
                    <div class="col-md-8">
                        <div class="text-center">
                            <h1>    
                            Introductory price of <strong>$50</strong>
                            </h1>
                        </div>
                        <br>
                        <div class="text-center">
                        <strong><h4 class="text-primary">Select Payment Option</h4></strong>
                        </div>
                        
                        <div class="radio text-center">
                            <label>
                                <input type="radio" name="paymentoptions" value="1" disabled>African Express VPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="paymentoptions" value="2">USPS Money Orders&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="paymentoptions" value="3">Bitcoin Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </div>
                        <br>
                        <br>
                        <div class="text-center">
                         <?php 
                        $paymentoption = 0; //Hack for proper route - actual value is changed from jquery
                    ?>
                    <button type="button" id="checkout" data-url="{{ route('cart.checkout',['toggle' => 2,'pay' => 0 ]) }}" class="btn btn-success">Purchase Now!</button>
                        </div>

                    </div>

                </div>

                <div class="panel-footer text-center">
                   
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        //Global Variables
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
                    console.log( data );
                    $('#bit').html(data);
                }
            });
        });
        // Read radio button changes
        $(document).ready(function(){
            $('input[type=radio]').change(function(){
                $paymentoption = $('input[name=paymentoptions]:checked').val();
                console.log($paymentoption);
            })
        });
        // Process the cart.checkout url
        $('#checkout').on('click',function(){
            //if $paymentoptions is 0, then exit
            if($paymentoption == 0){
                alert('Select payment option first');
                return;
            }
            $url = $('#checkout').attr('data-url').slice(0,-1);
            console.log($url + $paymentoption);
            //We are not 0, so proceed
            $.ajax({
            type: "GET",
            url: $url + $paymentoption,
            dataType: "json",
            success: function (response) {
                //AdminController is sending json reply:answer
                // console.log(response); 
                document.write(response);
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