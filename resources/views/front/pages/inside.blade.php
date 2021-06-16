@extends('front.template.inside')

@section('meta')

	@if ($attraction->meta_title) 
		<title>Soporella - {{ $attraction->meta_title}}</title>
	@else 
		<title>Soporella - Your Ticketing Outlet</title>
	@endif

	@if ($attraction->meta_title) 
		<meta name="description" content="{{ $attraction->meta_description}}">
	@else 
		<meta name="description" content="Book tours, attractions, activities and other places to visit in Dubai and the rest of the UAE with no booking Fees! Call +971 4 3910350  book here.">
	@endif

	@if ($attraction->meta_title) 
		<meta name="keywords" content="{{ $attraction->meta_keyword}}">
	@else 
		<meta name="keywords" content="Places to visit in Dubai">
	@endif

@stop

@section('content')
  	<product-page :attraction="{{ $attraction }}"></product-page>
@endsection

