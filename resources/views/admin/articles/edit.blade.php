@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">

        <div class="panel-heading">
            Edit Article
        </div>

        <div class="panel-body">
             
            <form action="{{ route('admin.article.update',['article' => $article->id]) }}"  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  value="{{ $article->title }}">
                </div>
                <div class="form-group">
                        <label for="synopsis">Synopsis</label>
                        <input type="text" name="synopsis" class="form-control"  value="{{ $article->synopsis }}">
                    </div>
                <div class="form-group">
                    <label for="article">Content</label>
                    <textarea name="article" id="article" cols="30" rows="50" class="form-control">{{ $article->article }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success pull-right">Update Article</button>
                </div>
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
            </form>

        </div>

    </div>

@endsection