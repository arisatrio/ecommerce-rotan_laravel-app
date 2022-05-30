<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center bg-lightblue">
        <span class="brand-text font-weight-light text-center">Rottan-Shop</span>
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
                <li class="nav-header">MASTER DATA</li>
                
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Admin</p>
                    </a>
                </li>
                <li class="nav-header">WEBSITE</li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>