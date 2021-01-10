<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Kartini</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
          
      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <span>Barang</span></a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('barang.index')}}">Nama Barang</a>
            <a class="collapse-item" href="{{route('data.index')}}">Data Barang</a>
            <a class="collapse-item" href="{{route('pembelian.index')}}">Input Barang Masuk</a>
            <a class="collapse-item" href="{{route('penjualan.index')}}">Input Barang Keluar</a>
          </div>
        </div>  
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-clone"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('cetaklaporan')}}">Barang Masuk</a>
            <a class="collapse-item" href="{{route('LaporanBarangKeluar')}}">Barang Keluar</a>
          </div>
        </div>
      </li>
      
      @if (Auth::user()->name == 'Herry')
      <li class="nav-item ">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>User</span></a>
      </li>
      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->