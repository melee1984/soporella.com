@extends('management.template.default')

@section('content')
  
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
               
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
              <a href="index.html" data-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item">Order</li>
                    <li class="breadcrumb-item active">Tickets</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Individual column searching (text inputs) Starts-->
              <div class="col-xl-8 box-col-12">
                <div class="card">
                  <div class="card-header py-4">
                    <div class="row">
                            <div class="col-sm-6">
                              <div class="media">
                                <div class="media-left"><img class="media-object img-60" src="../assets/images/other-images/logo-login.png" alt="" data-original-title="" title=""></div>
                                <div class="media-body m-l-20">
                                  <h4 class="media-heading">{{ $cart->fullname }}</h4>
                                  <p> {{ $cart->email }}<br><span> {{ $cart->mobile }}</span></p>
                                </div>
                              </div>
                              <!-- End Info-->
                            </div>
                            <div class="col-sm-6">
                              <div class="text-md-right">
                                <h3>Order #<span class="counter">{{ $cart->ref_no }}</span></h3>
                                <p>Created: May<span> {{ $cart->created_at->format('Y-m-d H:i:s') }}</span><br>                                                            
                              </div>
                              <!-- End Title-->
                            </div>
                          </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          Payment Gateway: {{ $cart->payment->title }}<br>
                          Payment Reference no: {{ $cart->payment_ref_no }} 
                          <hr>
                          <strong>Tickets: </strong>
                          <ul>

                            @foreach($cart->details  as $detail)

                              @php 
                                $listing = unserialize($detail->variance_details);
                              @endphp

                              @foreach($listing as $variance)
                                <li>{{ $variance['qty'] }} x {{ $variance['title'] }} {{ $variance['price'] }}</li>
                              @endforeach

                            @endforeach
                          </ul>
                      </div>

                      @if (count($tickets)>0)
                       <div class="col-md-12">
                          <br><br>
                         <h4 class="media-heading">Download Tickets</h4>
                         <div class="row" >
                           @foreach($tickets as $ticket)
                              @php
                                $ticket->downloadURLFile();
                              @endphp
                              <div class="col-md-1 text-left" style="padding: 3px;">
                                  <a href="{{ $ticket->downloadURLFile }}" class="btn btn-xs btn-light" target="_blank">View</a>
                              </div>
                             <div class="col-md-9 text-left" style="padding: 3px;">
                                {{ $ticket->filename }}
                              </div>
                             
                              <div class="col-md-2 text-right" style="padding: 3px;">
                                  <a href="{{ URL::to('dashboard/'.$ticket->id.'/report/attach/delete') }}" class="btn btn-xs btn-danger">Delete</a>
                              </div>
                           @endforeach

                         </div>
                       </div>
                       @endif

                    </div>
                  </div>
                </div>

                @foreach($cart->details  as $detail)
                  @php 
                    $detail->attraction;
                    $detail->variance_details = unserialize($detail->variance_details);
                  @endphp
                @endforeach

                <hr>

                @foreach($tickets as $ticket) 

                @endforeach
                <!-- Details --> 
                <view-list :details="{{ $cart->details }}" ></view-list>
                <!-- end Details --> 

              </div>

              <attach-list :details="{{ $cart->details }}" :status="{{ $status }}" :cart="{{ $cart }}"></attach-list>

              <!-- Offer Ticket Ends-->
            </div>
          </div>
          
@endsection