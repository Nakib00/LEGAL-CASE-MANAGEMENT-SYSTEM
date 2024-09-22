@include('include.head')

<body data-layout-mode="detached"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">
        @yield('content')
    </div>
    <!-- END wrapper -->


    @include('include.footer')
    @livewireScripts
</body>

</html>
