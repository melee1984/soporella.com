@extends('front.template.inside')

@section('content')
	
<div class="container" id="top">

	<!-- <div class="jumbotron">
		  <h3>Best Safety Standards!</h3>
		  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
		  <p><a class="btn buy" href="#" role="button">Learn more</a></p>
	</div> -->

	@include('front.pages.includes.display', 
		['title' => $category->title , 'attractions' => $category->attractionsMapping])

</div>

@endsection
