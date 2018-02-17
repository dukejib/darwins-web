@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-lg-8 col-lg-offset-2">
            @include('includes.errors')
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Contact Us
                </div>
                <div class="panel-body">
                    <form action="{{ route('contactus') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="control-label col-xs-3">Your Name</label>

                            <div class="col-xs-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-xs-3">Your Email Address</label>

                            <div class="col-xs-9">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="control-label col-xs-3">Email Subject</label>

                            <div class="col-xs-9">
                                <input type="subject" name="subject" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="control-label col-xs-3">Message</label>

                            <div class="col-xs-9">
                                <textarea name="message" id="message" cols="50" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-3">
                                <img src="{{ asset('robot.png') }}" alt="">
                            </div>
                            <div class="col-xs-9">
                                <div  class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-xs-9 pull-right">
                                <button type="submit" class="btn btn-success">Send Email</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-lg-8 col-lg-offset-2">
            <h4 class="text-center text-primary"> You can also contact us via below given address</h4>


        <div class="panel panel-primary">
            <div class="panel-heading">
                Address
            </div>
            <div class="panel-body">
                {{ $settings->address_line1 }}<br>
                {{ $settings->address_line2 }}<br>
                {{ $settings->address_line3 }}<br>
                <br>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                Contact Us
            </div>
            <div class="panel-body">
                <i class="fa fa-phone"></i> {{ $settings->contact_line1 }}<br>
                <i class="fa fa-mobile-phone"></i> {{ $settings->contact_line2 }}<br>
                <i class="fa fa-phone-square"></i> {{ $settings->contact_mobile }}<br>
                <i class="fa fa-envelope"></i>{{ $settings->contact_email }}<br>
            </div>
        </div>

    </div>
    </div>
@endsection

@section('scripts')
    {{-- Google Recaptcha Script--}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
