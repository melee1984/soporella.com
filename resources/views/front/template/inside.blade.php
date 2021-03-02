<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @include('front.includes.meta')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
  <body>

    <div class="container-fluid">
        @include('front.includes.header')
        @include('front.includes.nav')
    </div>

    @yield('content')

    @include('front.includes.footer')
    @include('front.includes.js')

  </body>

</html>
