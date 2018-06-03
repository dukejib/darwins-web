@extends('layouts.master')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <strong>{{ $article->title }} </strong>  
    </div>
    <div class="panel-body">
        <p>
            {!! $article->article !!}
        </p>
    </div>
    <div class="panel-footer">
            Published {{  $article->created_at->diffForHumans() }}
    </div>
</div>
@endsection