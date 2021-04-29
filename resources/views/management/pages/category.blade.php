@extends('management.template.default')

@section('content')
  <div class="col-sm-12">
  	<br>
      <category-list :categories="{{$categories}}"></category-list>
  </div>
@endsection

