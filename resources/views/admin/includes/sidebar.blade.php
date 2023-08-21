<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Admin Page</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ Request::is('admins') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/slideshow*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/slideshow">
                    <i class="align-middle" data-feather="film"></i> <span class="align-middle">Slideshow</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/product*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/product">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Product</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/catagory*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/catagory">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Catagory</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/config*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/catagory">
                    <i class="align-middle" data-feather="tool"></i> <span class="align-middle">Configuration</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/users*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/users">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admins/setting*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/admins/setting">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Setting</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
