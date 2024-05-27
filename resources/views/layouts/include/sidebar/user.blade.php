<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('user.dashbord') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.my-transition.*') ? '' : 'collapsed' }}" data-bs-target="#components-transition" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Transaction</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-transition" class="nav-content collapse {{ request()->routeIs('user.transition.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.my-transition.index') }}" class="{{ request()->routeIs('user.my-transition.index', 'user.my-transition.show') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>My Transaction</span>
                    </a>
                </li>
            </ul>
        </li>
</aside>
