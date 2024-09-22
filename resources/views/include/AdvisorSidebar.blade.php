<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            @if (Auth::guard('ladvisor')->user()->image)
                <img src="{{ Auth::guard('ladvisor')->user()->image }}" alt="user-img"
                    title="{{ Auth::guard('ladvisor')->user()->name }}" class="rounded-circle avatar-md">
            @endif
            <div class="dropdown">
                <a href="" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{ Auth::guard('ladvisor')->user()->name }} </a>
            </div>
            <p class="text-muted">Legal Advisor</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('ladvisord') }}" wire:navigate>Dashboard</a>
                </li>
                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i data-feather="airplay"></i>
                        <span> Profile Info </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{ route('advisord.profile') }}" wire:navigate>My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('lageladvisor.logout') }}" wire:navigate>Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
