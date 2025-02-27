<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

   <!-- Sidebar -->
   <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">@auth
          {{ auth()->user()->full_name }}
        @endauth</a>
      </div>
    </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
         
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.category') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i> <!-- or use fa-list-alt -->
                <p>
                    Categories
                </p>
            </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.product') }}" class="nav-link">
            <i class="nav-icon fas fa-box"></i> <!-- Updated icon -->
            <p>
                  Products
              </p>
          </a>
      </li>
        
  
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>