
<div class="row ">
		<div class="col-12">
			<h3>Promotions</h3>
		</div>
		

<div id="featured" class="carousel slide padding-20" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#featured" data-slide-to="0" class="active"></li>
    <li data-target="#featured" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      	
      	<div class="row tab-content">

      		@foreach($promotions as $promotion) 

			<div class="col-lg-3 tab-single" >                 
				<a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa">
					<img src="{{ asset('products/images/'.$promotion->attraction->photo) }}" alt="{{ $promotion->attraction->title }}" class="img-responsive">
				</a>
	                  <h4><a href="https://soporella.com/top/at-the-top-and-sky-at-burj-khalifa" title="At the Top &amp; Sky at Burj Khalifa">{{ $promotion->attraction->title }}</a></h4>
	                  <p>{{ Str::words($promotion->attraction->description, 20) }} <a href=""> more</a></p>
	                  <a class="buy" href="{{ URL::to('promotion/'.$promotion->attraction->slug) }}">Buy Tickets</a>
			</div>
			@endforeach

		</div>

    </div>

  <!--   <div class="item">
     	<div class="row tab-content">
			
		</div>	
    </div>
 -->
  
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#featured" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  
  <a class="right carousel-control" href="#featured" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


		

	</div>