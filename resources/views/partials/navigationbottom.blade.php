
    <div class="row">
        {{--  <div class="col-md-10 col-md-offset-1">  --}}
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
                    {{--<div class="navbar-header">--}}
                        {{--<button type="button" class="navbar-toggle  " data-toggle="collapse" data-target="#footerNavbar">--}}
                            {{--<span class="sr-only">Toggle navigation</span>--}}
                            {{--<span class="icon-bar"></span>--}}
                            {{--<span class="icon-bar"></span>--}}
                            {{--<span class="icon-bar"></span>--}}
                        {{--</button>--}}
                        {{--<!-- Website Logo -->--}}
                        {{--<img src="{{ asset('img/logo.png') }}" width="55px" class="navbar-text   ">--}}
                    {{--</div>--}}
                    <!-- this div should have #mainNavbar id to be collapsed -->
                    <div class="text-center">

                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="{{ route('privacyPolicy') }}">
                                    <i class="fa fa-user-secret"></i>
                                    Privacy Policy</a>
                            </li>
                            <li><a href="{{ route('termsOfService') }}">Terms of Service</a>
                            </li>
                            <li><a href="{{ route('affiliate.document') }}">
                                    <i class="fa fa-users"></i>
                                    Affiliates</a>
                            </li>
                            <li><a href="{{ route('newsLetter') }}">
                                    <i class="fa fa-newspaper-o"></i>
                                    News Letter</a>
                            </li>
                            <li><a href="{{ route('contactus') }}">
                                    <i class="fa fa-phone"></i>
                                    Contact Us</a>
                            </li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>



