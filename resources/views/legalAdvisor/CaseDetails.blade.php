@extends('legalAdvisor.advisorlayout')
{{-- webpage title --}}
@section('title')
    Case Details
@endsection
{{-- main  --}}
@section('advisor')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Case Details</h4>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-6">
                    <!-- project card -->
                    <div class="card d-block">
                        <div class="card-body">
                            <!-- project title-->
                            <h3 class="mt-0 font-20">
                                Case Number: {{ $case->number }}
                            </h3>
                            <div class="badge badge-secondary mb-3">
                                {{ $case->status }}
                            </div>
                            <h5>Case Description:</h5>

                            <p class="text-muted mb-2">
                                {{ $case->description }}
                            </p>

                            <h5 class="mt-4">Parties involved</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <h5>Parties defendant</h5>
                                        <p>{{ $case->Parties_defendant }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <h5>Parties Plaintiff</h5>
                                        <p>{{ $case->Parties_Plaintiff }}</p>
                                    </div>
                                </div>
                            </div>

                            <h5>Defendant Representative</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <h5>Defendant Representative</h5>
                                        <p>{{ $case->representatives_defendant }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <h5>Plaintiff Representative</h5>
                                        <p>{{ $case->representatives_plaintiff }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <h5>Court Date</h5>
                                        <p>{{ $case->court_date }}</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body-->

                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-body">

                            <h4 class="mt-0 mb-3">Comments ({{ $totalComments }})</h4>

                            <form action="{{ route('advisor.comment') }}" method="POST">
                                @csrf
                                <textarea class="form-control form-control-light mb-2" name="comment" placeholder="Write message" id="example-textarea"
                                    rows="3" required></textarea>
                                <input type="hidden" name="case_id" value="{{ $case->id }}">

                                <div class="text-right">
                                    <div class="btn-group mb-2 ml-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                            </form>

                            <div class="comments-section">
                                @foreach ($comments as $comment)
                                    <div class="mt-2">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0">
                                                    <a href="contacts-profile.html"
                                                        class="text-reset">{{ $comment->advisor_name }}</a>
                                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                                </h5>
                                                {{ $comment->comment }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Files</h5>
                            @if (!empty($case->files) && is_array($case->files))
                                @foreach ($case->files as $file)
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                                            {{ pathinfo($file, PATHINFO_EXTENSION) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="{{ asset('storage/' . $file) }}"
                                                        class="text-muted font-weight-medium" target="_blank">
                                                        {{ basename($file) }}
                                                    </a>
                                                    <p class="mb-0">
                                                        {{ round(filesize(storage_path('app/public/' . $file)) / 1024, 2) }}
                                                        MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="{{ asset('storage/' . $file) }}"
                                                        class="btn btn-link btn-lg text-muted">
                                                        <i class="dripicons-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No files uploaded for this case.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
