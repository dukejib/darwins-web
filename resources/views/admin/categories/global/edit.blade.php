@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Global Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.global.update',['global' => $category->id]) }}" method="post">
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $category->title }}">
                </div>

                <div class="form-group">
                    <label>
                    <input type="checkbox" name="active" id="active"
                    @if($category->active)
                        checked
                    @else
                        unchecked
                    @endif
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    Active (For Use in Sub Categories)
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Update Global Category</button>
                </div>

            </form>
        </div>
    </div>

@endsection
