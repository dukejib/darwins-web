@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        @include('includes.errors')

        {{--  @if(Session::has('affiliate_id'))
            {{Session::get('affiliate_id')}}
        @endif  --}}
        <br>
        
        
        <div class="panel panel-primary">
            <div class="panel-heading">Sign Up</div>
           
            <div class="panel-body">
                {{--form--}}
                <form action="{{ route('signup') }}" method="post">
                    <label for="" class="text-info text-center">We Only Accept Protonmail Email Accounts</label>
                    
                    <div class="form-group {{ $errors->has('first_name')? 'has-error':'' }}">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ Request::old('first_name') }}">
                    </div>
                    <div class="form-group {{ $errors->has('last_name')? 'has-error':'' }}">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ Request::old('last_name') }}">
                    </div>
                    <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                        <label for="email">E-Mail</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ Request::old('email') }}">
                    </div>

                    <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                        <label for="password">Password<br>
                        <small>minimum 8 characters/numbers/Symbols long</small></label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="progress">
                            {{--  JQUERY Info  --}}
                        </div> 
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation')? 'has-error':'' }}">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</button>

                    <input type="hidden" name="affiliate_id" value="{{  Session::get('affiliate_id') }}">
                    {{ csrf_field() }}
                </form>

            </div>
            
            <div class="panel-footer text-center">
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


@section('scripts')
<script>
$(document).ready(function(){
    $('#password').on('keyup',function(e){
    //    console.log($('#password').val());
        checkPasswordStrength($('#password').val());
    });
});

var pass = "f00Bsfddar!";
var strength = 1;
        
function checkPasswordStrength($value){
    
    var strength = 1;

    var arr = [/.{8,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
    jQuery.map(arr, function(regexp) {
    if($value.match(regexp))
    strength++;
        console.log(strength);
        $html = '';
        if(strength == 1){
            $html = '<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">Very Weak Password</div>';
        }else if(strength == 2){
            $html = '<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">Very Weak Password</div>';
        }else if(strength == 3){
            $html = '<div class="progress-bar progress-warning-" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">Normal Password</div>';
        }else if(strength == 4){
            $html = '<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">Good Password</div>';
        }else if(strength == 5){
            $html = '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">Strong Password</div>';
        }
        $('.progress').html($html);
    });
}

</script>    
@stop
