<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">
          <a href="{{route('Contact')}}" class="nav-link">
          <i class="fas fa-file-contract"></i>
            <p>
             Contact
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('viewBlogs')}}" class="nav-link">
          <i class="fab fa-blogger"></i>
            <p>
             Blog
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('categories.index')}}" class="nav-link">
          <i class="fab fa-blogger"></i>
            <p>
           Categories
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
            <a href="{{route('products.index')}}" class="nav-link">
            <i class="fab fa-blogger"></i>
              <p>
             Products
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{ route('users.index') }}" class="nav-link">
            <i class="fab fa-blogger"></i>
              <p>
             User
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{ route('orders.index') }}" class="nav-link">
            <i class="fab fa-blogger"></i>
              <p>
            Order
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="" class="nav-link">
            <i class="fab fa-blogger"></i>
              <p>
            Order Details
              </p>
            </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
