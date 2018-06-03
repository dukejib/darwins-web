@extends('layouts.master')

@section('content')
    <h1 class="text-center text-primary">{{ $title->name }}</h1>
    <hr>
    @if(count($data)>0)
        {{--{{ $data }}--}}
        @foreach($data as $d)
            <div class="col-md-3 col-sm-offset-0 col-sm-6  col-xs-10 col-xs-offset-1">

                <div class="thumbnail">
                    <img src="{{asset($d->image)}}" alt="{{ $d->title }}">
                    <div class="caption">
                        <h5 class="text-center">{{ $d->title }}</h5>
                        <div class="clearfix">
                            <div class="price text-center">Price : ${{ $d->price }}</div>
                            <br>

                            {{--<a href="{{ route('product.details',['id' => $product->id]) }}" class="btn btn-default pull-left" role="button">   Details</a>--}}
                            <button type="button" class="btn btn-xs btn-info pull-left btnProductDetails" value="{{$d}}"><i class="fa fa-search" aria-hidden="true"></i> Details</button>

                            <a href="{{ route('cart.addToCart',['id' => $d->id]) }}" class="btn btn-xs btn-success pull-right" role="button">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</a>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    @else
        <h3 class="text-center">There are no entries in this category</h3>
        <br>
        <br>
        <br>
    @endif


            <!-- Modal -->
        <!-- Product Details - DONE -->
        <div class="modal fade" tabindex="-1" role="dialog" id="productDetails">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Details</h4>
                    </div>
                    <div class="modal-body">
                        <h4 id="title" style="font-weight: bold"></h4>
                        <img id="image" height="200px">
                        <p id="description"></p>
                        <p id="price" style="font-weight: bold"></p>
                    </div>
                    <div class="modal-footer bg-primary">
                        <button type="button" class="btn btn-xs btn-success" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@endsection