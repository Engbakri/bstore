<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/index.html">
        <svg
          class="brand-icon"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid"
          width="30"
          height="33"
          viewBox="0 0 30 33"
        >
          <g fill="none" fill-rule="evenodd">
            <path
              class="logo-fill-blue"
              fill="#7DBCFF"
              d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
            />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
          </g>
        </svg>
        <span class="brand-name">Sleek Dashboard</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">
      @if(Auth::user()->hasRole('admin'))
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
        
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="dashboard"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                        <span class="nav-text">Admin Dashboard</span>
                        
                      </a>
                    </li>
                  
                

                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="analytics.html">
                        <span class="nav-text">Customer Dashboard</span>
                        
                      
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Categories"
              aria-expanded="false" aria-controls="Categories">
              <i class="mdi mdi-dropbox"></i>
              <span class="nav-text">Categories</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="Categories"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('category') }}">
                        <span class="nav-text">Categories</span>
                        
                      </a>
                      <a class="sidenav-item-link" href="{{ route('category.create') }}">
                        <span class="nav-text">Add New</span>
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#products"
              aria-expanded="false" aria-controls="products">
              <i class="mdi mdi-cart-outline"></i>
              <span class="nav-text">Products</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="products"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('product') }}">
                        <span class="nav-text">Products</span>
                        
                      </a>
                      <a class="sidenav-item-link" href="{{ route('product.create') }}">
                        <span class="nav-text">Add New</span>
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Users"
              aria-expanded="false" aria-controls="Users">
              <i class="mdi mdi-account-supervisor"></i>
              <span class="nav-text">Users</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="Users"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ url('users') }}">
                        <span class="nav-text">Users</span>
                        
                      </a>
                      <a class="sidenav-item-link" href="{{ route('users.create') }}">
                        <span class="nav-text">Add New</span>
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>
          <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Roles"
              aria-expanded="false" aria-controls="Roles">
              <i class="mdi mdi-account-arrow-right"></i>
              <span class="nav-text">Roles</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="Roles"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ url('roles') }}">
                        <span class="nav-text">Roles</span>
                        
                      </a>
                      <a class="sidenav-item-link" href="{{ route('users.create') }}">
                        <span class="nav-text">Add New</span>
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>
      </ul>
    @endif
    </div>

  
  </div>
</aside>