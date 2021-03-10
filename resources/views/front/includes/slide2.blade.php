<div class="banner-1">
  <div class="container">
      @foreach($campaigns as $campaign)
      <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{ $campaign->attraction->photo }}" class="img-responsive">
        </div>    
        <div class="col-md-6 text-center">
            <div class="carousel-caption">
              <h2>{{ $campaign->title }}</h2>
              <p>{{ $campaign->description }}</p>
              <a class="buy" href="{{ route('page.promotion', $campaign->attraction) }}">Buy Tickets</a>
            </div>
        </div>    
      </div>
      @endforeach 
    </div>
</div>