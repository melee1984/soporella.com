@extends('front.template.inside')

@section('meta')
	<title>Soporella - {{ $attraction->meta_title}}</title>
	<meta name="description" content="{{ $attraction->meta_description}}">
	<meta name="keywords" content="{{ $attraction->meta_keyword}}">
@stop

@section('content')
  	<product-page :attraction="{{ $attraction }}"></product-page>
@endsection

