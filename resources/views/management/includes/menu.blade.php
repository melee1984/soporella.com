<nav>
  <div class="sidebar-main">
    <div id="sidebar-menu">
      <ul class="sidebar-links custom-scrollbar">
        <li class="back-btn">
          <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
        </li>
        <li class="sidebar-list"><a href="{{ route('dashboard.management.dashboard') }}" class="nav-link sidebar-title" href=""><i data-feather="home"></i><span>Dashboard</span></a></li>
        <li class="sidebar-list">
          <a class="sidebar-link sidebar-title active" href="#"><i data-feather="list"></i><span>Manage Products</span></a>
                  <ul class="sidebar-submenu" style="display: block;">
                    <li><a href="/dashboard/attraction" class="active">Attraction</a></li>
                    <li><a href="/dashboard/promotions">Promotions</a></li>
                    <li><a href="/dashboard/settings">Category</a></li>
                    <li><a href="/dashboard/coupons">Coupons</a></li>
                  </ul>
          </li>
           <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>Manage Users</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="/dashboard/users">User</a></li>
                  
                  </ul>
          </li>
           <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="settings"></i><span>Settings</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Profile</a></li>
                  </ul>
          </li>
             <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-cart"></i><span>Manage Orders</span></a>
                <ul class="sidebar-submenu">
                  <li><a href="dashboard/order">Orders</a></li>
                </ul>
          </li>
             <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span>Report</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Attraction</a></li>
                    <li><a href="#">Product page</a></li>
                  </ul>
          </li>
            <!--   <li class="sidebar-list"><a class="nav-link sidebar-title" href="" target="_blank"><i data-feather="globe"></i><span>Language</span></a></li> -->
           <li class="sidebar-list"><a class="nav-link sidebar-title" href="{{ route('dashboard.logout') }}" target="_blank"><i data-feather="log-out"></i><span>Logout</span></a></li>

      </ul>
    </div>
  </div>
</nav>