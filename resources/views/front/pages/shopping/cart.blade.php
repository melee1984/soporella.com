@extends('front.template.inside')

@section('content')

<div id="page" class="container cart">

    <!--Title-->
    <div class="row">
      <div class="col-lg-12">
        <h1><span class="red"><span>0</span></span> Tickets in your Cart</h1>
      </div>
    </div>

    <!-- External toolbar sample -->
    <div class="hidden">
      <div class="col-lg-12">
        <select id="theme_selector">
          <option value="default">default</option>
          <option value="arrows">arrows</option>
          <option value="circles" selected="">circle</option>
          <option value="dots">dots</option>
        </select>
      </div>
    </div>

    <!-- SmartWizard html -->
    <div class="row">
      <div class="col-lg-12">

      <div id="smartwizard">

          <ul class="nav nav-tabs step-anchor">
            <li class="nav-item active"><a href="" class="nav-link">1<span> cart</span></a></li>
            <li><a href="#step-2">2<span> Payment</span></a></li>
            <li><a href="#step-3">3<span> Confirmation</span></a></li>
          </ul>

          <div>

            

            <div id="step-1" class="">
              <!--Details-->
              <div class="row">

                  <!--01-->
                
                
              </div>

              <!--Total-->
              <div id="total_wrap">
                
              </div>

                <br>
                <br>

              <div class="row">
                
                                

              </div>

              <div class="row">

                  <div class="col-lg-6 col-xs-12 text-left">
                                      <a href="https://soporella.com/promotions" class="btn btn-secondary sw-btn-next">Continue Shopping</a>
                                  </div>

                <div class="col-lg-6 col-xs-12 text-right">
                  
                                                           <a href="https://soporella.com/shopping-cart/user" class="btn btn-secondary sw-btn-next">Proceed to Payment</a>
                  
                  
                    
                                  </div>
              </div>

              <!-- <div class="row">
                <div id="att-note">
                  <div class="col-lg-6">
                    <p>You can also pay with:</p>
                    <ul>
                      <li>
                         <a href="https://soporella.com/shopping-cart/payment-option/masterpass" class="btn-masterpassword">
                            <img src="https://soporella.com/theme2018/images/icon-visa-checkout.png" alt=""/>
                        </a>
                      </li>
                      <li>
                        <a href="https://soporella.com/shopping-cart/payment-option/visacheckout" class="btn-visacheckout">
                          <img src="https://soporella.com/theme2018/images/icon-masterpass.png" alt=""/>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-6 text-right">
                                                         <a href="https://soporella.com/shopping-cart/user" class="btn btn-secondary sw-btn-next">Proceed to Payment</a>
                                            </div>
                </div>
              </div> -->

            </div>       
          </div>
      </div>
      </div>
    </div>
</div>

@endsection
