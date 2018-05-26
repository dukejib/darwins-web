@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

    <div class="row">
    
    {{--  Affiliate Crowdfunding Book  --}}
    <div class="col-md-8">

        <div class="panel panel-primary">

            <div class="panel-heading">Affiliate Program</div>

                <div class="panel-body">
                    
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('img/affiliatecrowdfundingcover.jpg') }}" alt="Affiliate Crowdfunding Book" class="media-object" width="200px">
                        </div>
                        <div class="media-body">
                            <p class="text-justify">Let me ask you a question, if there was a way for you to launch your own dream project with "Other People's Money" (O.P.M.) would you be interested in the following details below?</p>
                            
                            <ul>
                                <li>Without having to repay the money!</li>
                                <li>Without having to pay interest!</li>
                                <li>Without having to pay percent fees!</li>
                                <li>Without having to show your business plan!</li>
                                <li>Without any deadlines on raising capital for your projects!</li>
                                <li>No giving up equity or debt placement for tangible or monetary rewards in your company!</li>
                                <li>Funding is unlimited and not based upon a pyramid platform!</li>
                            </ul>
                        </div>
                        <p class="text-justify"><strong>LOOK NO FURTHER...</strong> Tarik C. Richards of More Credit Card Services <strong>(MCCS)</strong> introduces to you a newly launched monetizing strategy and system for businesses looking to acquire capital more efficiently and effectively called <strong>Affiliate Crowdfunding</strong>. MCCS was motivated in its research to developing the most unique and innovative Crowdfunding Plan and Strategy for our serious affiliate members. <strong>Our Affiliate Crowdfunding Program</strong> not only generates capital within itself, but also in the optional <strong>"Two Separate & Diverse Program Methods"</strong> for our affiliate members called <strong>Brick & Mortar Business</strong> and <strong>Internet Viral Business</strong> for earning extra capital.</p>

                        <p class="text-justify"><strong>Other Benefits:</strong></p>

                        <ul>
                            <li>Earn 50% commissions for every referral purchase of this E-Book Guide!</li>
                            <li>Learn how to build an organization from the serious affiliates you refer and earn extra capital!</li>
                            <li>Our Affiliate Crowdfunding Program cultivates and preserves Black Business & Community!</li>
                            <li>Learn how to invest in Bitcoin (BTC) more effectively to fund your personal endeavors!</li>
                            <li>As Bitcoin (BTC) rises, it is never too late investing in it through our Affiliate Crowdfunding Program!</li>
                            <li>Receive our FREE Affiliate Tools Package when becoming an Affiliate Crowdfunding Member! </li>
                        </ul>

                        <p class="text-justify">
                            As a result of this launch, we want to educate you on how to implement your Business Niche through our Marketing Strategies for the purposes of Crowdfunding Success. When you discover the secrets on how to use our revolutionary affiliate program to raise the capital for whatever your personal endeavors are&comma; it will drastically change your life!</p>
                        <p class="text-justify">
                            People have used many Mainstream Crowdfunding Platforms to launch their own ideas, projects, pay for marketing campaigns, further their education with college tuition, and even pay for their personal activities etc... However, none of them can come close to matching our strategic benefits to raise capital more efficiently and effectively like our <strong>Affiliate Crowdfunding Program</strong> does. No matter what you need to raise the capital for your personal endeavors, our <strong>Affiliate Crowdfunding Program</strong> can help <strong>GUARANTEE SUCCESS!</strong>

                        </p>
                    </div>
                </div>
            </div>


    </div>
    <div class="col-md-4">
        @include('includes.errors')

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

    </div>
    
    
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
