@extends('management.template.default')

@section('content')
<div class="container-fluid">
  <div class="page-title">
  </div>
</div>
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Categories</h5>
    </div>
    <div class="card-block row">
      <div class="col-sm-12 col-lg-12 col-xl-12">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Category</th>
                <th scope="col">Active</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
                <tr>
                <td>{{ $category->title }}</td>
                <td>
                    @if ($category->active) <i class="icon"><i class="icon-check"></i></i> @else In-active @endif
                </td>
                <td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



  
  
@endsection

