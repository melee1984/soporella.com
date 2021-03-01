<!DOCTYPE html>
<html lang="en">
<head>

@include('front.includes.meta')

<!--CSS-->
<link href="{{ asset('theme/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=K2D:200,300,700" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="{{ asset('theme/css/hamburgers.css') }}" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="cbp-spmenu-push">

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
          <li><a href="{{ URL::to('/my-account') }}">{{trans('messages.HEADER_TITLE_MY_ACCOUNT')}}</a></li>
          <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
        @endif
        <li>
          <a href="{{URL::to('shopping-cart/basket')}}">{{trans('messages.HEADER_LABEL_MY_TICKET')}} (
            <span id="tickets_no"> 12 </span>)</a>
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
      <a href="#"><img class="img-responsive" src="{{asset('theme/images/flags/eng_flag.svg')}}" alt="English" /></a>
      <a href="#"><img class="img-responsive" src="{{asset('theme/images/flags/german_flag.svg')}}" alt="German" /></a>
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

<!--Tickets Mobile-->
<div id="tic-mob" class="container visible-xs">
  <div class="row">
    <div class="col-lg-12 text-right">
      <a href="{{URL::to('shopping-cart/basket')}}">{{trans('messages.HEADER_LABEL_MY_TICKET')}} <span id="tickets_no">( 0 )</span></a>
    </div>
  </div>
</div>

