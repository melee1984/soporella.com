<div class="row">
	<div class="col-12">
		<h3>You might also want to visit...</h3>
	</div>
	
	<div class="row tab-content padding-20">
		@foreach($suggestionAttractions as $attra)
		<div class="col-lg-4 tab-single" >                 
		 <a href="{{ route('page.visit', $attra->attraction ) }}">
	        <img src="{{ $attra->attraction->photo }}" alt="{{ $attra->attraction->title }}" class="img-responsive">
	      </a>
          <h4><a href="{{ route('page.visit', $attra->attraction ) }}" title="{{ $attra->attraction->title }}">{{ $attra->attraction->title }}</a></h4>
          <p>{{ Str::words($attra->attraction->description, 20) }} <a href="{{ $attra->attraction->pageUrl }}"> more</a></p>
          <a class="buy" href="{{ route('page.visit', $attra->attraction ) }}">Buy Tickets</a>
		</div>


		@endforeach
	</div>
</div>