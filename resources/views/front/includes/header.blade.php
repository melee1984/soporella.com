<!--Header-->
<div id="header" class="container">
  <div class="row v-center">
    <!--Logo-->
    <div class="col-lg-4 col-xs-6">
      <a href="{{URL::to('/')}}"><img class="img-responsive" src="{{ asset('theme/images/soporella-logo.png') }}" alt="Soporella - Your Ticketing Outlet" />
    </div>  
    <!--Login/Register-->
    <div class="col-lg-7 padding-r0 text-right hidden-xs">   
      <ul>
        @if (!Auth::check())
          <li><a href="{{ URL::to('/login') }}">{{trans('messages.HEADER_TITLE_LOGIN')}}</a></li>
          <li><a href="{{ URL::to('register') }}">{{trans('messages.HEADER_TITLE_REGISTER')}}</a></li>
        @else 
          <li><a href="{{ route('profile.dashboard') }}">{{trans('messages.HEADER_TITLE_MY_ACCOUNT')}}</a></li>

           <li><a href="{{ route('user.logout') }}">{{ trans('messages.LABEL_LOGOUT') }}</a></li>
          
        @endif
        <li>
          <cart-total></cart-total>
        </li>
        <li>
          <a href="#">
            <div id="search">
              <form action="" id="submitSearch"></form>
                <input type="search" name="search" placeholder="" value="{{@$_GET['search']}}">
              </form>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <!--Language-->
    <div id="country" class="col-lg-1 col-xs-4 padding-l0 text-right">
      <language-list></language-list>
    </div>

    <!--Hamburger-->
    <div class="col-xs-2 visible-xs text-right">
     

       <div class="mmenu" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
      </div>

      <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        
        <div class="mmenu change buttonClose" onclick="w3_close()">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
        
        <h2>{{ trans('messages.LABEL_ATTRACTIONS') }}</h2>

        <ul>
           @foreach($menus as $menu)
            <li><a title="{{ $menu->language_string['title'] }}" class="{{ (request()->segment(1) == $menu->slug) ? 'active' : '' }}" 
                href="{{ route('page.category', [app()->getLocale(), $menu->slug]) }}">{{ $menu->language_string['title'] }}</a></li>
            @endforeach
            <li><a title="Promotions" id="promo" class="promo" href="{{ route('promotions', app()->getLocale()) }}">{{ trans('messages.PROMOTIONS') }}</a></li>
        </ul>

        <ul class="account">
          @if (!Auth::check())
            <li><a href="{{ URL::to('/login') }}">{{trans('messages.HEADER_TITLE_LOGIN')}}</a></li>
            <li><a href="{{ URL::to('register') }}">{{trans('messages.HEADER_TITLE_REGISTER')}}</a></li>
          @else 
            <li><a href="{{ route('profile.dashboard') }}">{{trans('messages.HEADER_TITLE_MY_ACCOUNT')}}</a></li>
            <li><a href="{{ route('profile.dashboard') }}"> <cart-total></cart-total></a></li>
            <li><a href="{{ route('user.logout') }}">{{ trans('messages.LABEL_LOGOUT') }}</a></li>

            <li>&nbsp;</li>

             <li><a href="{{ route('aboutus') }}">{{ trans('messages.FOOTER_QL_ABOUT_US') }}</a></li>
              <li><a href="{{URL::to('sell-tickets-with-us')}}">{{ trans('messages.FOOTER_QL_SELL_TICKET') }}</a></li>
              <li><a href="{{URL::to('disclaimer')}}">
                {{ trans('messages.DISCLAIMER') }}
              </a></li>
              <li><a href="{{URL::to('terms-and-condition')}}">
                {{ trans('messages.TERMSANDCONDITIONS') }}
                
              </a></li>
              <li><a href="{{URL::to('privacy-policy')}}">
                {{ trans('messages.PRIVACYPOLICY') }}
              </a></li>
              <li><a href="{{URL::to('shipping-and-return-policy')}}">
                {{ trans('messages.SHIPPINGANDRETURN') }}
              </a></li>
              <li><a href="{{URL::to('sitemap')}}"> {{ trans('messages.FOOTER_QL_SITEMAP') }}</a></li>
              <li><a href="{{URL::to('contact-us')}}"> {{ trans('messages.FOOTER_QL_CONTACTUS') }}</a></li>

          @endif

        </ul>

    </div>


    </div>
  </div>
</div>

<script>
  function myFunction(x) {
    w3_open();
  }
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
  }

  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
  }
</script>


