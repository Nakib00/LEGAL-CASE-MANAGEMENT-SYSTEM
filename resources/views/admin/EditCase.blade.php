@extends('admin.admimlayout')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Case</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('cases.update', $case[0]->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf <!-- CSRF token for security -->

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="case-number">Case Number</label>
                                            <input type="text" name="number" id="case-number" class="form-control"
                                                placeholder="Enter case number" value="{{ $case[0]->number }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="case-description">Case Overview</label>
                                            <textarea class="form-control" name="description" id="case-description" rows="5" placeholder="Enter case overview"
                                                required>{{ $case[0]->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Case Status</label> <br />
                                            @php
                                                $statuses = ['Active', 'Settled', 'Ongoing', 'Closed'];
                                            @endphp
                                            @foreach ($statuses as $status)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio{{ $status }}" name="status"
                                                        value="{{ $status }}" class="custom-control-input"
                                                        {{ $case[0]->status === $status ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customRadio{{ $status }}">{{ $status }}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <label>Parties involved</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="defendant">Defendant</label>
                                                    <input type="text" name="defendant" id="defendant"
                                                        class="form-control" placeholder="Enter Defendant name"
                                                        value="{{ $case[0]->Parties_defendant }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="plaintiff">Plaintiff</label>
                                                    <input type="text" name="plaintiff" id="plaintiff"
                                                        class="form-control" placeholder="Enter Plaintiff name"
                                                        value="{{ $case[0]->Parties_Plaintiff }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label>Legal representatives</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="rep-defendant">Defendant Representative</label>
                                                    <input type="text" name="rep_defendant" id="rep-defendant"
                                                        class="form-control" placeholder="Enter representative name"
                                                        value="{{ $case[0]->representatives_defendant }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="rep-plaintiff">Plaintiff Representative</label>
                                                    <input type="text" name="rep_plaintiff" id="rep-plaintiff"
                                                        class="form-control" placeholder="Enter representative name"
                                                        value="{{ $case[0]->representatives_plaintiff }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <!-- Date View -->
                                                <div class="form-group">
                                                    <label for="court-date">Court Date</label>
                                                    <input type="date" name="court_date" id="court-date"
                                                        class="form-control" value="{{ $case[0]->court_date }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-xl-6">
                                        <div class="form-group m-3 mt-xl-0">
                                            <label for="case-file" class="mb-0">Evidence (You can upload new
                                                files)</label>
                                            <input type="file" name="files[]" multiple class="form-control">

                                            @if (!empty($case[0]->file))
                                                <p>Existing Files:</p>
                                                @php
                                                    $files = json_decode($case[0]->file, true);
                                                @endphp
                                                @foreach ($files as $file)
                                                    <a href="{{ asset('storage/' . $file) }}"
                                                        target="_blank">{{ basename($file) }}</a><br>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i
                                                class="fe-check-circle mr-1"></i> Update</button>
                                        <a href="{{ route('admind') }}">
                                            <button type="button" class="btn btn-light waves-effect waves-light m-1"><i
                                                    class="fe-x mr-1"></i> Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
@endsection
