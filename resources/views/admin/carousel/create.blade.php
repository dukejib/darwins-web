@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Create Carousel (Max Image Size Allowed : 1024 Kb Width : 900 , Height : 600)
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.carousel.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" id="heading" name="heading" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" id="body" name="body" class="form-control">
                </div>

                <div class="form-group">
                    <label>
                    <input type="checkbox" name="show_headings" id="show_headings"
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    Show Headings 
                    </label>
                </div>

                <div class="form-group">
                    <label for="image">Upload New Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Store Carousel</button>
                </div>

            </form>
        </div>
    </div>

@endsection
