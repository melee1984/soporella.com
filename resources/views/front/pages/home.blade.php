@extends('front.template.default')

@section('slide')
	@include('front.includes.slide2')
@endsection

@section('content')
	
<div class="container" id="top">

	<div class="jumbotron">
		  <h3>Best Safety Standards!</h3>
		  <p>All attractions are following strict Covid-19 safety protocols and adhere to the guidelines set by their relevant Health Department.</p>
		  <p><a class="btn buy" href="#" role="button">Learn more</a></p>
	</div>

	@include('front.pages.includes.display', 
		['title' => 'Promotions', 'attractions' => $promotions])
	@include('front.pages.includes.display', 
		['title' => 'Top Attractions', 'attractions' => $topAttractions])
	@include('front.pages.includes.youmightvisits')

</div>

@endsection
