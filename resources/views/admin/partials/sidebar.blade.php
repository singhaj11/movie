<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="{{ request()->is('admin') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i
                        class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('users') }}"><i
                        class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin/movies') || request()->is('admin/movies/*') ? 'active' : '' }}"
                    href="{{ route('movies.index') }}"><i class="sidebar-item-icon fa fa-video-camera"></i>
                    <span class="nav-label">Movies</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->