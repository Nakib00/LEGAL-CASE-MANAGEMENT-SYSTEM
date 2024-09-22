    <div class="navbar-custom" style="background-color: #152547;">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list topbar-dropdown">
                    <!-- Trigger for the dropdown -->
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="pro-user-name ml-1">
                            {{ Auth::guard('ladvisor')->user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('ladvisord') }}" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/chevron_logo.png') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/chevron_logo.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>
        </div>
    </div>
