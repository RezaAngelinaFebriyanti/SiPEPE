<div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard')? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="{{ url('/toko') }}" class="nav-link {{ ($activeMenu == 'toko')? 'active' : '' }} ">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>Data Toko</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'barang')? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>Data Barang</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
          <a href="{{ url('/pengiriman') }}" class="nav-link {{ ($activeMenu == 'pengiriman')? 'active' : '' }} ">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Info Pengiriman</p>
          </a>
          </li>
          <li class="nav-header"></li> 
            <li class="nav-item">
                <a href="{{ url('/penagihan') }}" class="nav-link {{ ($activeMenu == 'penagihan') ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Info Penagihan</p> 
                </a>
            </li>
          <li class="nav-item">
          <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'penjualan')? 'active' : '' }} ">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>Transaksi Penjualan</p>
          </a>
          </li>
    </ul>
  </nav>
</div>