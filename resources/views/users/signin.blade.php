@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

        <div class="col-md-4 col-md-offset-4">
            @include('includes.errors')
            <br>

            <div class="panel panel-primary">
                <div class="panel-heading">Sign In</div>

                <div class="panel-body">
                    {{--form--}}
                    <form action="{{ route('signin') }}" method="post">

                        <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                            <label for="email">Your E-Mail</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>

                        <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                            <label for="password">Your Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</button>
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="panel-footer">
                    Do not have an account!
                    <a href="{{ route('signup') }}">Sign Up here</a>
                </div>

            </div>
            <br>
            <br>

        </div>
@endsection