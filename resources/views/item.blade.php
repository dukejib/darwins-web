@extends('layouts.master')

@section('title')
        {{ $settings->site_name }}
@endsection

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        Title : <strong>{{ $item->title }}</strong>
        @if($item->product == 1)
        <a href="{{ route('cart.add',['id' => $item->id]) }}" class="btn btn-xs btn-success pull-right"><i class="fa fa-plus"></i>Add To Cart</a>    
        @endif
    </div>

    <div class="panel-body">
        <div class="col-md-4">
            <div class="form-group">
                <img src="{{ asset($item->image) }}" width = "250px" style="border:1px solid;padding:10px">
                <hr>
                <label for="">Category</label>
                <p class="myp">
                    @foreach($local_categories as $category)
                        
                    @if($category->id == $item->local_category_id)
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
                            @if($item->slot == 'Featured') Featured @endif
                            @if($item->slot == 'Popular') Popular @endif
                            @if($item->slot == 'Latest') Latest @endif
                    </span>
                </p>
                @if($item->product == 1)
                <hr>
                <label for="">Price</label>
                <p class="myp">
                        <span class="text-success"><strong>${{ $item->price }}</strong></span>
                </p>
                @endif
            </div>
        </div>

        <div class="col-md-8">
            <label for="">Description</label>
            <p>{!! $item->description !!}</p> 
        </div>
    </div>
    @if($item->product == 1)
    <div class="panel-footer clearfix">
        <a href="{{ route('cart.add',['id' => $item->id]) }}" class="btn btn-xs btn-success pull-right"><i class="fa fa-plus"></i>Add To Cart</a>    
      
    </div>
    @endif 
</div>
@endsection