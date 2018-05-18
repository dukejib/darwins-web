@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">

        <div class="panel-heading">
            Create New Product (Max Image Size Allowed : 1024 Kb)
        </div>

        <div class="panel-body">

            <form action="{{ route('admin.product.store') }}"  method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="30"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="0" step=".01" name="price" class="form-control" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="local_category_id">Category (Global > Sub > Local )</label>
                    <select name="local_category_id" id="local_category_id" class="form-control">
                        @foreach($local_categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->sub_category->global_category->title }}</span> >>
                            {{ $category->sub_category->title }}</span> >>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slot">Slot</label>
                    <select name="slot" class="form-control" id="slot">
                        <option>Featured</option>
                        <option>Popular</option>
                        <option>Latest</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="">Ensure that Image size is 200x200 px only, otherwise, it will look bad</label>
                </div>
                <div class="form-group">
                    <label for="image" class="btn btn-info pull-left">Add New Image</label>
                    <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Save Product</button>
                </div>
                {{ csrf_field() }}
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
