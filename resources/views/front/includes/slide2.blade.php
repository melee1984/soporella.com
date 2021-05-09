<div class="banner-1">
  <div class="container">
      @foreach($campaigns as $campaign) 

      <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{ $campaign->img_1 }}" class="img-responsive">
        </div>    
        <div class="col-md-6 text-center">
            <div class="carousel-caption">
              <h2>{{ $campaign->attraction->title }}</h2>
              <p>{{ Str::words($campaign->attraction->language_string['description'] , 30) }} </p>
              <a class="buy" href="{{ route('page.promotion', $campaign->attraction) }}">{{ trans('messages.LABEL_BUY_TICKET') }}</a>
            </div>
        </div>    
      </div>
      @endforeach 
    </div>
</div>