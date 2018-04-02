<!doctype html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- United Theme -->  --}}
    <link rel="stylesheet" href="{{ asset('css/united.theme.css') }}"> <!-- United Theme -->
    <link rel="stylesheet" href="{{ asset('css/my.css') }}"> <!-- My.css -->
    {{--  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"> <!-- Font Awesome -->  --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{--  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"> <!-- Toastr -->  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> <!-- Slick -->  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    {{--  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> <!-- Slick -->  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    {{--  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}"> <!-- DataTables -->  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <link rel="Shortcut Icon" href="{{ asset('img/favicon.ico')}}" type="image/x-icon" > 
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

<script src="{{ asset('js/jquery-3.2.1.js')}}"></script> <!-- Jquery -->
<script src="{{ asset('js/app.js') }}"></script> <!-- Bootstrap -->
{{--  <script src="{{ asset('js/toastr.min.js') }}"></script> <!-- Toastr -->  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js.map"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{--  <script src="{{ asset('js/owl.carousel.min.js') }}"></script> <!-- Slick -->  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="{{ asset('js/my.js') }}"></script> <!-- My.js -->
{{--  <script src="{{ asset('js/jquery.dataTables.js') }}"></script> <!-- DataTables -->  --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
     //Uses Toastr https://github.com/CodeSeven/toastr
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
