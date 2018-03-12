@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Create Global Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.global.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Store Global Category</button>
                </div>

                <div class="panel-footer text-center">
                    Global Categories are Top Level Menu's Under 'Categories Button'
                </div>

            </form>
        </div>
    </div>

@endsection
