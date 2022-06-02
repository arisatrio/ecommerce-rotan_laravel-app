<aside class="main-sidebar sidebar-light-gray elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center" style="color: #DEB886;">
        <span class="brand-text font-weight-bold text-center">Rottan-Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3 d-flex">
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
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Pesan</p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pesanan <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::currentRouteName()==='admin.users.index') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Baru</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::currentRouteName()==='admin.users.index') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proses</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::currentRouteName()==='admin.users.index') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-shipping-fast"></i>
                      <p>Pengiriman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-comments"></i>
                      <p>Ulasan</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-box"></i>
                      <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{  Route::is('admin.category.*') ? 'active' : ''  }}">
                      <i class="nav-icon fa fa-list-alt"></i>
                      <p>Kategori</p>
                    </a>
                </li>
                
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{  Route::is('admin.users.*') ? 'active' : ''  }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.admins.index') }}" class="nav-link {{  Route::is('admin.admins.*') ? 'active' : ''  }}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Admin</p>
                    </a>
                </li>

                <li class="nav-header">WEBSITE</li>
                <li class="nav-item">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link {{  Route::is('admin.banner.*') ? 'active' : ''  }}">
                      <i class="nav-icon fas fa-bullhorn"></i>
                      <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{  Route::is('admin.settings.*') ? 'active' : ''  }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>Pengaturan</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>