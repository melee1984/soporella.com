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

    </div>
  </div>
  <!--Result-->
  <div class="row">   
       
  </div>                
</div>

@endsection