<div id="nav_wrap" class="nav-cops hidden-xs">
  <div id="navi" class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <ul> <li class="displayOnTop hide"><a href="https://soporella.com"><img src="https://soporella.com/assets/images/soporella-emblem.png" alt=""></a></li><li><a title="Themeparks" class="themeparks" href="https://soporella.com/themeparks">Themeparks</a></li><li><a title="Waterparks" class="waterparks" href="https://soporella.com/waterparks">Waterparks</a></li><li><a title="Sightseeing" class="sightseeing" href="https://soporella.com/sightseeing">Sightseeing</a></li><li><a title="Family" class="family" href="https://soporella.com/family">Family</a></li><li><a title="Adventure" class="adventure" href="https://soporella.com/adventure">Adventure</a></li><li><a title="Sports" class="sports" href="https://soporella.com/sports">Sports</a></li><li><a title="Culture" class="culture" href="https://soporella.com/culture">Culture</a></li><li><a title="Promotions" id="promo" class="promo" href="https://soporella.com/promotions">Promotions</a></li><li class="displayOnTop hide"><a href="https://soporella.com/shopping-cart/basket">My Tickets</a></li></ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item">
            <img src="https://soporella.com/assets/images/bnr-festival-promo.jpg" alt="Winter Festive 20% Promotion">
            <div class="carousel-caption">
              <h2>IMG Worlds of Adventure Winter Festive 20% Promotion</h2>
              <p>on all Fast Track options. Valid from 25th November 2019 – 31st December 2019.</p>
              <a class="buy" href="https://soporella.com/top/img-worlds-of-adventure">Buy Tickets</a>
            </div>
          </div>
          <div class="item active">
            <img src="https://soporella.com/theme2018/images/banner/desert-bus.jpg" alt="Promotion 25% OFF">
            <div class="carousel-caption">
              <h2>25% OFF on Afternoon Desert Safari &amp; Big Bus Tour</h2>
              <p>Welcome to the city that has it all. Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm and futuristic dynamism.</p>
              <a class="buy" href="https://soporella.com/top/afternoon-desert-safari-and-big-bus-tour-classic,-1-day">Buy Tickets</a>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <img src="https://soporella.com/theme2018/images/icon-prev.png" alt="Previous">
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <img src="https://soporella.com/theme2018/images/icon-next.png" alt="Next">
        </a>
      </div>


    <div id="top" class="container">
  <!--Top Attractions-->
  <div class="row">
    <div class="col-lg-12">
      <h3>Top Attractions</h3>
    </div>
  </div>
  <!--List-->
  <div class="row">
    <div class="tab-content">
      <!--Dubai-->
                           
            <div id="display_0" class="tab-pane fade  in active">
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-burj-khalifa-1.jpg" alt="At the Top &amp; Sky at Burj Khalifa" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa" title="At the Top &amp; Sky at Burj Khalifa">At the Top &amp; Sky at Burj Khali...</a></h4>
                  <p>"At the Top &amp; Sky" are observation decks of the world’s tallest building and from the<a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/big-bus-tours-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/big-bus-tours.jpg" alt="Big Bus Tours (Dubai)" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/big-bus-tours-dubai" title="Big Bus Tours (Dubai)">Big Bus Tours (Dubai)</a></h4>
                  <p>Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. E<a href="https://soporella.com/top/big-bus-tours-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/big-bus-tours-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/desert-safari-and-bbq-dinner">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/12.jpg" alt="Desert Safari &amp; BBQ Dinner" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/desert-safari-and-bbq-dinner" title="Desert Safari &amp; BBQ Dinner">Desert Safari &amp; BBQ Dinner</a></h4>
                  <p>After a pickup from your hotel, relax in an air-conditioned 4x4 vehicle as you head t<a href="https://soporella.com/top/desert-safari-and-bbq-dinner">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/desert-safari-and-bbq-dinner">Buy Tickets</a>
                </div>
                 
                                                                                                     
                    <div id="offer-one" class=" hide container offer hidden-xs hidden-md ">
                      <div class="row v-center">
                        <div class="offer-bgr col-lg-12 v-center">
                          <img class="img-responsive" src="https://www.soporella.com/assets/images/bgr-offer1.png" alt="Offer">
                          <div class="offer-wrap">
                            <div class="col-lg-8 offer-txt">
                              <div class="ribbon-2 v-center">
                                <span>Soporella Offer</span>
                              </div>
                              <h3>Burj Khalifa Sky Deck  &amp; Afternoon Desert Safari </h3>
                              <p> Take advantage of this discounted combo which allows you to experience and be mesmerized as you enjoy Dubai skyline from the top of the world’s tallest building, Burj Khalifa as well as to indulge into an exhilarating desert safari adventure.  </p>
                              <table class="table">
                                <tbody><tr>
                                  <td>Adults</td>
                                  <td>675.00 AED</td>
                                </tr>
                                <tr>
                                  <td>Kids</td>
                                  <td>610.00 AED</td>
                                </tr>
                              </tbody></table>
                                 <a class="buy" href="https://soporella.com/top/burj-khalifa-sky-deck--and-afternoon-desert-safari">Buy Ticket</a>
                            </div>
                            <div class="col-lg-4 offer-img">
                              <img class="img-responsive" src="https://www.soporella.com/assets/images/activity/thumbnail/soporella-burj-khalifa-2.jpg" alt="">
                              <img class="img-responsive" src="https://www.soporella.com/assets/images/activity/thumbnail/DSC_0240.jpg" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                                       <div class="row ">
                      <div class="col-lg-12 top-title">
                        <h3>Featured Attractions</h3>
                      </div>
                    </div>
                                                <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/helidubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/helidubai-01.jpg" alt="HeliDubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/helidubai" title="HeliDubai">HeliDubai</a></h4>
                  <p>HeliDubai is the premier helicopter service provider in the UAE, offering a wide rang<a href="https://soporella.com/top/helidubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/helidubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/img-worlds-of-adventure">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/750 x 500 px.jpg" alt="IMG Worlds of Adventure" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/img-worlds-of-adventure" title="IMG Worlds of Adventure">IMG Worlds of Adventure</a></h4>
                  <p>IMG Worlds of Adventure in Dubai is the world's largest indoor theme park. Thrilling<a href="https://soporella.com/top/img-worlds-of-adventure">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/img-worlds-of-adventure">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/seawings">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/Exterior-Jebel-Ali-Base.jpg" alt="Seawings" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/seawings" title="Seawings">Seawings</a></h4>
                  <p>Dubai Experience Seawings offers you a unique sightseeing excursion across Dubai’s ev<a href="https://soporella.com/top/seawings">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/seawings">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/wild-wadi-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-wild-wadi-7.jpg" alt="Wild Wadi Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/wild-wadi-waterpark" title="Wild Wadi Waterpark">Wild Wadi Waterpark</a></h4>
                  <p>Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers<a href="https://soporella.com/top/wild-wadi-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/wild-wadi-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/dolphin-and-seal-show">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-dolphinarium-1.jpg" alt="Dolphin and Seal Show" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/dolphin-and-seal-show" title="Dolphin and Seal Show">Dolphin and Seal Show</a></h4>
                  <p>Get up close and personal to graceful bottlenose dolphins and playful northern fur se<a href="https://soporella.com/top/dolphin-and-seal-show">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/dolphin-and-seal-show">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/aquaventure-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-aquaventure-15.jpg" alt="Aquaventure Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/aquaventure-waterpark" title="Aquaventure Waterpark">Aquaventure Waterpark</a></h4>
                  <p>Atlantis The Palm is the home of Aquaventure &amp; ultimate fun day out. This water park<a href="https://soporella.com/top/aquaventure-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/aquaventure-waterpark">Buy Tickets</a>
                </div>
                 
                                                                                          <!--Banner 02-->
                                                <div id="offer-two" class="hide container offer hidden-xs hidden-md ">
                              <div class="row v-center">
                                <div class="offer-bgr col-lg-12 v-center">
                                  <img class="img-responsive" src="https://www.soporella.com/assets/images/bgr-offer2.png" alt="Offer">
                                  <div class="offer-wrap">
                                    <div class="col-lg-9 offer-txt">
                                      <div class="ribbon-2 v-center">
                                        <span>Offer of the month</span>
                                      </div>
                                       <h3>Wild Wadi &amp; Afternoon Desert Safari</h3>
                                      <p> Enjoy 30 rides and attractions with the family at Wild Wadi and indulge into an exhilarating desert safari adventure later in the afternoon. </p>
                                      <table class="table">
                                        <tbody><tr>
                                          <td>Adults</td>
                                          <td>445.00 AED</td>
                                        </tr>
                                        <tr>
                                          <td>Kids</td>
                                          <td>345.00 AED</td>
                                        </tr>
                                      </tbody></table>
                                      <a class="buy" href="https://soporella.com/top/wild-wadi-and-afternoon-desert-safari">Buy Ticket</a>
                                    </div>
                                    <div class="col-lg-3 offer-img">
                                      <img class="img-responsive" src="https://soporella.com/assets/images/activity/thumbnail/soporella-wild-wadi-7.jpg" alt="">
                                      <img class="img-responsive" src="https://www.soporella.com/assets/images/activity/thumbnail/12.jpg" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                                            <div class="row">
                      <div class="col-lg-12 top-title">
                        <h3>You might also want to visit...</h3>
                      </div>
                    </div>
                                <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/ferrari-world-abu-dhabi">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/ferrari-world-06.jpg" alt="Ferrari World Abu Dhabi" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/ferrari-world-abu-dhabi" title="Ferrari World Abu Dhabi">Ferrari World Abu Dhabi</a></h4>
                  <p>Home to the fastest roller-coaster in the world! Ferrari World is a truly unique expe<a href="https://soporella.com/top/ferrari-world-abu-dhabi">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/ferrari-world-abu-dhabi">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/warner-bros--world">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/warner-bros2.png" alt="Warner Bros. World " class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/warner-bros--world" title="Warner Bros. World ">Warner Bros. World </a></h4>
                  <p>Set to be one of the world's biggest indoor theme parks on Yas Island, Warner Bros. W<a href="https://soporella.com/top/warner-bros--world">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/warner-bros--world">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/yas-waterworld">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/yas-waterworld-05.jpg" alt="Yas Waterworld" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/yas-waterworld" title="Yas Waterworld">Yas Waterworld</a></h4>
                  <p>With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu<a href="https://soporella.com/top/yas-waterworld">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/yas-waterworld">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/motiongate-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/motiongate-Main-Gate.jpg" alt="Motiongate™ Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/motiongate-dubai" title="Motiongate™ Dubai">Motiongate™ Dubai</a></h4>
                  <p>Best-in-branded entertainment from three of the largest and most successful motion pi<a href="https://soporella.com/top/motiongate-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/motiongate-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/legoland-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/LLDubai-Entrance_HR.jpg" alt="Legoland® Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/legoland-dubai" title="Legoland® Dubai">Legoland® Dubai</a></h4>
                  <p>Experience the ultimate UAE theme park destination for families with kids aged betwee<a href="https://soporella.com/top/legoland-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/legoland-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/bollywood-parks">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-bollywood-parks-3.jpg" alt="Bollywood Parks" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/bollywood-parks" title="Bollywood Parks">Bollywood Parks</a></h4>
                  <p>Experience the world's first theme park dedicated to all things Bollywood. You can en<a href="https://soporella.com/top/bollywood-parks">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/bollywood-parks">Buy Tickets</a>
                </div>
                 
               
            </div>
                               
            <div id="display_1" class="tab-pane fade ">
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-burj-khalifa-1.jpg" alt="At the Top &amp; Sky at Burj Khalifa" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa" title="At the Top &amp; Sky at Burj Khalifa">At the Top &amp; Sky at Burj Khali...</a></h4>
                  <p>"At the Top &amp; Sky" are observation decks of the world’s tallest building and from the<a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/big-bus-tours-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/big-bus-tours.jpg" alt="Big Bus Tours (Dubai)" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/big-bus-tours-dubai" title="Big Bus Tours (Dubai)">Big Bus Tours (Dubai)</a></h4>
                  <p>Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. E<a href="https://soporella.com/top/big-bus-tours-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/big-bus-tours-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/desert-safari-and-bbq-dinner">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/12.jpg" alt="Desert Safari &amp; BBQ Dinner" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/desert-safari-and-bbq-dinner" title="Desert Safari &amp; BBQ Dinner">Desert Safari &amp; BBQ Dinner</a></h4>
                  <p>After a pickup from your hotel, relax in an air-conditioned 4x4 vehicle as you head t<a href="https://soporella.com/top/desert-safari-and-bbq-dinner">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/desert-safari-and-bbq-dinner">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/helidubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/helidubai-01.jpg" alt="HeliDubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/helidubai" title="HeliDubai">HeliDubai</a></h4>
                  <p>HeliDubai is the premier helicopter service provider in the UAE, offering a wide rang<a href="https://soporella.com/top/helidubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/helidubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/img-worlds-of-adventure">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/750 x 500 px.jpg" alt="IMG Worlds of Adventure" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/img-worlds-of-adventure" title="IMG Worlds of Adventure">IMG Worlds of Adventure</a></h4>
                  <p>IMG Worlds of Adventure in Dubai is the world's largest indoor theme park. Thrilling<a href="https://soporella.com/top/img-worlds-of-adventure">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/img-worlds-of-adventure">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/seawings">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/Exterior-Jebel-Ali-Base.jpg" alt="Seawings" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/seawings" title="Seawings">Seawings</a></h4>
                  <p>Dubai Experience Seawings offers you a unique sightseeing excursion across Dubai’s ev<a href="https://soporella.com/top/seawings">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/seawings">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/wild-wadi-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-wild-wadi-7.jpg" alt="Wild Wadi Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/wild-wadi-waterpark" title="Wild Wadi Waterpark">Wild Wadi Waterpark</a></h4>
                  <p>Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers<a href="https://soporella.com/top/wild-wadi-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/wild-wadi-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/dolphin-and-seal-show">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-dolphinarium-1.jpg" alt="Dolphin and Seal Show" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/dolphin-and-seal-show" title="Dolphin and Seal Show">Dolphin and Seal Show</a></h4>
                  <p>Get up close and personal to graceful bottlenose dolphins and playful northern fur se<a href="https://soporella.com/top/dolphin-and-seal-show">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/dolphin-and-seal-show">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/aquaventure-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-aquaventure-15.jpg" alt="Aquaventure Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/aquaventure-waterpark" title="Aquaventure Waterpark">Aquaventure Waterpark</a></h4>
                  <p>Atlantis The Palm is the home of Aquaventure &amp; ultimate fun day out. This water park<a href="https://soporella.com/top/aquaventure-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/aquaventure-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/ferrari-world-abu-dhabi">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/ferrari-world-06.jpg" alt="Ferrari World Abu Dhabi" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/ferrari-world-abu-dhabi" title="Ferrari World Abu Dhabi">Ferrari World Abu Dhabi</a></h4>
                  <p>Home to the fastest roller-coaster in the world! Ferrari World is a truly unique expe<a href="https://soporella.com/top/ferrari-world-abu-dhabi">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/ferrari-world-abu-dhabi">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/warner-bros--world">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/warner-bros2.png" alt="Warner Bros. World " class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/warner-bros--world" title="Warner Bros. World ">Warner Bros. World </a></h4>
                  <p>Set to be one of the world's biggest indoor theme parks on Yas Island, Warner Bros. W<a href="https://soporella.com/top/warner-bros--world">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/warner-bros--world">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/yas-waterworld">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/yas-waterworld-05.jpg" alt="Yas Waterworld" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/yas-waterworld" title="Yas Waterworld">Yas Waterworld</a></h4>
                  <p>With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu<a href="https://soporella.com/top/yas-waterworld">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/yas-waterworld">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/motiongate-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/motiongate-Main-Gate.jpg" alt="Motiongate™ Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/motiongate-dubai" title="Motiongate™ Dubai">Motiongate™ Dubai</a></h4>
                  <p>Best-in-branded entertainment from three of the largest and most successful motion pi<a href="https://soporella.com/top/motiongate-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/motiongate-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/legoland-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/LLDubai-Entrance_HR.jpg" alt="Legoland® Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/legoland-dubai" title="Legoland® Dubai">Legoland® Dubai</a></h4>
                  <p>Experience the ultimate UAE theme park destination for families with kids aged betwee<a href="https://soporella.com/top/legoland-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/legoland-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/bollywood-parks">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-bollywood-parks-3.jpg" alt="Bollywood Parks" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/bollywood-parks" title="Bollywood Parks">Bollywood Parks</a></h4>
                  <p>Experience the world's first theme park dedicated to all things Bollywood. You can en<a href="https://soporella.com/top/bollywood-parks">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/bollywood-parks">Buy Tickets</a>
                </div>
                 
               
            </div>
                               
            <div id="display_2" class="tab-pane fade ">
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-burj-khalifa-1.jpg" alt="At the Top &amp; Sky at Burj Khalifa" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa" title="At the Top &amp; Sky at Burj Khalifa">At the Top &amp; Sky at Burj Khali...</a></h4>
                  <p>"At the Top &amp; Sky" are observation decks of the world’s tallest building and from the<a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/big-bus-tours-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/big-bus-tours.jpg" alt="Big Bus Tours (Dubai)" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/big-bus-tours-dubai" title="Big Bus Tours (Dubai)">Big Bus Tours (Dubai)</a></h4>
                  <p>Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. E<a href="https://soporella.com/top/big-bus-tours-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/big-bus-tours-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/desert-safari-and-bbq-dinner">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/12.jpg" alt="Desert Safari &amp; BBQ Dinner" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/desert-safari-and-bbq-dinner" title="Desert Safari &amp; BBQ Dinner">Desert Safari &amp; BBQ Dinner</a></h4>
                  <p>After a pickup from your hotel, relax in an air-conditioned 4x4 vehicle as you head t<a href="https://soporella.com/top/desert-safari-and-bbq-dinner">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/desert-safari-and-bbq-dinner">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/helidubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/helidubai-01.jpg" alt="HeliDubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/helidubai" title="HeliDubai">HeliDubai</a></h4>
                  <p>HeliDubai is the premier helicopter service provider in the UAE, offering a wide rang<a href="https://soporella.com/top/helidubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/helidubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/img-worlds-of-adventure">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/750 x 500 px.jpg" alt="IMG Worlds of Adventure" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/img-worlds-of-adventure" title="IMG Worlds of Adventure">IMG Worlds of Adventure</a></h4>
                  <p>IMG Worlds of Adventure in Dubai is the world's largest indoor theme park. Thrilling<a href="https://soporella.com/top/img-worlds-of-adventure">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/img-worlds-of-adventure">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/seawings">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/Exterior-Jebel-Ali-Base.jpg" alt="Seawings" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/seawings" title="Seawings">Seawings</a></h4>
                  <p>Dubai Experience Seawings offers you a unique sightseeing excursion across Dubai’s ev<a href="https://soporella.com/top/seawings">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/seawings">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/wild-wadi-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-wild-wadi-7.jpg" alt="Wild Wadi Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/wild-wadi-waterpark" title="Wild Wadi Waterpark">Wild Wadi Waterpark</a></h4>
                  <p>Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers<a href="https://soporella.com/top/wild-wadi-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/wild-wadi-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/dolphin-and-seal-show">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-dolphinarium-1.jpg" alt="Dolphin and Seal Show" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/dolphin-and-seal-show" title="Dolphin and Seal Show">Dolphin and Seal Show</a></h4>
                  <p>Get up close and personal to graceful bottlenose dolphins and playful northern fur se<a href="https://soporella.com/top/dolphin-and-seal-show">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/dolphin-and-seal-show">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/aquaventure-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-aquaventure-15.jpg" alt="Aquaventure Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/aquaventure-waterpark" title="Aquaventure Waterpark">Aquaventure Waterpark</a></h4>
                  <p>Atlantis The Palm is the home of Aquaventure &amp; ultimate fun day out. This water park<a href="https://soporella.com/top/aquaventure-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/aquaventure-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/ferrari-world-abu-dhabi">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/ferrari-world-06.jpg" alt="Ferrari World Abu Dhabi" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/ferrari-world-abu-dhabi" title="Ferrari World Abu Dhabi">Ferrari World Abu Dhabi</a></h4>
                  <p>Home to the fastest roller-coaster in the world! Ferrari World is a truly unique expe<a href="https://soporella.com/top/ferrari-world-abu-dhabi">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/ferrari-world-abu-dhabi">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/warner-bros--world">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/warner-bros2.png" alt="Warner Bros. World " class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/warner-bros--world" title="Warner Bros. World ">Warner Bros. World </a></h4>
                  <p>Set to be one of the world's biggest indoor theme parks on Yas Island, Warner Bros. W<a href="https://soporella.com/top/warner-bros--world">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/warner-bros--world">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/yas-waterworld">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/yas-waterworld-05.jpg" alt="Yas Waterworld" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/yas-waterworld" title="Yas Waterworld">Yas Waterworld</a></h4>
                  <p>With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu<a href="https://soporella.com/top/yas-waterworld">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/yas-waterworld">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/motiongate-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/motiongate-Main-Gate.jpg" alt="Motiongate™ Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/motiongate-dubai" title="Motiongate™ Dubai">Motiongate™ Dubai</a></h4>
                  <p>Best-in-branded entertainment from three of the largest and most successful motion pi<a href="https://soporella.com/top/motiongate-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/motiongate-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/legoland-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/LLDubai-Entrance_HR.jpg" alt="Legoland® Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/legoland-dubai" title="Legoland® Dubai">Legoland® Dubai</a></h4>
                  <p>Experience the ultimate UAE theme park destination for families with kids aged betwee<a href="https://soporella.com/top/legoland-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/legoland-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/bollywood-parks">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-bollywood-parks-3.jpg" alt="Bollywood Parks" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/bollywood-parks" title="Bollywood Parks">Bollywood Parks</a></h4>
                  <p>Experience the world's first theme park dedicated to all things Bollywood. You can en<a href="https://soporella.com/top/bollywood-parks">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/bollywood-parks">Buy Tickets</a>
                </div>
                 
               
            </div>
                               
            <div id="display_3" class="tab-pane fade ">
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-burj-khalifa-1.jpg" alt="At the Top &amp; Sky at Burj Khalifa" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa" title="At the Top &amp; Sky at Burj Khalifa">At the Top &amp; Sky at Burj Khali...</a></h4>
                  <p>"At the Top &amp; Sky" are observation decks of the world’s tallest building and from the<a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/big-bus-tours-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/big-bus-tours.jpg" alt="Big Bus Tours (Dubai)" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/big-bus-tours-dubai" title="Big Bus Tours (Dubai)">Big Bus Tours (Dubai)</a></h4>
                  <p>Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. E<a href="https://soporella.com/top/big-bus-tours-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/big-bus-tours-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/desert-safari-and-bbq-dinner">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/12.jpg" alt="Desert Safari &amp; BBQ Dinner" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/desert-safari-and-bbq-dinner" title="Desert Safari &amp; BBQ Dinner">Desert Safari &amp; BBQ Dinner</a></h4>
                  <p>After a pickup from your hotel, relax in an air-conditioned 4x4 vehicle as you head t<a href="https://soporella.com/top/desert-safari-and-bbq-dinner">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/desert-safari-and-bbq-dinner">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/helidubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/helidubai-01.jpg" alt="HeliDubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/helidubai" title="HeliDubai">HeliDubai</a></h4>
                  <p>HeliDubai is the premier helicopter service provider in the UAE, offering a wide rang<a href="https://soporella.com/top/helidubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/helidubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/img-worlds-of-adventure">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/750 x 500 px.jpg" alt="IMG Worlds of Adventure" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/img-worlds-of-adventure" title="IMG Worlds of Adventure">IMG Worlds of Adventure</a></h4>
                  <p>IMG Worlds of Adventure in Dubai is the world's largest indoor theme park. Thrilling<a href="https://soporella.com/top/img-worlds-of-adventure">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/img-worlds-of-adventure">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/seawings">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/Exterior-Jebel-Ali-Base.jpg" alt="Seawings" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/seawings" title="Seawings">Seawings</a></h4>
                  <p>Dubai Experience Seawings offers you a unique sightseeing excursion across Dubai’s ev<a href="https://soporella.com/top/seawings">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/seawings">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/wild-wadi-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-wild-wadi-7.jpg" alt="Wild Wadi Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/wild-wadi-waterpark" title="Wild Wadi Waterpark">Wild Wadi Waterpark</a></h4>
                  <p>Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers<a href="https://soporella.com/top/wild-wadi-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/wild-wadi-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/dolphin-and-seal-show">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-dolphinarium-1.jpg" alt="Dolphin and Seal Show" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/dolphin-and-seal-show" title="Dolphin and Seal Show">Dolphin and Seal Show</a></h4>
                  <p>Get up close and personal to graceful bottlenose dolphins and playful northern fur se<a href="https://soporella.com/top/dolphin-and-seal-show">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/dolphin-and-seal-show">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/aquaventure-waterpark">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-aquaventure-15.jpg" alt="Aquaventure Waterpark" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/aquaventure-waterpark" title="Aquaventure Waterpark">Aquaventure Waterpark</a></h4>
                  <p>Atlantis The Palm is the home of Aquaventure &amp; ultimate fun day out. This water park<a href="https://soporella.com/top/aquaventure-waterpark">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/aquaventure-waterpark">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/ferrari-world-abu-dhabi">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/ferrari-world-06.jpg" alt="Ferrari World Abu Dhabi" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/ferrari-world-abu-dhabi" title="Ferrari World Abu Dhabi">Ferrari World Abu Dhabi</a></h4>
                  <p>Home to the fastest roller-coaster in the world! Ferrari World is a truly unique expe<a href="https://soporella.com/top/ferrari-world-abu-dhabi">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/ferrari-world-abu-dhabi">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/warner-bros--world">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/warner-bros2.png" alt="Warner Bros. World " class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/warner-bros--world" title="Warner Bros. World ">Warner Bros. World </a></h4>
                  <p>Set to be one of the world's biggest indoor theme parks on Yas Island, Warner Bros. W<a href="https://soporella.com/top/warner-bros--world">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/warner-bros--world">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/yas-waterworld">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/yas-waterworld-05.jpg" alt="Yas Waterworld" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/yas-waterworld" title="Yas Waterworld">Yas Waterworld</a></h4>
                  <p>With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu<a href="https://soporella.com/top/yas-waterworld">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/yas-waterworld">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/motiongate-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/motiongate-Main-Gate.jpg" alt="Motiongate™ Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/motiongate-dubai" title="Motiongate™ Dubai">Motiongate™ Dubai</a></h4>
                  <p>Best-in-branded entertainment from three of the largest and most successful motion pi<a href="https://soporella.com/top/motiongate-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/motiongate-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/legoland-dubai">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/LLDubai-Entrance_HR.jpg" alt="Legoland® Dubai" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/legoland-dubai" title="Legoland® Dubai">Legoland® Dubai</a></h4>
                  <p>Experience the ultimate UAE theme park destination for families with kids aged betwee<a href="https://soporella.com/top/legoland-dubai">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/legoland-dubai">Buy Tickets</a>
                </div>
                 
                                                              <div class="tab-single col-lg-4">                 
                  <a href="https://soporella.com/top/bollywood-parks">
                    <img src="https://soporella.com/assets/images/activity/thumbnail/soporella-bollywood-parks-3.jpg" alt="Bollywood Parks" class="img-responsive">
                  </a>
                  <h4><a href="https://soporella.com/top/bollywood-parks" title="Bollywood Parks">Bollywood Parks</a></h4>
                  <p>Experience the world's first theme park dedicated to all things Bollywood. You can en<a href="https://soporella.com/top/bollywood-parks">... more</a></p>
                  <a class="buy" href="https://soporella.com/top/bollywood-parks">Buy Tickets</a>
                </div>
                 
               
            </div>
                   
    </div>
  </div>
</div>


@yield('content')

@include('front.includes.footer')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--Slide-->
<script src="{{ asset('theme/js/classie.js') }}"></script>

</body>
</html>