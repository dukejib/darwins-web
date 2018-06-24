<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css'/>
    {{--  <link rel="stylesheet" href="{{ asset('css/darkly.theme.css') }}"> <!-- Darkly Theme -->  --}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome.4.7.0.css') }}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/toastr.2.1.3.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.1.10.16.css') }}"> <!-- DataTables -->
    <link rel="Shortcut Icon" href="{{ asset('img/favicon.ico?')}}" type="image/x-icon" > 

    <style>
        nav {
            background-color:#222222;
        }
        nav .home {
            padding:20px;
            line-height:100px;
            color:white;
            font-weight:150%;
        }

        nav ul li a {
            color:white;
        }

    </style>

    {{--  Google Charts  --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Numbers'],
          ['Total Orders',     11],
          ['Pending',      2],
          ['Completed',  2],
        ]);

        var options = {
            title: 'Daily Orders',
            pieHole: 0.3,
            //legend : 'none',
            legend: {
                position : 'right',
                alignment : 'center',
                textStyle : {
                        color : '#fff'
                    },
                },
            pieSliceText: 'label',
            pieStartAngle: 100,
            backgroundColor: '#3e3f3a',
            chartArea:{left:10,top:5,width:'90%',height:'90%'},
        };

        var chart = new google.visualization.PieChart(document.getElementById('orderChart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Purchased'],
          ['Galaxy S7',     23],
          ['BMX Tricon',     51],
          ['Axl Basic',  23],
          ['DSLR Tripod',  41],
          ['Jumbo Selfie Stick',  19],
        ]);

        var options = {
            title: 'Top Products',
            pieHole: 0.3,
            //legend : 'none',
            legend: {
                position : 'right',
                alignment : 'center',
                textStyle : {
                        color : '#fff'
                    },
                },
            pieSliceText: 'label',
            pieStartAngle: 100,
            backgroundColor: '#3e3f3a',
            chartArea:{left:10,top:5,width:'90%',height:'90%'},
        };

        var chart = new google.visualization.PieChart(document.getElementById('orderTopProducts'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Orders', 'Products', 'Services'],
          ['Jan', 48, 23, 25],
          ['Feb', 59, 28, 31],
          ['Mar', 83, 57, 26],
          ['April', 81, 61, 20]
        ]);

        var options = {
          chart: {
            title: 'Sales & Services',
            subtitle: 'Orders > Products > Services',
            
            chartArea:{
                left:10,
                top:0,
                width:'90%',
                height:'100%',
                backgroundColor:'#fff',
                },
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    {{--  Google Charts  --}}
</head>

<body>

{{--  Navbar  --}}
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Website Logo -->
            <div class="navbar-brand">
                <i class="fa fa-superpowers"></i> Administration Panel
            </div>
        </div>
        <!-- this div should have #mainNavbar id to be collapsed -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><i class="fa fa-users"></i> Online Users <span class="badge">{{ $online_user_count }}</span></a>
                </li>
                <li>
                    <a href="{{ route('signout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
{{--  Navbar  --}}

<div class="row">

    {{-- Include our website navigation--}}
    <div class="col-md-2 col-sm-3 col-xs-12">

        <nav>
            <ul class="nav">
                <li><span class="home"><i class="fa fa-home"></i>   Home</span></li>
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                    Dashboard</a>
                </li>
                {{--  Dropdown 1  --}}
                <li>
                <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">Site Settings <i class="fa fa-angle-down"></i>
                    </a>
                </li>
                <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                    <li><a href="{{ route('settings') }}">Settings</a></li>
                    <li><a href="{{ route('tos') }}">Terms of Service</a></li>
                    <li><a href="{{ route('brochure') }}">Brochure</a></li> 
                    <li><a href="{{ route('admin.carousel.index') }}">Carousel</a></li>   
                    <li><a href="{{ route('get_btc_settings') }}">Blockchain</a></li>
                    <li><a href="{{ route('refill.show') }}">Refill Page</a></li>
                    <li><a href="{{ route('app.show') }}">App Page</a></li>
                    <li><a href="{{ route('datafile.show') }}">Data File</a></a></li> 
                </ul>
                {{--  Dropdown 2  --}}
                <li>
                <a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false">Menu Categories <i class="fa fa-angle-down"></i></a>
                </li>
                <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-2">
                    <li><a href="{{ route('admin.global.index') }}">Global</a></li>
                    <li><a href="{{ route('admin.sub.index') }}">Sub</a></li>
                    <li><a href="{{ route('admin.local.index') }}">Local</a></li>
                </ul>
                {{--  Dropdown 3  --}}
                <li>
                <a href="#" id="btn-3" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">Items | Products | Services <i class="fa fa-angle-down"></i></a>
                </li>
                <ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="btn-3">
                    <li><a href="{{ route('admin.product.index') }}">Products</a></li>
                    <li><a href="{{ route('admin.service.index') }}">Services</a></li>
                </ul>
                {{--  Dropdown 4  --}}
                <li>
                <a href="#" id="btn-4" data-toggle="collapse" data-target="#submenu4" aria-expanded="false">Crowdfunding <i class="fa fa-angle-down"></i></a>
                </li>
                <ul class="nav collapse" id="submenu4" role="menu" aria-labelledby="btn-4">
                    <li><a href="{{ route('customers') }}">Customers</a></li>
                    <li><a href="{{ route('affiliates') }}">Affiliates</a></li>
                </ul>
                {{--  Dropdown 5  --}}
                <li>
                <a href="#" id="btn-5" data-toggle="collapse" data-target="#submenu5" aria-expanded="false">Business <i class="fa fa-angle-down"></i></a>
                </li>
                <ul class="nav collapse" id="submenu5" role="menu" aria-labelledby="btn-5">
                    <li><a href="{{ route('orders') }}">Orders</a></li>
                </ul>
               

                <li><a href="{{ route('subscriptions') }}">Newsletter</a></li>
                <li><a href="{{ route('admin.article.index') }}">Articles</a></li>
                <li><a href="{{ route('admin.testimonials') }}">Testimonials</a></li>
                <li><a href="{{ route('admin.photo.index') }}">Photos</a></li>
                <li><a href="{{ route('admin.web_banner.index') }}">Web Banners</a></li>
                <li><a href="{{ route('admin.profile') }}">My Profile</a></li>

                
            
            </ul>
        </nav>

    </div>

    <div class="col-md-10 col-sm-9 col-xs-12">
        {{--Add Errors--}}
        @include('includes.errors')
        {{-- This contains our website data--}}
        @yield('content')
    </div>

</div>


{{--  Scripts For Bootstrap --}}
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.3.3.7.js')}}"></script>
<script src="{{ asset('js/toastr.min.2.1.3.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('js/dataTables.1.10.16.js') }}"></script>
<script src="{{ asset('js/summernote.js') }}"></script>
<script src="{{ asset('js/administration.js') }}"></script>

<script>
    //Uses Toastr https://github.com/CodeSeven/toastr
    /** Toastr Options */
    //Toastr Settings
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    //"positionClass": "toast-bottom-full-width",
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    };
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
