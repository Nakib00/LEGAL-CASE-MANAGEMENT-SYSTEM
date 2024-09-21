<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div>
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="row mb-2">
            <div class="col-sm-8">
                <div class="text-sm-right">
                    <!-- Search and Dropdown Section -->
                    <form class="form-inline mb-3">
                        <div class="form-row align-items-center">
                            <!-- Search Input -->
                            <div class="col-auto">
                                <label for="search-input" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="search-input" wire:model.live="search"
                                    placeholder="Search...">
                            </div>

                            <!-- Status Dropdown -->
                            <div class="col-auto">
                                <label for="status-select" class="sr-only">Status</label>
                                <select class="custom-select" wire:model.live="status">
                                    <option selected value="">Choose Status...</option>
                                    <option value="Active">Active</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Finished">Finished</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end row -->
    </div>
    <!-- end row-->


    <div class="row d-flex flex-wrap">
        @foreach ($cases as $case)
            <div class="col-lg-4 d-flex">
                <div class="card-box project-box flex-fill">
                    <!-- Title-->
                    <h4 class="mt-0"><a href="{{ route('admin.DatailsCase', ['id' => $case->id]) }}"
                            class="text-dark">{{ $case->number }}</a></h4>
                    <p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i>
                        <small>{{ $case->admin_name }}</small>
                    </p>
                    <div
                        class="badge
                    @if ($case->status == 'Active') bg-info text-white
                    @elseif($case->status == 'Ongoing') bg-warning text-dark
                    @elseif($case->status == 'Finished') bg-success text-white
                    @elseif($case->status == 'Closed') bg-danger text-white @endif mb-3">
                        {{ $case->status }}
                    </div>

                    <!-- Desc-->
                    <p class="text-muted font-13 mb-3 sp-line-2">
                        {{ Str::limit($case->description, 100) }}
                    </p>
                    <!-- Task info-->
                    <div class="row">
                        <div class='col-lg-12'>
                            <span class="pr-2 text-nowrap mb-2 d-inline-block">Parties defendant:
                                {{ $case->Parties_defendant }}</span>
                        </div>
                        <div class='col-lg-6'>
                            <span class="text-nowrap mb-2 d-inline-block">Parties Plaintiff:
                                {{ $case->Parties_Plaintiff }}</span>
                        </div>
                    </div>
                    <p class="mb-2 font-weight-medium">Court date: <span
                            class="float-right">{{ $case->court_date }}</span></p>
                </div> <!-- end card box-->
            </div><!-- end col-->
        @endforeach
    </div>

    <!-- end row -->
    <!-- Pagination -->
    <div class="mt-1">
        {{ $cases->onEachSide(1)->links('pagination::bootstrap-4') }}
    </div>
</div>
