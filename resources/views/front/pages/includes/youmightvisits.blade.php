<div class="row">
	<div class="col-12">
		<h3>{{ trans('messages.YOU_MIGHT_WANT_TO_VISIT') }}</h3>
	</div>
	<div class="row tab-content padding-20">
		@foreach($suggestionAttractions as $attra)
		<div class="col-lg-4 col-md-4 col-xs-6 tab-single" >                 
		 <a href="{{ route('page.visit', $attra->attraction ) }}">
	        <img src="{{ $attra->attraction->photo }}" alt="{{ $attra->attraction->title }}" class="img-responsive">
	      </a>
	      <h4><a href="{{ route('page.visit', $attra->attraction ) }}" title="{{ $attra->attraction->title }}">{{ $attra->attraction->title }}</a></h4>
	      <p>{{ Str::words($attra->attraction->description, 20) }} <a href="{{ $attra->attraction->pageUrl }}"> {{ trans('messages.more') }}</a></p>
	      <a class="buy" href="{{ route('page.visit', $attra->attraction ) }}">{{ trans('messages.LABEL_BUY_TICKET') }}</a>
		</div>
		@endforeach
	</div>
</div>