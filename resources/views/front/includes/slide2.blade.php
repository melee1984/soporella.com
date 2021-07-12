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
              <a class="buy" href="{{ route('page.promotion', [app()->getLocale(), $campaign->attraction]) }}">{{ trans('messages.LABEL_BUY_TICKET') }}</a>
            </div>
        </div>    
      </div>
      @endforeach 
    </div>
</div>

<div class="container">
  <div class="filter">
    <div class="row">
      <div class="col-md-2">&nbsp;</div>
      <div class="col-md-8 searchForm">
        <form role="form" method="get" action="{{ URL::to('search') }}">
          <div class="row">
            <div class="col-md-4">
              <select class="form-control" name="emirate" method="get">
                <option value="">Select Emirate</option>
                @foreach($location as $l)
                  <option value="{{ $l->id }}">{{ $l->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Search for attraction" name="v">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-filter">Get</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-2">&nbsp;</div>
    </div>
  </div>
</div>
