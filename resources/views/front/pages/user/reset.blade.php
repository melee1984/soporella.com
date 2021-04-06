@extends('front.template.inside')

@section('content')


<div id="page" class="container">
  <!--Title-->
  <div class="row">
    <div class="col-lg-12">
      <h1>Account Settings</h1>
    </div>
  </div>
  <!--Content-->
  <div class="row">
    <div id="login" class="col-lg-8">
      <div class="errorWithLogin hide  popup_message_error"></div>      

      @include('front.includes.error')

      <form method="post" action="{{ route('profile.information.submit') }}" accept-charset="UTF-8" id="resetPassword">

        @csrf
      <div class="form-group">
        <input class="form-control" type="text" name="changeemail" placeholder="Email Address" value="{{ Auth::User()->email }}" disabled="">
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 padding-r0">
            <input class="form-control" type="password" name="newpassword" placeholder="New Password" focus>
          </div>
          <div class="col-lg-6">
            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input class="form-control" type="submit" value="Save">
      </div>
      </form>
    </div>
    <div class="col-lg-4">
      <div id="page_sidebar" class="m_down">
  <h3>Links</h3>
  <ul>
  	<li><a href="https://soporella.com/my-account">Account Settings</a></li>
  	<li><a href="https://soporella.com/my-account/my-tickets">My Tickets</a></li>
    <li><a href="https://soporella.com/logout">Logout</a></li>
  </ul>
</div>
    </div>
  </div>
</div>

@endsection