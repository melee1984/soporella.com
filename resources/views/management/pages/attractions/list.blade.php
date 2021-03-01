@foreach($attractions as $attraction) 
  <div class="col-xl-3 col-sm-6 xl-4">
  <div class="card">
    <div class="product-box">
      <div class="product-img"><img class="img-fluid" src="{{ asset('products/images/'.$attraction->photo) }}" alt="">
        <div class="product-hover">
          <ul>
            <li>
              <button class="btn" type="button" data-toggle="modal" data-target="#display_{{ $attraction->id }}"><i class="icon-eye"></i></button>
            </li>
            <li>
              <a href="{{ route('dashboard.management.edit', $attraction) }}"><i class="icon-pencil"></i></a>
            </li>
            
          </ul>
        </div>
      </div>
      <div class="modal fade" id="display_{{ $attraction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="product-box row">
                <div class="product-img col-md-6">
                    <img class="img-fluid" src="{{ asset('products/images/'.$attraction->photo) }}" alt="">
                </div>
                <div class="product-details col-md-6 text-left">
                  <h4>{{ $attraction->title }}</h4>
                  <div class="product-price">$26.00
                    <del>$350.00    </del>
                  </div>
                  <div class="product-view">
                    <h6 class="f-w-600">{{ $attraction->title }}</h6>
                    <p class="mb-0">{{ $attraction->description }}<</p>
                  </div>
                  <div class="product-size">
                 <!--    <ul>
                      <li> 
                        <button class="btn btn-outline-light" type="button">M</button>
                      </li>
                      <li> 
                        <button class="btn btn-outline-light" type="button">L</button>
                      </li>
                      <li> 
                        <button class="btn btn-outline-light" type="button">Xl</button>
                      </li>
                    </ul> -->
                  </div>
                  <!-- <div class="product-qnty">
                    <h6 class="f-w-600">Quantity</h6>
                    <fieldset>
                      <div class="input-group">
                        <input class="touchspin text-center" type="text" value="5">
                      </div>
                    </fieldset>
                    <div class="addcart-btn">
                      <button class="btn btn-primary" type="button">Add to Cart</button>
                      <button class="btn btn-primary" type="button">View Details</button>
                    </div>
                  </div> -->
                </div>
              </div>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
          </div>
        </div>
      </div>
      <div class="product-details">
        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
        <h4>{{ $attraction->title }}</h4>
        <p>{{ $attraction->short_description }}</p>
        <div class="product-price">$26.00 
          <del>$350.00    </del>
        </div>
      </div>
    </div>
  </div>
</div>

@endforeach