@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">

        @if($option == 1)
            {{--  Show the Newsletter subscribe form  --}}
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
                        <button type="submit" class="btn btn-success">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="panel-footer text-center">
                By subscribing to our newsletter, you are agreeing to allow us to send you solicited emails from time to time. We advise you to add  <em>mailman@morecreditcardservices.com</em> to your email whilelist contacts.
                </div>

            </div>
            
            {{--  If we have artilces, then show them  --}}
            @if(Auth::check())
                 @if(count($articles)>0)
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                            Current Articles
                        </div>

                        <div class="panel-body">
                            
                            <ul class="list-group">
                                @foreach($articles as $article)
                                <li class="list-group-item text-center">
                                    {{ \Carbon\Carbon::parse($article->published_date)->diffForHumans() }}
                                    <a href="{{ route('article.show',['id' => $article->id]) }}">{{ $article->title }} </a>
                                    
                                </li>
                                @endforeach
                            </ul>       
                        {{ $articles->links() }}
                        </div>

                    </div>
                @endif 
            @endif
            {{--  Articles @If ends Here  --}}

        {{--  This option 2 is shown, when user verifies Dbl-Opt in email  --}}
        @elseif($option == 2)
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Subscribe to our NewsLetter
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-info">{{ $message }}</h3>
                </div>

                <div class="panel-footer text-center">
                By subscribing to our newsletter, you are agreeing to allow us to send you solicited emails from time to time. We advise you to add <em>mailman@morecreditcardservices.com</em> to your email whilelist contacts.
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
