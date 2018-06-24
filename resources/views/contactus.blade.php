@extends('layouts.master')

@section('content')

<div class="row">
    
    {{--  Contact us Form  --}}
    <div class="col-md-8">
    @include('includes.errors')

        <div class="panel panel-primary">
            <div class="panel-heading">Contact Us</div>
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
                            <div  class="g-recaptcha" data-sitekey="{{ Config::get('vpc.nocaptcha_sitekey') }}"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-9 pull-right">
                            <button type="submit" class="btn btn-success btn-block  ">Send Email</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

    {{--  Address Well  --}}
    <div class="col-md-4">
        
        <div class="well">

        <legend>
            <h4>You can contact us :</h4>
        </legend>

            <h4>Address</h4>
            {{ $settings->address_line1 }}<br>
            {{ $settings->address_line2 }}<br>
            {{ $settings->address_line3 }}<br>
            <br>
            <h4>Contact Us</h4>
            <i class="fa fa-phone"></i> {{ $settings->contact_line1 }}<br>
            <i class="fa fa-mobile-phone"></i> {{ $settings->contact_line2 }}<br>
            <i class="fa fa-phone-square"></i> {{ $settings->contact_mobile  }}<br>
            <i class="fa fa-envelope"></i>{{ $settings->contact_email  }}<br>
        </div>

    </div>

</div>

@endsection

@section('scripts')
    {{-- Google Recaptcha Script--}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
