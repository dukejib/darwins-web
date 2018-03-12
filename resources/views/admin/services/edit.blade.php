@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Service (Max Image Size Allowed : 1024 KB)
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.service.update',['id' => $service->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="50" class="form-control">{!! $service->description !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="local_category_id">Category</label>
                    <select name="local_category_id" id="local_category_id" class="form-control">
                        @foreach($local_categories as $category)
                            <option value="{{ $category->id }}"
                            @if($category->id == $service->local_category_id)
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
                        <option @if($service->slot == 'Featured') selected @endif>Featured</option>
                        <option @if($service->slot == 'Popular') selected @endif>Popular</option>
                        <option @if($service->slot == 'Latest') selected @endif>Latest</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image (Only *.jpg)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-xs pull-right">Update Service</button>
                </div>

            </form>
        </div>
    </div>

@endsection
