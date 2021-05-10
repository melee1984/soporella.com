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
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-4 col-xl-3 col-lg-3">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Open Orders</span>
                        <h4 class="mb-0 counter">{{ $orders->count() }}</h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-3">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                      <div class="media-body"><span class="m-0">Signup</span>
                        <h4 class="mb-0 counter">{{ $user->count() }}</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-3">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                      <div class="media-body"><span class="m-0">Running Promotions</span>
                        <h4 class="mb-0 counter">{{ $campaign->count() }}</h4><i class="icon-bg" data-feather="message-circle"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-xl-3 col-lg-3">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                      <div class="media-body"><span class="m-0">Attractions</span>
                        <h4 class="mb-0 counter">{{ $attraction->count() }}</h4><i class="icon-bg" data-feather="user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Orders</h5>
                  </div>
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Date Ordered</th>
                              <th scope="col">Order #</th>
                              <th scope="col">Merchant Ref no</th>
                              <th scope="col">No of Tickets</th>
                              <th scope="col">Sub Total</th>
                              <th scope="col">Discount</th>
                              <th scope="col">Total</th>
                              <th scope="col">Status</th>
                              <th scope="col" width="15%" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($orders as $order)
                            <tr>
                              <th scope="row">{{ date('m/d/Y', strtotime($order->submitted_at) ) }}</th>
                              <td>{{ $order->ref_no }}</td>
                              <td>{{ $order->payment->title }}</td>
                              <td>{{ $order->summary()['totalQty'] }}</td>
                              <td>{{ $order->summary()['subTotal'] }}</td>
                              <td>{{ $order->summary()['discount'] }}</td>
                              <td>{{ $order->summary()['total'] }}</td>
                              <td><div class="span badge badge-pill pill-badge-secondary">Pending</div></td>
                              <td  class="text-right">
                                <a class="btn btn-secondary btn-sm" href="{{ route('dashboard.order.view', $order) }}" data-toggle="tooltip" title="" role="button" data-original-title="View Tickets">View Tickets</a>
                              </td>
                            </tr>
                            @empty
                               <tr>
                                  <th scope="row" colspan="4">No record found</th>
                                </tr>

                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </div>


@endsection