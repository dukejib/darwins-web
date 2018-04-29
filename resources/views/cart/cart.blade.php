@extends('layouts.master')

@section('title')
    {{ $settings->site_name}}
@endsection

@section('content')
@if(Session::has('cart'))

    <div class="row">
        <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="panel panel-primary ">
                <div class="panel-heading text-center">
                    Step 1 : Add/Remove Items in Your Cart
                </div>
                <div class="panel-body">
                    <table class="table table-stripped  ">
                        <thead>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </thead>

                        <tbody>
                        @foreach(Cart::content() as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                <a href="{{ route('cart.increase',['id' => $product->rowId , 'qty' => $product->qty] ) }}" class="btn btn-xs btn-success">+</a>
                                &nbsp;&nbsp;{{ $product->qty }}&nbsp;&nbsp;
                                <a href="{{ route('cart.decrease',['id' => $product->rowId , 'qty' => $product->qty]) }}" class="btn btn-xs btn-info" >-</a>
                            </td>
                            <td>${{ $product->price }} &nbsp;&nbsp; [ ${{ $product->price * $product->qty }} ]</td>
                        </tr>
                        @endforeach
                        <tr class="label-warning">
                            <td colspan="2">Sub Total</td>
                            <td><strong>${{ $subtotal }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right;">F.E.D Tax ({{ $settings->fed_tax }} %)</td>
                            <td>${{ $fed = $subtotal * $settings->fed_tax }}</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right;">Shipping Charges ({{ $settings->shipping_charges }} %)</td>
                            <td>${{ $shipping = ($subtotal * $settings->shipping_charges)}}</td>
                        </tr>
                        <tr class="label-primary">
                            <td colspan="2" style="text-align:right;"><strong>G.Total</strong></td>
                            <td><strong>${{ ($subtotal + $fed + $shipping)}}</strong></td>
                        </tr>
                        <tr class="label-warning">
                            <td colspan="2" style="text-align:right;"><strong>Bitcoins</strong></td>
                            <td id="bit">Calculating</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('cart.clear') }}" class="btn btn-xs btn-danger">Discard Cart</a>
                </div>
            </div>
        </div>

        <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Step 2 : Select Payment Option
                </div>
                <div class="panel-body">
                    <div class="radio text-center">
                        <label>
                            <input type="radio" name="paymentoptions" value="1" disabled>African Express VPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="paymentoptions" value="2">USPS Money Orders&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="paymentoptions" value="3">Bitcoin Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a id="url" href="{{ route('cart.checkout',['toggle' => 1,'pay' => 0 ]) }}" hidden></a>
                    <button type="button" id="checkout"  class="btn btn-xs btn-success" data-url="{{ route('cart.checkout',['toggle' => 1,'pay' => 0 ]) }}">Process Cart</button>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>
@else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">You have not selected any product yet!</div>
                <div class="panel-body">
                    <p class="myp">
                    Please view our services catalouge at <a href="{{ route('home') }}">Products</a> page
                    </p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
@endif

@endsection

@section('scripts')
<script>
    // Process the USD to Bitcoin Script
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