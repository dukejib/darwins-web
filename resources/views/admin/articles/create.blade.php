@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">

        <div class="panel-heading">
            Create New Article
        </div>

        <div class="panel-body">

            <form action="{{ route('admin.article.store') }}"  method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  value="{{ Request::old('title') }}">
                </div>
                <div class="form-group">
                        <label for="synopsis">Synopsis</label>
                        <input type="text" name="synopsis" class="form-control"  value="{{ Request::old('synopsis') }}">
                    </div>
                <div class="form-group">
                    <label for="article">Content</label>
                    <textarea name="article" id="article" cols="30" rows="50" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success pull-right">Save Article</button>
                </div>
                {{ csrf_field() }}
            </form>

        </div>

    </div>

@endsection