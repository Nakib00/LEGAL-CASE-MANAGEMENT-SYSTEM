@extends('admin.admimlayout')
{{-- webpage title --}}
@section('title')
    Create Case
@endsection
{{-- main  --}}
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Case</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('cases.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- CSRF token for security -->
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="case-number">Case Number</label>
                                            <input type="text" name="number" id="case-number" class="form-control"
                                                placeholder="Enter case number" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="case-description">Case Overview</label>
                                            <textarea class="form-control" name="description" id="case-description" rows="5" placeholder="Enter case overview" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Case Status</label> <br />
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="Active"
                                                    class="custom-control-input" required>
                                                <label class="custom-control-label" for="customRadio1">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="Settled"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Settled</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio3" name="status" value="Ongoing"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Ongoing</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio4" name="status" value="Closed"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Closed</label>
                                            </div>
                                        </div>

                                        <label>Parties involved</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="defendant">Defendant</label>
                                                    <input type="text" name="defendant" id="defendant" class="form-control"
                                                        placeholder="Enter Defendant name" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="plaintiff">Plaintiff</label>
                                                    <input type="text" name="plaintiff" id="plaintiff" class="form-control"
                                                        placeholder="Enter Plaintiff name" required>
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
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="rep-plaintiff">Plaintiff Representative</label>
                                                    <input type="text" name="rep_plaintiff" id="rep-plaintiff"
                                                        class="form-control" placeholder="Enter representative name"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <!-- Date View -->
                                                <div class="form-group">
                                                    <label for="court-date">Court Date</label>
                                                    <input type="date" name="court_date" id="court-date"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-xl-6">
                                        <div class="form-group m-3 mt-xl-0">
                                            <label for="case-file" class="mb-0">Evidence</label>
                                            <input type="file" name="files[]" multiple class="form-control" required>
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i
                                                class="fe-check-circle mr-1"></i> Create</button>
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
