@extends('front.template.default')

@section('slide')
	@include('front.includes.slide2')
@endsection



@section('content')
	
<div class="container" id="top">

	<div class="jumbotron">
		  <h3>{{ trans('messages.HOME_BEST_HEADER') }}</h3>
		  <p>{{ trans('messages.HOME_BEST_CONTENT') }}</p>
	</div>

	@include('front.pages.includes.display', 
		['title' => trans('messages.PROMOTIONS'), 'attractions' => $promotions])

	@include('front.pages.includes.display', 
		['title' => trans('messages.TOP_ATTRACTIONS'), 'attractions' => $topAttractions])

	@include('front.pages.includes.youmightvisits')

</div>

@endsection
