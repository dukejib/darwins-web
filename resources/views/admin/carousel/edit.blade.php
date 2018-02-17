@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Carousel (Max Image Size Allowed : 1024 Kb Width : 900 , Height : 600)
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.carousel.update',['carousel' => $carousel->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" id="heading" name="heading" class="form-control" value="{{ $carousel->heading }}">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" id="body" name="body" class="form-control" value="{{ $carousel->body }}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Existing Image</label>
                        <img src="{{ asset($carousel->image) }}" width="400px">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="new_image">Upload New Image</label>
                            <input type="file" class="form-control" id="new_image" name="new_image">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Update Carousel</button>
                </div>

            </form>
        </div>
    </div>

@endsection
