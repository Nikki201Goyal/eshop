<aside class="main-sidebar .sidebar-dark-warning elevation-4" style="background-color:  rgb(40, 40, 41) ">


        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">


  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

    <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN PANEL </a>
        </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item menu-open mt-3">
                <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-user">&nbsp;</i>
                  <p>
                 User
                  </p>
                </a>
              </li>

               <li class="nav-item menu-open mt-3">
                <a href="{{route('categories.index')}}" class="nav-link">
                <i class="fas fa-list-ul">&nbsp;</i>
                  <p>
                 Categories
                  </p>
                </a>
              </li>

              <li class="nav-item menu-open mt-3">
                <a href="{{route('products.index')}}" class="nav-link">
                <i class="fab fa-product-hunt">&nbsp;</i>
                  <p>
                 Products
                  </p>
                </a>
              </li>

              <li class="nav-item menu-open mt-3">
                <a href="{{ route('orders.index') }}" class="nav-link">
                    <i class="fas fa-cart-plus">&nbsp;</i>

                  <p>
                Order
                  </p>
                </a>
              </li>

              <li class="nav-item menu-open mt-3">
                <a href="{{route('viewBlogs')}}" class="nav-link">
                <i class="fab fa-blogger">&nbsp;</i>
                  <p>
                   Blog
                  </p>
                </a>
              </li>

        <li class="nav-item menu-open mt-3">
          <a href="{{route('Contact')}}" class="nav-link">
            <i class="fas fa-id-card-alt">&nbsp;</i>
            <p>
             Contact
            </p>
          </a>
        </li>


        <li class="nav-item menu-open mt-3">
            <a href="{{route('subscribe')}}" class="nav-link">
            <i class="fab fa-blogger">&nbsp;</i>
              <p>
               Subscribers
              </p>
            </a>
          </li>
      </ul>
    </nav>
  </div>
</aside>


  <!-- /.sidebar -->

