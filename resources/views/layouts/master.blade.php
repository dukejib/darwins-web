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
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> <!-- Slick -->

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
<script src="{{ asset('js/toastr.min.js') }}"></script> <!-- Toastr -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> <!-- Slick -->
<script src="{{ asset('js/my.js') }}"></script> <!-- My.js -->
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
