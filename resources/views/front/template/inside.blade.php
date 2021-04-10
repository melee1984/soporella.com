<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @include('front.includes.meta')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
  <body>
     <div id="app">
        <div class="container-fluid">
            @include('front.includes.header')
            @if (@$menu)
              @include('front.includes.nav')
            @endif
        </div>
        @yield('content')    
     </div> 
      @include('front.includes.footer')
      @include('front.includes.js')
    
  </body>

</html>
