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
                        Your Shopping Cart has {{ Cart::content()->count() }} unique item(s)
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
                                <td colspan="2">F.E.D Tax</td>
                                <td>${{ $fed = $subtotal * 0.15 }}</td>

                            </tr>
                            <tr>
                                <td colspan="2">Shipping Charges</td>
                                <td>${{ $shipping = ($subtotal * 0.23)}}</td>
                            </tr>
                            <tr class="label-primary">
                                <td colspan="2"><strong>G.Total</strong></td>
                                <td><strong>${{ ($subtotal + $fed + $shipping)}}</strong></td>
                            </tr>
                            <tr class="label-warning">
                                <td colspan="2"><strong>Bitcoins</strong></td>
                                <td id="bit">calculating</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="{{ route('cart.clear') }}" class="btn btn-xs btn-danger pull-left">Clear Cart</a>
                        <a href="{{ route('cart.checkout',['toggle' => 1]) }}" class="btn btn-xs btn-success pull-right">Checkout</a>
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
            <?php
                $fed = 0;
                $shipping = 0;
                $subtotal = 0;
            ?>
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">You haven't selected any product yet!</div>
                    <div class="panel-body">
                        <p class="myp">
                        Please checkout our <a href="{{ route('home') }}">Products</a> page
                        </p>
                    </div>
                </div>
                <br>
                <br>
                <br><br>

            </div>
        </div>
    @endif

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