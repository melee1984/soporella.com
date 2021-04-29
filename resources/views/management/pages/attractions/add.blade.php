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
            <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h5>ADD NEW</h5>
                  </div>

                  @include('management.includes.error')

                  <form class="form theme-form" method="post" action="{{ route('dashboard.attraction.submit') }}" >

                    @csrf()

                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="form-group mb-4">
                            <div class="row">
                              <div class="col">
                                  <label class="d-block" for="active">
                                    <input class="checkbox_animated" id="active" name="active" value="1" type="checkbox" data-original-title="" title=""> Active
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control input-air-primary @error('title') is-invalid @enderror" id="title" name="title" type="text" placeholder="Attraction Title" data-original-title="" title="" value="{{ old('title') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group mb-4">
                            <label for="description">Description</label>
                            <textarea class="form-control input-air-primary @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit" data-original-title="" title="">Submit</button>
                      <a href="{{ URL::to('dashboard/attraction') }}" class="btn btn-light">Cancel</a>

                    </div>
                  </form>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection

