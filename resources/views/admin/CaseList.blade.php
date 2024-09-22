@extends('admin.admimlayout')
{{-- webpage title --}}
@section('title')
    Case List
@endsection
{{-- main  --}}
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Case List</h4>
            </div>
            @livewire('admin.CaseList')
        </div>
    </div>
@endsection
