@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        @include('includes.errors')
        @if(Session::has('affiliate_id'))
            {{Session::get('affiliate_id')}}
        @endif
        <br>

        <div class="panel panel-primary">
            <div class="panel-heading">Sign Up</div>
            <div class="panel-body">
                {{--form--}}
                <form action="{{ route('signup') }}" method="post">
                    <div class="form-group {{ $errors->has('first_name')? 'has-error':'' }}">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ Request::old('first_name') }}">
                    </div>
                    <div class="form-group {{ $errors->has('last_name')? 'has-error':'' }}">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ Request::old('last_name') }}">
                    </div>
                    <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                        <label for="email">Your E-Mail</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ Request::old('email') }}">
                    </div>

                    <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                        <label for="password">Your Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation')? 'has-error':'' }}">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</button>

                    <input type="hidden" name="affiliate_id" value="{{  Session::get('affiliate_id') }}">
                    {{ csrf_field() }}
                </form>

            </div>
            <div class="panel-footer">
                Already have an account!
                <a href="{{ route('signin') }}">Sign In</a>
                <br>
                <a href="{{ route('privacyPolicy') }}">Privacy Policy</a>
            </div>
        </div>

        <br>
        <br>

    </div>

@endsection