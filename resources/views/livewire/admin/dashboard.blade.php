<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <form class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2"
                                        placeholder="Search..." wire:model.live="search">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="status-select" class="mr-2">Status</label>
                                    <select class="custom-select" id="status-select" wire:model.live="status">
                                        <option selected value="">Choose...</option>
                                        <option value="Active">Active</option>
                                        <option value="Settled">Settled</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-right">
                                <a href="{{ route('admin.CreateCase') }}">
                                    <button type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-basket mr-1"></i> Add New Case</button></a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Case Number</th>
                                    <th>Parties Defendant</th>
                                    <th>Parties Plaintiff</th>
                                    <th>Representatives Defendant</th>
                                    <th>Representatives Plaintiff</th>
                                    <th>Court Date</th>
                                    <th>Case Status</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cases as $case)
                                    <tr>
                                        <td>{{ $case->number }}</td>
                                        <td>{{ $case->Parties_defendant }}</td>
                                        <td>{{ $case->Parties_Plaintiff }}</td>
                                        <td>{{ $case->representatives_defendant }}</td>
                                        <td>{{ $case->representatives_plaintiff }}</td>
                                        <td>{{ $case->court_date }}</td>
                                        <td>
                                            <h5>
                                                <span
                                                    class="badge
                                                    @if ($case->status == 'Active') badge-info
                                                    @elseif($case->status == 'Settled') badge-success
                                                    @elseif($case->status == 'Ongoing') badge-warning
                                                    @elseif($case->status == 'Closed') badge-danger @endif">
                                                    {{ $case->status }}
                                                </span>
                                            </h5>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.DatailsCase', ['id' => $case->id]) }}"
                                                class="action-icon">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.EditCase', ['id' => $case->id]) }}"
                                                class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon">
                                                <form action="{{ route('cases.delete', $case->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete Case</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No cases found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <div class="mt-3">
        {{ $cases->links() }} <!-- Pagination links -->
    </div>
</div>
