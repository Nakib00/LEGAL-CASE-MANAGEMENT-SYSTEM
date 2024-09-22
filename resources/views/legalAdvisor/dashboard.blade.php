@extends('legalAdvisor.advisorlayout')
{{-- webpage title --}}
@section('title')
    Dashboard
@endsection
{{-- main  --}}
@section('advisor')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Legal Advisor Dashboard</h4>
            </div>
        </div>
        @livewire('advisor.dashboard')
    </div>
@endsection
