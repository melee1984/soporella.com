@extends('front.template.inside')

@section('content')
<div class="container" id="top">
	<div class="row ">
		<div class="col-12">
			<h3>{{ $category->title }}</h3>
		</div>
	    <div id="featured" class="carousel slide padding-20" data-ride="carousel">
	      <!-- Wrapper for slides -->
	      <div class="carousel-inner">
	        <div class="item active">
	          	<div class="row tab-content">
	          		@forelse($category->attractionsMapping as $promotion) 
							@php
								$attractionText = $promotion->attraction->convertLanguageField();
							@endphp
	          				<div class="col-lg-3 col-md-3  col-sm-3 col-xs-12 tab-single">
	          					<a href="{{ $promotion->attraction->pageUrl }}">
			                  		<img src="{{ $promotion->attraction->photo }}" alt="{{ $promotion->attraction->title }}" class="img-responsive">
			                  	</a>
			                  <h4>
			                  	<a href="{{ $promotion->attraction->pageUrl }}" title="{{ $promotion->attraction->title }}">{{ $promotion->attraction->title }}</a>
			                  </h4>
			                  <p>{{ Str::words($attractionText['description'], 15) }} <a href="{{ $promotion->attraction->pageUrl }}">{{ trans('messages.MORE')}}</a></p>
			                  <a class="buy" href="{{ $promotion->attraction->pageUrl }}">{{ trans('messages.LABEL_BUY_TICKET' )}}</a>
	        				</div>
	          		@empty
						<div class="col-lg-3 col-md-3  col-sm-3 col-xs-12 tab-single" >
							{{ trans('messages.NO_RECORD_FOUND') }}
						</div>
	          		@endforelse
	    		</div>
	        </div>
	      </div>
		</div>
	</div>
</div>
@endsection
