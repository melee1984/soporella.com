
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  
  <div class="carousel-inner">
    
    @foreach($campaigns as $campaign)
    <div class="item">
      <img src="https://soporella.com/assets/images/bnr-festival-promo.jpg" alt="Winter Festive 20% Promotion">
      <div class="carousel-caption">
        <h2>{{ $campaign->title }}</h2>
        <p>{{ $campaign->description }}</p>
        <a class="buy" href="{{ route('page.promotion', $campaign->attraction ) }}">{{ trans('messages.LABEL_BUY_TICKET') }}</a>
      </div>
    </div>
    @endforeach

  </div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <img src="https://soporella.com/theme2018/images/icon-prev.png" alt="Previous">
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <img src="https://soporella.com/theme2018/images/icon-next.png" alt="Next">
  </a>
</div>