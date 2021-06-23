
<div class="container-fluid footer-header">
      <div class="container">
          <div class="row">
            <div class="col-md-7 text-center">
                <h3>
                  <span class="quote">&#8220;</span>
                    {{ trans('messages.OUR_CLIENTS_TESTI') }}
                     <span class="quote">&#8221;</span>
                </h3>
                <p class="testi-message">
                  @php
                    $testi = App\Testimonials::inRandomOrder()->first();
                    echo $testi->message . ", " .$testi->name;
                  @endphp 
                </p>
            </div>
            <div class="col-md-5 text-center newsletter  news-del">
                <h3>{{trans('messages.SUBSCRIBE_FOOTER_NEWSLETTER')}}</h3>
                <newsletter-page></newsletter-page>
            </div>
          </div>
      </div>
</div>

<!--Pre-Footer-->
<div id="pre-footer" class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
        <!--Quick Links-->
        <div id="quick" class="col-lg-4">
          <h3>{{ trans('messages.FOOTER_QL_LABEL') }}</h3>
          <ul>
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
            </ul>
        </div>
        <div id="accept" class="col-lg-2">
          <h3>{{ trans('messages.FOOTER_WE_ACCEPT') }}</h3>
          <ul>
            <li><img src="{{ asset('theme/images/visa.png') }}" alt="Visa"></li>
            <li><img src="{{ asset('theme/images/mastercard.png') }}" alt="Mastercard"></li>
          </ul>
        </div>
        <!--Trusted-->
        <div class="col-lg-3">
          <h3>{{trans('messages.FOOTER_TRUSTED_SHOP')}} </h3>
          <p>{{trans('messages.LABEL_MY_TRUSTED')}}</p>
        </div>
        <!--Trusted-->
        <div class="col-lg-3">
            <h3>{{ trans('messages.CONNECT_WITH_US') }}</h3>     

               <div id="social2" class="col-lg-12 text-left">
                <ul>
                  <li><a target="_blank" href="https://www.facebook.com/Soporella-1342011235913453/"><img src="{{asset('theme/images/facebook.png')}}" alt="Facebook"/></a></li>
                  <li><a target="_blank" href="https://twitter.com/Soporella_UAE"><img src="{{asset('theme/images/twitter.png')}}" alt="Twitter"/></a></li>
                  <li><a target="_blank" href="https://www.youtube.com/channel/UC-2-IBVvaVy8ZUX74PJB17w"><img src="{{asset('theme/images/youtube.png')}}" alt="YouTube"/></a></li>
                  <li><a target="_blank" href="https://www.instagram.com/soporella_uae/"><img src="{{asset('theme/images/instagram.png')}}" alt="Instagram"/></a></li>
                </ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-->

<div id="footer" class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <p><a href="http://www.soporella.com">{{trans('messages.SOPORELLA_TICKETING_OUTLET')}}</a>. {{trans('messages.ALL_RIGHTS_RESERVED')}} <?php echo date("Y"); ?>.
            <br>{{trans('messages.PART_OF')}} <a href="http://www.creativouae.com">Creativo DMCC</a></p>
        </div>
       
      </div>
    </div>
  </div>
</div>