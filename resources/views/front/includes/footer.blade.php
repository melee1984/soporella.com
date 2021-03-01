
<!--Pre-Footer-->
<div id="pre-footer" class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
        <!--Quick Links-->
        <div id="quick" class="col-lg-4">
          <h3>{{ trans('messages.FOOTER_QL_LABEL') }}</h3>
          <ul>
            <li><a href="{{URL::to('about-us')}}">{{ trans('messages.FOOTER_QL_ABOUT_US') }}</a></li>
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
            <li><img src="{{ asset('theme2018/images/visa.png') }}" alt="Visa"></li>
            <li><img src="{{ asset('theme2018/images/mastercard.png') }}" alt="Mastercard"></li>
          </ul>
        </div>
        <!--Trusted-->
        <div class="col-lg-3">
          <h3>{{trans('messages.FOOTER_TRUSTED_SHOP')}} </h3>
          <p>{{trans('messages.LABEL_MY_TRUSTED')}}</p>
        </div>
        <!--Trusted-->
        <div class="col-lg-3">
          <h3>{{trans('messages.FOOTER_NEWSLETTER')}}</h3>

            <div class="newslettererrror"></div>
            <form action="" id="formnewsletter">
              <div class="form-group">
                  <input type="text"  class="form-control" name="name" placeholder="{{trans('messages.FULL_NAME')}}">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="{{trans('messages.EMAIL_ADDRESS')}}">
              </div>
              <div class="form-group" id="cap_send">
                <input type="submit" class="form-control" value="{{trans('messages.SUBMIT')}}">
              </div>
          </form>
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
        <div id="social" class="col-lg-6 text-right">
          <ul>
            <li><a target="_blank" href="https://www.facebook.com/Soporella-1342011235913453/"><img src="{{asset('theme2018/images/facebook.png')}}" alt="Facebook"/></a></li>
            <li><a target="_blank" href="https://twitter.com/Soporella_UAE"><img src="{{asset('theme2018/images/twitter.png')}}" alt="Twitter"/></a></li>
            <li><a target="_blank" href="https://www.youtube.com/channel/UC-2-IBVvaVy8ZUX74PJB17w"><img src="{{asset('theme2018/images/youtube.png')}}" alt="YouTube"/></a></li>
            <li><a target="_blank" href="https://www.instagram.com/soporella_uae/"><img src="{{asset('theme2018/images/instagram.png')}}" alt="Instagram"/></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>