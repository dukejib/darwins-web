@extends('layouts.master')

@section('content')

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            @include('includes.errors')
            <br>

            <div class="panel panel-primary">
                <div class="panel-heading">Sign In</div>

                <div class="panel-body">
                    {{--form--}}
                    <form action="{{ route('signin') }}" method="post">

                        <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                            <label for="email">E-Mail</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Your Email Address">
                        </div>

                        <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder ="Your Password">
                        </div>

                        <button type="submit" class="btn btn-success btn-block"c><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</button>
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="panel-footer text-center">
                    Do not have an account!
                    <a href="{{ route('signup') }}">Sign Up here</a>
                </div>

            </div>
            <br>
            <br>

        </div>
@endsection