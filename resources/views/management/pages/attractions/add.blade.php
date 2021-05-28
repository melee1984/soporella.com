@extends('management.template.default')

@section('content')
<!-- Page Sidebar Ends-->
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.management.dashboard')}}">                                       
            <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid product-wrapper">
  <div class="product-grid">
    <div class="product-wrapper-grid">
      <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5>ADD NEW</h5>
                  </div>
                  <add-attraction></add-attraction>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection

