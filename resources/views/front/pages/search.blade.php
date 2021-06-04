@extends('front.template.inside')

@section('content')

<div id="sresults" class="container">
  <!--Title-->
  <div class="row">
    <div class="col-lg-12">
      <h3>Search Results</h3>
      
      @if (count($results)<=0) 
        <div class="alert alert-danger">
          No record found
        </div>
      @endif 

      <div class="carousel-inner">
          <div class="item active">
              <div class="row tab-content">
              @forelse($results as $attraction) 
              @php
              
              @endphp
                    <div class="col-lg-3 col-md-3  col-sm-3 col-xs-12 tab-single">
                      <a href="{{ $attraction->pageUrl }}">
                            <img src="{{ $attraction->photo }}" alt="{{ $attraction->title }}" class="img-responsive">
                          </a>
                        <h4>
                          <a href="{{ $attraction->pageUrl }}" title="{{ $attraction->title }}">{{ $attraction->title }}</a>
                        </h4>
                        <p><a href="{{ $attraction->pageUrl }}">{{ trans('messages.MORE')}}</a></p>
                        <a class="buy" href="{{ $attraction->pageUrl }}">{{ trans('messages.LABEL_BUY_TICKET' )}}</a>
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
  <!--Result-->
  <div class="row">   
       
  </div>                
</div>

@endsection


