@extends('components.layouts.app')
@section('content')
    {{-- Include topbar --}}
    @include('include.AdminTopbar')

    {{-- Include sidebar --}}
    @include('include.AdminSidebar')


    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid" style="padding: 0;">
                @include('include.alirt')
                <!-- start page title -->
                @yield('admin')
                <!-- end page title -->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
