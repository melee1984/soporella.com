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
                  <th scope="col">Amount</th>
                  <th scope="col">Status</th>
                  <th scope="col" width="15%" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($orders as $order)
                <tr>
                  <th scope="row">{{ date('m/d/Y', strtotime($order->submitted_at) ) }}</th>
                  <td>{{ $order->ref_no }}</td>
                  <td>?</td>
                  <td>10</td>
                  <td>1200.00 AED</td>
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

  
@endsection

