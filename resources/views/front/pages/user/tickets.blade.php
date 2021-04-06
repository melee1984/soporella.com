@extends('front.template.inside')

@section('content')

<div id="page" class="container">
  <div class="row">
    <div class="col-lg-5">
      <h1>Purchased Tickets</h1>
    </div>
    <div class="col-lg-7">
       @include('front.pages.user.includes.menu')
    </div>
    <div class="col-lg-2 hide">
      <div class="form-group">
        <select class="form-control">
          <option>New Tickets</option>
          <option>Expired Tickets</option>
        </select>
      </div>
    </div>
  </div>
  
  @forelse($orders as $order) 
    @foreach($order->details as $detail)

      <div class="row">
      <div class="col-lg-12 border-box">
        <div class="row">
          <!--Image-->
          <div class="col-lg-3 padding-r0">
            <img class="img-responsive" src="{{ $detail->attraction->photo }}" alt="">
          </div>
          <div class="col-lg-6">
            <h3>{{ $detail->attraction->title }}</h3>
            </p>
            @foreach($detail->variance_converted as $variance)
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-xs-8">
                  <p><strong>{{ $variance['title'] }}</strong> x {{ $variance['qty'] }}<br>
                {{ date('m/d/Y', strtotime($detail->selected_date)) }}<br>
               {{ $variance['sub_total'] }}</p>
               </div>
                  <!-- @if ($order->processed_at!="")
                    <div class="col-lg-4 col-md-4 col-xs-4">Download link</div>
                  @endif -->
                </div>
              </div>
            </div>
             @endforeach
            <p>Total:  {{ $detail->variance_total }}  (VAT included)</p>
          </div>
       
          <div class="col-lg-3 text-right tic-date">
            <p>Date of Purchase: {{ date('m/d/Y', strtotime($order->submitted_at) ) }}<br>
            Number of Ticket(s): {{ $detail->total_qty }}<br>
            Order ID: {{ $order->ref_no }}</p>
              <div class="tic-status">
                @if ($order->processed_at=="")
                  <a class="buy tic-processing" href="javascript: alert('Please wait while we process your Ticket')">Ticket(s) Processing</a>
                  <p><small>You will receive an email when your tickets are ready to download.</small></p>
                @endif

                @if ($order->processed_at!="")
                    <a class="buy " href="">Download Ticket(s) </a>
                @endif
                
              </div>
          </div>
        </div>
      </div>
    </div>  
   
  @endforeach
  @empty
   <div class="row">
    <div class="col-lg-12 border-box">
      <div class="row">
        No record found
      </div>
    </div>
  </div>

  @endforelse

</div>

@endsection 