<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('user.dashbord') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.category.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Product</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('user.category.*') ? 'show' : 'show' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.category.index') }}" class="{{ request()->routeIs('user.category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.product.index') }}" class="{{ request()->routeIs('user.product.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

</aside>