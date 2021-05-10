@extends('management.template.default')

@section('content')
  
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>ORDER # {{ $cart->ref_no }}</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
              <a href="index.html" data-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item">Ticket</li>
                    <li class="breadcrumb-item active">Attach File</li>
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
                    <h5>User Information</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          Name: {{ $cart->fullname }} <br>
                          Mobile: {{ $cart->mobile }} <br>
                          Email: {{ $cart->email }} <br><br>
                          Payment Gateway: {{ $cart->payment->title }}<br>
                          Payment Reference no: {{ $cart->payment_ref_no }} <br>
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
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header py-4">
                    <h5>Ticket</h5>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Image</th>
                          <th scope="col">Attraction Name</th>
                          <th scope="col">Ticket Attached</th>
                          <th scope="col">Upload Ticket</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>
                            <a class="btn btn-secondary btn-sm" href="http://soporella.com.test/dashboard/order/0000009711" data-toggle="tooltip" title="" role="button" data-original-title="View Tickets">Upload Ticket</a>
                          </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <!-- Individual column searching (text inputs) Ends-->
              <!-- Offer Ticket Starts-->
              <div class="col-xl-4 col-lg-6 box-col-6 debit-card">
                <div class="card">
                  <div class="card-header py-4">
                    <h5>Status</h5>
                  </div>
                  <div class="card-body">
                      <form class="form">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="exampleFormControlSelect9">Status</label>
                                <select class="form-control" id="exampleFormControlSelect9">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group mb-0">
                                <label for="exampleFormControlTextarea4">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                              </div>
                            </div>
                          </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary" type="submit" data-original-title="" title="">Submit</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- Offer Ticket Ends-->
            </div>
          </div>
          
@endsection