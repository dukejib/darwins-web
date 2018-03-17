<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Website Logo -->
                    {{--<img src="{{ asset('img/logo.png') }}" width="55px" class="navbar-text   ">--}}
                </div>
                <!-- this div should have #mainNavbar id to be collapsed -->
                <div class="collapse navbar-collapse" id="mainNavbar">

                    <ul class="nav navbar-nav navbar-left">
                        <li> <a href="{{ route('home') }}">
                                <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        {{--  Add Dropdwon Menu  --}}
                            @include('partials.dropdownmenu')
                        {{--  Add Dropdown Menu  --}}
                        <li><a href="{{ route('originsQR') }}">The Origins of QR Code</a>
                        </li>
                        <li><a href="{{ route('howItWorks') }}">How it Works</a>
                        </li>
                        <li><a href="{{ route('theApp') }}">Order Our App</a>
                        </li>
                        <li><a href="{{ route('aboutus') }}">About Us</a>
                        </li>
                        <li><a href="{{ route('aboutbusiness') }}">About Business</a>
                        </li>
                        <li><a href="{{route('cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                                <span class="badge">{{ Session::has('cart')? Cart::count() : '' }}</span>
                            </a>
                        </li>
                        @if(Auth::check())
                            @if(Auth::user()->role != 99)
                                <li><a href="{{ route('user.profile') }}">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Account</a>
                                </li>
                            @endif
                            <li><a href="{{ route('signout') }}">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Signout</a>
                            </li>
                        @else
                            <li><a href="{{ route('signin') }}">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> Signin</a>
                            </li>
                            <li><a href="{{ route('signup') }}">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>
                            </li>
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">


                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
