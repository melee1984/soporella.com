<div class="container-fluid">
  <div class="table-responsive product-table">
      <table class="table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Details</th>
            <th>Emirates</th>
            <th>Action</th>
          </tr>
        </thead>
         <tbody>

        @foreach($attractions as $attraction) 

          @php
            $attraction->language_string  = $attraction->convertLanguageField();
          
          @endphp
          <tr>
            <td>
                <a href="{{ route('dashboard.management.edit', $attraction) }}">
                @if ($attraction->photo)
                  <img class="img-fluid" src="{{ asset('uploads/images/'.$attraction->id .'/'. $attraction->photo) }}" alt="" width="75">
                @else
                  <img class="img-fluid" src="{{ asset('images/soporella-placeholder.jpg') }}" alt=""  width="75">
                @endif
              </a>
            </td>
            <td>
              <h6> {{ $attraction->title }} </h6><span>{{ Str::limit($attraction->language_string['description'], 250)  }}</span>
            </td>
            <td>
              @if ($attraction->location)
                {{ $attraction->location->title }}
              @else 
                - 
              @endif
            </td>
            <td>
              <a href="{{ route('dashboard.management.edit', $attraction) }}" class="btn btn-success btn-sm" >Edit</a>
            </td>
          </tr>

    @endforeach

        </tbody>
      </table>
  </div>
</div>
