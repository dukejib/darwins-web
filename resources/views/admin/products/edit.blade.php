@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Product (Max Image Size Allowed : 1024 Kb)
        </div>

        <div class="panel-body">

            <form action="{{ route('admin.product.update',['product' => $product->id]) }}"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="50" class="form-control">{!! $product->description !!}</textarea>
                    </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="0" step=".01" name="price" class="form-control" value="{{ $product->price }}" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="local_category_id">Category</label>
                    <select name="local_category_id" id="local_category_id" class="form-control">
                        @foreach($local_categories as $category)
                            <option value="{{ $category->id }}"
                            @if($category->id == $product->local_category_id)
                                selected
                            @endif
                            >{{ $category->sub_category->global_category->title }}</span> >>
                            {{ $category->sub_category->title }}</span> >>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slot">Slot</label>
                    <select name="slot" class="form-control" id="slot">
                        <option @if($product->slot == 'Featured') selected @endif>Featured</option>
                        <option @if($product->slot == 'Popular') selected @endif>Popular</option>
                        <option @if($product->slot == 'Latest') selected @endif>Latest</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="btn btn-success pull-left">Add New Image</label>
                    <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-xs pull-right">Update Product</button>
                </div>
            
            </form>
        </div>

    </div>

@endsection 

@section('scripts')
    <script>
    document.getElementById("image").onchange = function() {
        document.getElementById("form").submit();
    };
    </script>
@endsection