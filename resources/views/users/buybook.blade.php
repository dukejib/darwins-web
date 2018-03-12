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
                                <td>Affiliate Crowdfunding</td>
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
                                <td colspan="2">F.E.D Tax</td>
                                <td>$<?php echo $fed = $subtotal * 0.15 ?></td>

                            </tr>
                            <tr>
                                <td colspan="2">Shipping Charges</td>
                                <td>$<?php echo $shipping = ($subtotal * 0.23) ?></td>
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
                    
                    <div class="col-md-2" style="text-align:center;">
                        <h5>African Express VPC</h5>
                        <a href="http://">
                        <img src="{{ asset('img/aevpclogo.png') }}" class="center-block img-responsive" width="64px">
                        </a>
                    </div>

                    <div class="col-md-3" style="text-align:center;">
                        <h5>USPS Money Orders</h5>
                        <a href="http://">
                        <img src="{{ asset('img/upsmoney.png') }}" class="center-block img-responsive" >
                        </a>
                    </div>

                    <div class="col-md-3" style="text-align:center;">
                        <h5>Bitcoin Payments</h5>
                        <a href="{{ route('cart.checkout',['toggle' => 2])}}">
                        <img src="{{ asset('img/bitcoin.png') }}" class="center-block img-responsive" >
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
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

    </script>
@endsection