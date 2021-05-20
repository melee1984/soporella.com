@extends('management.template.default')

@section('content')
<div class="container-fluid">
  <div class="page-title">
  </div>
</div>

<div class="col-sm-12 col-xl-12 xl-100">
  <div class="card">
    @include('management.includes.error')
    <attraction-edit :attraction="{{ $attraction }}" :locations="{{ $locations }}"></attraction-edit>
  </div>
</div>
  
@endsection

