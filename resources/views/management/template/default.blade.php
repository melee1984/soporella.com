<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ URL::to('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Soporella  Management</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/whether-icon.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <!-- App css-->
    <!-- Responsive css-->
    <script src="{{ asset('js/management.js') }}" defer></script>
  </head>
  <body >
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
   
   <div id="myapp">
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper">
            <div class="logo-wrapper"></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
          </div>
          <div class="left-header col horizontal-wrapper pl-0">
          
          </div>

          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="language-nav">
                 <language></language>
              </li>
              <li>                         
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 mr-0">
                <div class="media profile-media">
                    <img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.jpg') }}" alt="">
                  <div class="media-body"><span>{{ Auth::User()->name }}</span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><i data-feather="settings"></i><span>Settings</span></li>
                  <li><i data-feather="log-in"> </i><span>Logout</span></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('images/soporella-logo.png') }}" alt=""></a></div>
          <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
          @include('management.includes.menu')
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright {{ date('Y') }} © Soporella All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Developed with  <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
       </div>

    <script type="text/javascript">
      var page_url = '{{ Request::path() }}';
      var isLogged = '{{ Auth::check() }}';
      var MAINURL = '{{ URL::to('/') }}';

      @if (Auth::check()) 
        var api_token = '{{ Auth::User()->api_token }}';  
      @else 
        var api_token = '';
      @endif
    </script>

        <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/range-slider/rangeslider-script.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/product-tab.js') }}"></script> -->
    <!-- Plugins JS Ends-->


    <script src="{{ asset('assets/js/editor/simple-mde/simplemde.min.js') }}"></script>
    <script src="{{ asset('assets/js/editor/simple-mde/simplemde.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>


      <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->


  </body>
</html>