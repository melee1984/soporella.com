@extends('front.template.inside')

@section('content')

<div id="page" class="container">

  <div class="row">
    <div class="col-lg-8">
      <h1>Welcome Back, {{ Auth::User()->name }}</h1>
    </div>
    <div class="col-lg-4">
      @include('front.pages.user.includes.menu')
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
   
      <div class="box_single">
        <div class="box_txt">
        <h5>Account Information</h5>
        <p>Email:  {{ Auth::User()->email }}<br>
        Password: ********</p>
        </div>
        <!-- <div class="box_btn"><a class="buy" href="#">Edit</a></div> -->
        <div class="box_btn">
          <a href="https://soporella.com/my-account/account-information">
            <label class="buy" for="1">Edit</label>
          </a>
        </div>
      </div>

      <div class="box_single">
        <div class="box_txt">
        <h5>Personal Information</h5>
        <p>Name: {{ Auth::User()->name }}<br>

        </p></div>
        <div class="box_btn">
          <a href="https://soporella.com/my-account/personal-information">
          <label class="buy" for="">Edit</label>
        </a></div>
      </div>



      <div class="box_single">
        <div class="box_txt">
        <h5>Billing Information</h5>
                  <p>Address: #1508 Platinum Tower, Jumeira Late Tower <br>
                  City: Dubai<br>
                  Zip / Postal Code: 4487<br>
                  State / Province: Auto Drome<br>
                  Country of Residence: United Arab Emirates</p>
        </div>
        <div class="box_btn">
          <a href="https://soporella.com/my-account/billing-information">
          <label class="buy" for="">Edit</label>
        </a></div>
      </div>


    </div>


  </div>

</div>

@endsection 