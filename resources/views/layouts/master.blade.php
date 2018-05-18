<!doctype html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ali Jibran">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/united.theme.3.3.7.css') }}"> <!-- Main Theem -->
    <link rel="stylesheet" href="{{ asset('css/e-commerce.css') }}"> <!-- My.css some basic styling -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.4.7.0.css') }}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/toastr.2.1.3.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> <!-- Owl Carousel Theme -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.1.10.16.css') }}"> <!-- DataTables -->
    <link rel="Shortcut Icon" href="{{ asset('img/favicon.ico?')}}" type="image/x-icon" > 

    @yield('styles') <!-- More Styles -->

</head>

<body>
{{-- Include our Website Header--}}
    @include('partials.header')
{{-- Include our website navigation--}}
    @include('partials.navigation')
{{-- This contains our website data--}}
    <div class="container">
        @yield('content')
    </div>
    <hr>
{{-- Include the website footer--}}
    @include('partials.footer')
{{-- Include bottom navigation --}}
    @include('partials.navigationbottom')

{{--  Scripts For Bootstrap --}}
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.3.3.7.js')}}"></script>
<script src="{{ asset('js/toastr.min.2.1.3.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('js/dataTables.1.10.16.js') }}"></script>
<script src="{{ asset('js/e-commerce.js') }}"></script>  
<script src="{{ asset('js/clipboard-2.0.1.js') }}"></script>

<script>
    //Uses Toastr https://github.com/CodeSeven/toastr
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.timeOut = 120; //How long the toast will show
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}','Operation Successfull');
    @endif

    @if(Session::has('info'))
        toastr.info('{{ Session::get('info') }}','Important Information');
    @endif

    @if(Session::has('danger'))
        toastr.error('{{ Session::get('danger') }}','Cascading Data');
    @endif
</script>

@yield('scripts') <!-- More Scripts -->

</body>
</html>
