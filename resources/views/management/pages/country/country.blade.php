@extends('management.template.default')

@section('content')
<div class="container-fluid">
  <div class="page-title">
  </div>
</div>
<div class="col-sm-12">

    <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
           <div class="row">
              <div class="col-md-6">
                <h5>Category</h5>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{ route('dashboard.management.add') }}" class="btn btn-danger btn-sm">Add New</a>
              </div>
           </div>
          </div>
          <div class="card-body megaoptions-border-space-sm">
              <div class="row">
               <div class="col-md-12">
                  <div class="card">
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col"  width="10%">Active</th>
                                <th scope="col"  width="70%">Category</th>
                                <th scope="col" width="10%"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $category)
                                <tr>
                                <td> @if ($category->active) <i class="icon"><i class="icon-check"></i></i> @else In-active @endif </td>
                                <td>{{ $category->title }}</td>
                                <td class="text-right">
                                  <a href="javascript:void(0)" class="btn btn-square btn-light btn-xs">Delete</a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
              </div>
          </div>
        </div>
      </div>
</div>
  
@endsection

