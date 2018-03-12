@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Title : <strong>{{ $service->title }}</strong>
        </div>

        <div class="panel-body">
            <div class="col-md-4">
                <div class="form-group">
                    <img src="{{ asset($service->image) }}" width = "250px">
                    <hr>
                    <label for="">Item Type</label>
                    <p class="myp">
                    <span class="text-warning">
                        @if($service->product === 1)
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
                            
                            @if($category->id == $service->local_category_id)
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
                                    @if($service->slot == 'Featured') Featured @endif
                                    @if($service->slot == 'Popular') Popular @endif
                                    @if($service->slot == 'Latest') Latest @endif
                            </span>
                    </p>
                    
                </div>
            </div>
            <div class="col-md-8">
                
                <label for="">Description</label>
                <p class="myp">{!! $service->description !!}</p>
                
            </div>
        </div>

    </div>

@endsection 