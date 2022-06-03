<nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #DEB886;"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
       <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell" style="color: #DEB886;"></i>
                @if($unreadMessages->count() > 0)<span class="badge badge-danger navbar-badge">{{ $unreadMessages->count() }}</span> @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ $unreadMessages->count() }} Notifications</span>
                <div class="dropdown-divider"></div>
                @if($unreadMessages->count() > 0)
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $unreadMessages->count() }} new messages
                    <span class="float-right text-muted text-sm">{{ $unreadMessages->last()->created_at->diffForHumans() }}</span>
                </a>
                @endif
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
            </div>
        </li>
        <div class="user-panel d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: #DEB886;">{{ auth()->user()->name }}</a>
            </div>
        </div>
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
        </li>   --}}
    </ul>
</nav>