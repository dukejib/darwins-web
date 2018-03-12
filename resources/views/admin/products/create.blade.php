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
                    <label for="image">Image (Only *.jpg)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success pull-right">Save Product</button>
                </div>
                {{ csrf_field() }}
            </form>

        </div>

    </div>

@endsection