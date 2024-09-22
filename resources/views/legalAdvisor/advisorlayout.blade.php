@extends('components.layouts.app')
@section('content')
    {{-- Include TOpbar --}}
    @include('include.AdvisorTopbar')
    {{-- Include sidebar --}}
    @include('include.AdvisorSidebar')


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
@endsection
