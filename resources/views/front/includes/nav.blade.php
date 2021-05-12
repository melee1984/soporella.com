<div id="nav_wrap" class="nav-cops hidden-xs">
  <div id="navi" class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
              <ul> 
                @foreach($menus as $menu)
            <li><a title="{{ $menu->language_string['title'] }}" class="{{ (request()->segment(1) == $menu->slug) ? 'active' : '' }}" href="{{ route('page.category', $menu) }}">{{ $menu->language_string['title'] }}</a></li>
                @endforeach
                <li><a title="Promotions" id="promo" class="promo" href="{{ route('promotions') }}">{{ trans('messages.PROMOTIONS') }}</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>