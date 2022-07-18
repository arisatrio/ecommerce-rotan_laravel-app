<aside class="main-sidebar sidebar-light-gray elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center" style="color: #DEB886;">
        <span class="brand-text font-weight-bold text-center">Rottan-Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.edit', auth()->user()->id) }}" class="d-block text-uppercase">{{ auth()->user()->name }}</a>
            </div>
            <div class="info d-flex ml-auto">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block text-danger"><i class="fas fa-sign-out-alt"></i></a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{  Route::is('admin.dashboard') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>Laporan</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.message.index') }}" class="nav-link {{  Route::is('admin.message.*') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Pesan</p> @if($unreadMessages->count() > 0)<span class="badge badge-danger">{{ $unreadMessages->count() }}</span>@endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.clustering.index') }}" class="nav-link {{  Route::is('admin.clustering.*') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>Clustering</p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pesanan 
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-danger">{{ $newOrder }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.order-new') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Baru</p>
                                <span class="badge badge-danger">{{ $newOrder }}</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proses</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
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
                </li> --}}

                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{  Route::is('admin.product.*') ? 'active' : ''  }}">
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
                <li class="nav-item">
                    <a href="{{ route('admin.shipping.index') }}" class="nav-link {{  Route::is('admin.shipping.*') ? 'active' : ''  }}">
                      <i class="nav-icon fa fa-truck"></i>
                      <p>Ekspedisi</p>
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