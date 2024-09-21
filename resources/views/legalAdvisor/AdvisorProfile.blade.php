@extends('legalAdvisor.advisorlayout')
@section('advisor')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Legal Advisor Profile</h4>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                @if ($advisor->image)
                    <img src="{{ $advisor->image }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                @endif
                <h4 class="mb-0">{{ $advisor->name }}</h4>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                            class="ml-2">{{ $advisor->name }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                            class="ml-2">{{ $advisor->phone }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                            class="ml-2 ">{{ $advisor->email }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Nid :</strong> <span
                            class="ml-2">{{ $advisor->nid }}</span></p>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">

                <div class="tab-pane" id="settings">
                    <form action="{{ route('advisor.update', $advisor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Personal Info Section -->
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Name</label>
                                    <input type="text" name="name" value='{{ $advisor->name }}' class="form-control"
                                        id="firstname" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" value='{{ $advisor->phone }}' class="form-control"
                                        id="phone" placeholder="Enter phone">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value='{{ $advisor->email }}' class="form-control"
                                        id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nid">NID</label>
                                    <input type="number" name="nid" value='{{ $advisor->nid }}' class="form-control"
                                        id="nid" placeholder="Enter NID">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                @if ($advisor->image)
                                    <img src="{{ $advisor->image }}" alt="Current Image" class="img-thumbnail mt-2"
                                        style="max-width: 150px;">
                                @endif
                            </div>
                        </div> <!-- end col -->

                        <!-- Password Section -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" class="form-control"
                                        id="current_password" placeholder="Enter current password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password"
                                        placeholder="Enter new password">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <!-- Save Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                                <i class="mdi mdi-content-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->

    </div> <!-- end col -->
    </div>
@endsection
