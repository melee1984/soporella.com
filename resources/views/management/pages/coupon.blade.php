@extends('management.template.default')

@section('content')
  <div class="col-sm-12">
  	<br>
      <coupon-list :coupon="{{$coupon}}"></coupon-list>
  </div>
@endsection

