@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">

        <div class="panel-heading">
            Show Article
        </div>

        <div class="panel-body">
            <h3> {{ $article->title }}</h3>
            <h4> {{ $article->synopsis }} </h4>
               
            <p>
            {!! $article->article !!}
            </p>
        </div>

    </div>

@endsection
