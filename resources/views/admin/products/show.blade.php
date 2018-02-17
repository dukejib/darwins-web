@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Title : <strong>{{ $product->title }}</strong>
        </div>

        <div class="panel-body">
            <div class="col-md-4">
                <div class="form-group">
                    <img src="{{ asset($product->image) }}" width = "250px">
                    <hr>
                    <label for="">Item Type</label>
                    <p class="myp">
                        <span class="text-warning">
                            @if($product->product === 1)
                                Product
                            @else
                                Service
                            @endif
                        </span>
                    </p> 
                    <hr>
                    <label for="">Category</label>
                    <p class="myp">
                        @foreach($local_categories as $category)
                            
                        @if($category->id == $product->local_category_id)
                        <span class="text-success">{{ $category->sub_category->global_category->title }}</span> >>
                        <span class="text-info">{{ $category->sub_category->title }}</span> >>
                        <span class="text-warning">{{ $category->title }}</span>
                        @endif
                    
                        @endforeach
                    </p>
                    <hr>
                    <label for="">Slot</label>
                    <p class="myp">
                        <span class="text-success">
                                @if($product->slot == 'Featured') Featured @endif
                                @if($product->slot == 'Popular') Popular @endif
                                @if($product->slot == 'Latest') Latest @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-8">
                <label for="">Description</label>
                <p class="myp">{!! $product->description !!}</p> 
            </div>
        </div>

        <div class="panel-footer">
                <span class="text-success">Price : <strong>${{ $product->price }}</strong></span>
        </div>

    </div>

@endsection 