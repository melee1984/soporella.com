@extends('management.template.default')

@section('content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Total Open Orders</span>
                        <h4 class="mb-0 counter">75</h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                      <div class="media-body"><span class="m-0">Totol Signup</span>
                        <h4 class="mb-0 counter">9856</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                      <div class="media-body"><span class="m-0">Total Running Promotions</span>
                        <h4 class="mb-0 counter">5</h4><i class="icon-bg" data-feather="message-circle"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                      <div class="media-body"><span class="m-0">Total Attractions</span>
                        <h4 class="mb-0 counter">30</h4><i class="icon-bg" data-feather="user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                      <div class="media-body"><span class="m-0">Total Category</span>
                        <h4 class="mb-0 counter">25</h4><i class="icon-bg" data-feather="user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-xl-3 col-lg-4">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                      <div class="media-body"><span class="m-0">Contact Count</span>
                        <h4 class="mb-0 counter">10</h4><i class="icon-bg" data-feather="user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection