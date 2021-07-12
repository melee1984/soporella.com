@extends('front.template.inside')

@section('content')

<div id="page" class="container">

	<div class="jumbotron text-center">
  <h1 class="display-3">Thank your for your order</h1>
  <p class="lead">Your order has been placed and is being processed. You will receive an email with the order details.</p>
  <hr>
  <p>
    Having trouble? <a href="{{ route('contactus') }}">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-md buy" href="{{ route('home', app()->getLocale()) }}" role="button">Continue to homepage</a>
  </p>
</div>

</div>

@endsection
