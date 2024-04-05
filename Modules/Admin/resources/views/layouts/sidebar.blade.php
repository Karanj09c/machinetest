<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('public/assets/images/avatar5.png') }}" alt="MarketMaker Logo" width="20px;" height="40px;"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold"><b>Admin LTE</b></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}"
                        class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"> <i
                            class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/users') }}" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                        <p> Users </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ url('admin/doctors') }}" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                        <p> Doctors </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/logout') }}" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
