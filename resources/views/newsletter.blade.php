@extends('layouts.master')

@section('content')

        @if($option == 1)
            {{--  Show the Newsletter subscribe form  --}}
            <div class="panel panel-primary">
                <div class="panel-heading">NewsLetter</div>
                <div class="panel-body">

                    <div class="page-header">
                        <h3>Subscribe to our Newsletter
                        <br>
                        <small>Receive emails about our products, services and many more</small>
                        </h3>
                    </div>

                    <form  class="form-inline text-center" method="post" action="{{ route('newsLetter') }}">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-success">Submit</button>    
                            </span>
                        </div>
                        
                        
                    </form>
                </div>

                <div class="panel-footer text-center">
                By subscribing to our newsletter, you are agreeing to allow us to send you solicited emails from time to time. We advise you to add  <em>mailman@morecreditcardservices.com</em> to your email whitelist contacts.
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


@endsection
