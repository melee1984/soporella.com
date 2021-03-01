@extends('management.template.default')

@section('content')
<!-- Page Sidebar Ends-->
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Product</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.management.dashboard')}}">                                       <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item active">Attractions</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid product-wrapper">
  <div class="product-grid">
    <div class="feature-products">
      <div class="row">
        <div class="col-md-6 products-total">
          <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
          <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                Filters<span class="ml-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
          <div class="grid-options d-inline-block">
            <ul>
              <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
              <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
              <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
              <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 text-right"><span class="f-w-600 m-r-5">Showing Products 1 - 24 Of 200 Results</span>
          <div class="select2-drpdwn-product select-options d-inline-block">
            <select class="form-control btn-square" name="select">
              <option value="opt1">Featured</option>
              <option value="opt2">Lowest Prices</option>
              <option value="opt3">Highest Prices</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="product-sidebar">
            <div class="filter-section">
              <div class="card">
                <div class="card-header">
                  <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                </div>
                <div class="left-filter">
                  <div class="card-body filter-cards-view animate-chk">
                    <div class="product-filter">
                      <h6 class="f-w-600">Category</h6>
                      <div class="checkbox-animated mt-0">
                        <label class="d-block" for="edo-ani5">
                          <input class="radio_animated" id="edo-ani5" type="radio" data-original-title="" title="">Man Shirt
                        </label>
                     
                      </div>
                    </div>
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
          <form>
            <div class="form-group m-0">
              <input class="form-control" type="search" placeholder="Search.." data-original-title="" title=""><i class="fa fa-search"></i>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="product-wrapper-grid">
      <div class="row">
        @include('management.pages.attractions.list')
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection

