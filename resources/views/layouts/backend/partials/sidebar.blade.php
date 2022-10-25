<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>GENERAL</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @yield('dashboard-active')" href="#">
                    <span data-feather="airplay"></span>
                    Dashboard
                </a>
            </li>   

            <li class="nav-item">
                <a class="nav-link @yield('category-active')" href="{{ route('admin.category.index') }}">
                    <span data-feather="align-left"></span>
                    Categories
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link @yield('product-active')" href="{{ route('admin.product.index') }}">
                    <span data-feather="box"></span>
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('role-active')" href="{{ route('admin.role.index') }}">
                    <span data-feather="repeat"></span>
                    Access Control List
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('order-active')" href="{{ route('admin.order.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Order
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('user-active')" href="{{ route('admin.user.index') }}">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('employee-active')" href="{{ route('admin.employee.index') }}">
                    <span data-feather="users"></span>
                    Employees
                </a>
            </li>
        </ul>
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>SETTINGS</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link @yield('profile-active')" href="{{ route('admin.profile.index') }}">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('password-active')" href="#">
                    <span data-feather="lock"></span>
                    Change Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <span data-feather="log-out"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>