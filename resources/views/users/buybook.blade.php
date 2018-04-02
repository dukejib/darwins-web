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
                        <img src="{{ asset('img/affiliatecrowdfundingcover.png') }}" alt="Affiliate Crowdfunding Book" width="300px">
                    </div>

                    <div class="col-md-8">
                       <table class="table table-stripped  ">
                            <thead>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Affiliate Crowdfunding Book</td>
                                <td>
                                    1
                                </td>
                                <td>$50</td>
                            </tr>
                  
                            <tr class="label-warning">
                                <td colspan="2">Sub Total</td>
                                <td><strong>$<?php echo $subtotal = 50 ?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="2">F.E.D Tax ({{ $settings->fed_tax }} %)</td>
                                <td>$<?php echo $fed = $subtotal * $settings->fed_tax ?></td>

                            </tr>
                            <tr>
                                <td colspan="2">Shipping Charges ({{ $settings->shipping_charges }} %)</td>
                                <td>$<?php echo $shipping = ($subtotal * $settings->shipping_charges) ?></td>
                            </tr>
                            <tr class="label-primary">
                                <td colspan="2"><strong>G.Total</strong></td>
                                <td><strong>$<?php echo $subtotal + $fed + $shipping ?></strong></td>
                            </tr>
                            <tr class="label-warning">
                                <td colspan="2"><strong>Bitcoins</strong></td>
                                <td id="bit">calculating</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                    <strong><h4>Select Payment Option</h4></strong>
                    </div>
                    <div class="radio text-center">
                        <label>
                            <input type="radio" name="paymentoptions" value="1">African Express VPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="paymentoptions" value="2">USPS Money Orders&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="paymentoptions" value="3">Bitcoin Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                   
                </div>

                <div class="panel-footer text-center">
                    <?php 
                        $paymentoption = 0; //Hack for proper route - actual value is changed from jquery
                    ?>
                    <a id="url" href="{{ route('cart.checkout',['toggle' => 2,'pay' => $paymentoption ]) }}" hidden></a>
                    <button type="button" id="checkout"  class="btn btn-xs btn-success">Process Cart</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $paymentoption = 0;
        //For Bitcoin value calculation
        $(document).ready(function(){
            $usd = '{{ ($subtotal + $fed + $shipping)}}';
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
        // These variables will be used
        $paymentoption = 0;
        $url = '';
        $(document).ready(function(){
            $('input[type=radio]').change(function(){
                $paymentoption = $('input[name=paymentoptions]:checked').val();
                $url = $('#url').attr('href').slice(0,-1); //Remove the trailing 0 from the url (hack around)
                console.log($url);
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
            //We are not 0, so proceed
            $.ajax({
            type: "GET",
            url: $url + $paymentoption,
            data: { "toggle":1,"paymentoption" : $paymentoption},
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