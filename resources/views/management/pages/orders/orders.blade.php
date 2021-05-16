@extends('management.template.default')

@section('content')
    

<div class="container-fluid">
  <div class="page-title">
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
                
                 @if ($order->status->id == 1)
                    <div class="span badge badge-pill pill-badge-secondary">{{ $order->status->title }}</div>
                  @else
                  <div class="span badge badge-pill">{{ $order->status->title }}</div>
                  @endif
                  
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

  
@endsection

