@extends('front.template.inside')

@section('content')
  
<campaign-page :campaigns="{{ $campaigns }}"></campaign-page>




@endsection