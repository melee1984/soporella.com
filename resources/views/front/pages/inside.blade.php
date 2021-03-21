@extends('front.template.inside')

@section('content')
  <product-page :attraction="{{ $attraction }}"></product-page>
@endsection

