<nav>
  <div class="sidebar-main">
    <div id="sidebar-menu">
      <ul class="sidebar-links custom-scrollbar">
        <li class="back-btn">
          <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
        </li>
        <li class="sidebar-list"><a href="{{ route('dashboard.management.dashboard') }}" class="nav-link sidebar-title" href=""><i data-feather="home"></i><span>Dashboard</span></a></li>
        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Manage Products</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.management.attraction') }}">Attraction</a></li>
                    <li><a href="{{ route('dashboard.management.promotions') }}">Promotions</a></li>
                    <li><a href="{{ route('dashboard.management.categories') }}">Category</a></li>
                    <li><a href="{{ route('dashboard.management.coupons') }}">Coupons</a></li>
                  </ul>
          </li>
           <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>Manage Users</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.management.user') }}">User</a></li>
                  
                  </ul>
          </li>
           <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="settings"></i><span>Settings</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="product.html">Profile</a></li>
                  
                  </ul>
          </li>
             <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-cart"></i><span>Manage Orders</span></a>
                <ul class="sidebar-submenu">
                  <li><a href="product.html">Order Today</a></li>
                  <li><a href="product-page.html">Search Orders</a></li>
                
                </ul>
          </li>
             <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span>Report</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="product.html">Attraction</a></li>
                    <li><a href="product-page.html">Product page</a></li>
                  </ul>
          </li>
                 <li class="sidebar-list"><a class="nav-link sidebar-title" href="" target="_blank"><i data-feather="globe"></i><span>Language</span></a></li>
           <li class="sidebar-list"><a class="nav-link sidebar-title" href="{{ route('dashboard.logout') }}" target="_blank"><i data-feather="log-out"></i><span>Logout</span></a></li>

      </ul>
    </div>
  </div>
</nav>