<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashbord') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.category.*', 'admin.product.*', 'admin.product.gallery.*' ) ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Product</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('admin.category.*') ? 'show' : 'show' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}" class="{{ request()->routeIs('admin.product.index', 'admin.product.gallery.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.transition.*', 'admin.my-transition.*') ? '' : 'collapsed' }}" data-bs-target="#components-transition" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Transaction</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-transition" class="nav-content collapse {{ request()->routeIs('admin.transition.*') ? 'show' : 'show' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.transition.index') }}" class="{{ request()->routeIs('admin.transition.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.my-transition.index') }}" class="{{ request()->routeIs('admin.my-transition.index', 'admin.my-transition.show') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>My Transaction</span>
                    </a>
                </li>
            </ul>
        </li>

</aside>