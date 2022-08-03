<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="adminlte/dist/img/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'SIGPADA') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        {{-- <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div> --}}
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <h5  class="form-control form-control-sidebar elevation-4">Nom voirie</h5>
            </div>
          </div>
      </div>

      <!-- SidebarSearch Form -->

      @include('pages.form-voie')
      <!-- Sidebar Menu -->

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
