@extends('management.template.default')

@section('content')
<div class="container-fluid">
  <div class="page-title">
  </div>
</div>


<div class="col-sm-12 col-xl-6 xl-100">
<div class="card">
  <div class="card-header">
    <h5>{{ $attraction->title }} </h5>
  </div>
  <div class="card-body">
    <ul class="nav nav-tabs" id="icon-tab" role="tablist">
      <li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>General</a></li>
      <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Rate</a></li>
      <li class="nav-item"><a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Category</a></li>
      <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Other Information</a></li>

      <li class="nav-item"><a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Gallery</a></li>
      <li class="nav-item"><a class="nav-link" id="up-selling-tab" data-toggle="tab" href="#up-selling" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Up Selling</a></li>
      <li class="nav-item"><a class="nav-link" id="related-item-tab" data-toggle="tab" href="#related-item" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Related Item</a></li>
    </ul>
    <div class="tab-content" id="icon-tabContent">
      <div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
        <p class="mb-0 m-t-30">
        	@include('management.pages.attractions.includes.general')
        </p>
      </div>
      <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
        <p class="mb-0 m-t-30">
        	Rates
        </p>
      </div>
      <div class="tab-pane fade" id="contact-icon" role="tabpanel" aria-labelledby="contact-icon-tab">
        <p class="mb-0 m-t-30">
        	Other Information
        </p>
      </div>
       <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
        <p class="mb-0 m-t-30">
        	Category
        </p>
      </div>
      <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <p class="mb-0 m-t-30">
        	Gallery
        </p>
      </div>
        <div class="tab-pane fade" id="up-selling" role="tabpanel" aria-labelledby="up-selling-tab">
        <p class="mb-0 m-t-30">
        	Uup Selling
        </p>
      </div>
        <div class="tab-pane fade" id="related-item" role="tabpanel" aria-labelledby="related-item-tab">
        <p class="mb-0 m-t-30">
        	Related Item
        </p>
      </div>
    </div>
  </div>
</div>
</div>

  
@endsection

