<div class="container-fluid">
<div class="card">
  <div class="card-header">
    <h5>General</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-8 col-sm-8">
        <form>
          <div class="row">
            <div class="form-group col-12">
              <label for="inputEmail4">Title</label>
              <input class="form-control" id="inputEmail4" type="email" data-original-title="" title="" value="{{ $attraction->title }}">
            </div>
            <div class="form-group col-12">
              <label for="inputPassword4">Description</label>
              <textarea class="form-control" id="inputPassword4" data-original-title="" title="" rows="10">{{ $attraction->description }}</textarea> 
            </div>
          </div>
        </form>
      </div>
       <div class="col-lg-4 col-sm-4">
          <label>Primary Photo</label>
          <img src="{{ asset('products/images/'.$attraction->photo ) }}" class="img-fluid"> 
       </div>
      </div>
    </div>
  </div>
</div>
