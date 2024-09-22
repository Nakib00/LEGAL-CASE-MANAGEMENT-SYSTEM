@extends('admin.admimlayout')
{{-- webpage title --}}
@section('title')
    Dashboard
@endsection
{{-- main  --}}
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Admin Dashboard</h4>
            </div>

            @livewire('admin.dashboard')
        </div>
    </div>
@endsection
