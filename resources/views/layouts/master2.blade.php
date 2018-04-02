<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/darkly.theme.css') }}"> <!-- Darkly Theme -->
    {{--  <link rel="stylesheet" href="{{ asset('css/united.theme.css') }}"> <!-- United Theme -->  --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">   --}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}"> <!-- SummerNote -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}"> <!-- DataTables -->

</head>

<body>

        {{--  Nav Bar  --}}
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <nav class="navbar navbar-inverse">
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
                        <div class="navbar-brand">
                                <i class="fa fa-superpowers"></i> Admin Panel
                        </div>
                        {{--<img src="{{ asset('img/logo.png') }}" width="55px" class="navbar-text   ">--}}
                    </div>
                    <!-- this div should have #mainNavbar id to be collapsed -->
                    <div class="collapse navbar-collapse" id="mainNavbar">
        
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li>
                                <a href="{{ route('signout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    
    </div>

    <div class="row">

        {{-- Include our website navigation--}}
        <div class="col-md-3 col-sm-4 col-xs-12">

            <ul class="list-group">
                <!-- Main menu Admin Panel-->
                <li class="list-group-item">
                    <i class="fa fa-home text-success"></i> <span class="text-success">Home</span></li>
                <li class="list-group-item"><a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
                <li class="list-group-item text-info">
                    <i class="fa fa-gears"></i>
                    Site Settings
                </li>
                <li class="list-group-item">
                    <a href="{{ route('settings') }}">Settings</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp; 
                    <a href="{{ route('tos') }}">TOS</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.carousel.index') }}">Carousel</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('refill.show') }}">Refill Page</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp; 
                    <a href="{{ route('app.show') }}">App Page</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp; 
                    <a href="{{ route('datafile.show') }}">Data File</a></a>
                </li>
                <li class="list-group-item text-info">
                    <i class="fa fa-bars"></i>
                    Menu Categories
                </li>
                <li class="list-group-item">
                    <a href="{{ route('admin.global.index') }}">Global</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.sub.index') }}">Sub</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.local.index') }}">Local</a>
                </li>
                <li class="list-group-item text-info">
                    <i class="fa fa-clipboard"></i>
                    Items
                </li>
                <li class="list-group-item">
                    <a href="{{ route('admin.product.index') }}">Products</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.service.index') }}">Services</a>   
                </li>
                <li class="list-group-item text-info">
                    <i class="fa fa-bullseye"></i>
                    Business
                </li>
                <li class="list-group-item">
                    <a href="{{ route('customers') }}">Customers</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('affiliates') }}">Affiliates</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp; 
                    <a href="{{ route('orders') }}">Orders</a>
                </li>
                <li class="list-group-item text-info">
                    <i class="fa fa-bookmark"></i>
                    Subscriptions</li>
                <li class="list-group-item">
                    <a href="{{ route('subscriptions') }}">Newsletter</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.article.index') }}">Articles</a>
                </li>
                <li class="list-group-item text-info">
                    <i class="fa fa-image"></i>
                    Images</li>
                <li class="list-group-item">
                    <a href="{{ route('admin.photo.index') }}">Photos</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('admin.web_banner.index') }}">Web Banners</a>
                </li>
                
            </ul>

        </div>

        <div class="col-md-9 col-sm-8 col-xs-12">
            {{--Add Errors--}}
            @include('includes.errors')
            {{-- This contains our website data--}}
            @yield('content')
        </div>

    </div>

<script src="{{ asset('js/jquery-3.2.1.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/summernote.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script> <!-- DataTables -->
<script>
    //Uses Toastr https://github.com/CodeSeven/toastr
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}','Operation Successfull');
    @endif

    @if(Session::has('info'))
        toastr.info('{{ Session::get('info') }}','Information');
    @endif

    @if(Session::has('danger'))
        toastr.error('{{ Session::get('danger') }}','Cascading Data');
    @endif
</script>
@yield('scripts') <!-- Extra Scripts -->

</body>

</html>
