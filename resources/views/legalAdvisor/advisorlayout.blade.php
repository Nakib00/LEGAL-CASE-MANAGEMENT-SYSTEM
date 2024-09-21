@extends('components.layouts.app')
@section('content')
    <!-- Topbar Start -->
    <div class="navbar-custom">
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
                <a href="{{ route('ladvisord') }}" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{ route('ladvisord') }}" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
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
                        <a href="{{ route('ladvisord') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="#sidebarDashboards" data-toggle="collapse">
                            <i data-feather="airplay"></i>
                            <span> Profile Info </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="{{ route('advisord.profile') }}">My Account</a>
                                </li>
                                <li>
                                    <a href="{{ route('lageladvisor.logout') }}">Logout</a>
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
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                @include('include.alirt')
                <!-- start page title -->
                @yield('advisor')
                <!-- end page title -->
            </div> <!-- container -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
