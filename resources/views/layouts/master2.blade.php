<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/darkly.theme.css') }}"> <!-- Darkly Theme -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.4.7.0.css') }}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/toastr.2.1.3.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.1.10.16.css') }}"> <!-- DataTables -->
    <link rel="Shortcut Icon" href="{{ asset('img/favicon.ico?')}}" type="image/x-icon" > 

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
<nav class="navbar navbar-default">
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
    <div class="col-md-3 col-sm-4 col-xs-12">

        <ul class="list-group adminul">
            <!-- Main menu Admin Panel-->
            <li class="list-group-item text-info">
                <i class="fa fa-home"></i>
                HOME
            </li>
            <li class="list-group-item"><a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i>
                Dashboard</a></li>
            <li class="list-group-item text-info">
                <i class="fa fa-gears"></i>
                SITE SETTINGS
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
                MENU CATEGORIES
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
                ITEMS
            </li>
            <li class="list-group-item">
                <a href="{{ route('admin.product.index') }}">Products</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('admin.service.index') }}">Services</a>   
            </li>
            <li class="list-group-item text-info">
                <i class="fa fa-bullseye"></i>
                BUSINESS
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
                SUBSCRIPTIONS
            </li>
            <li class="list-group-item">
                <a href="{{ route('subscriptions') }}">Newsletter</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('admin.article.index') }}">Articles</a>
            </li>
            <li class="list-group-item text-info">
                <i class="fa fa-image"></i>
                IMAGES
            </li>
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
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.timeOut = 120; //How long the toast will show
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
