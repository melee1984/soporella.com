@extends('management.template.default')

@section('content')
<!-- Page Sidebar Ends-->
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Attractions</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="{{ route('dashboard.management.add')}}"><i data-feather="home"></i></a>
            </li>
          <li class="breadcrumb-item active">Attractions</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid product-wrapper">
  <div class="product-grid">
    <div class="product-wrapper-grid">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('dashboard.management.add') }}" class="btn btn-danger btn-sm">Add New</a>
          </div>
          <div class="card-body megaoptions-border-space-sm">
              <div class="row">
                @include('management.pages.attractions.list')          
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection

