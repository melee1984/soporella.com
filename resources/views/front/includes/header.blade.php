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
      <a href="{{ URL::to('lang/en') }}"><img class="img-responsive" src="{{asset('theme/images/flags/eng_flag.svg')}}" alt="English" /></a>
      <a href="{{ URL::to('lang/de') }}"><img class="img-responsive" src="{{asset('theme/images/flags/german_flag.svg')}}" alt="German" /></a>
    </div>
    <!--Hamburger-->
    <div class="col-xs-2 visible-xs text-right">
      <div id="showRightPush" class="hamburger hamburger--spin">
        <div class="hamburger-box">
          <div class="hamburger-inner"></div>
        </div>
      </div>
    </div>
  </div>
</div>
