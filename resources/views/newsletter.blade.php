@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                Subscribe to our NewsLetter
            </div>
            <div class="panel-body">
                <form  class="form-inline text-center" method="post" action="{{ route('newsLetter') }}">
                    <div class="form-group">
                        <label for="email">Email Address :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-xs btn-primary">Submit</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        
        {{--  If we have artilces, then show them  --}}
        @if(count($articles)>0)
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                Current Articles
            </div>

            <div class="panel-body">
                
                    <ul class="list-group">
                        @foreach($articles as $article)
                        <li class="list-group-item text-center">
                            {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                            <a href="{{ route('article.show',['id' => $article->id]) }}">{{ $article->title }} </a>
                          
                        </li>
                        @endforeach
                    </ul>       
                {{ $articles->links() }}
            </div>

        </div>
        @endif
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection
