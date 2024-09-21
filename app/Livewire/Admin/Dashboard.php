<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => '']
    ];
    public function render()
    {
        // Get the logged-in admin's ID
        $adminId = auth()->guard('admin')->id();

        // the total cases created by this admin
        $totalCases = DB::table('cases')
            ->where('admin_id', $adminId)
            ->count();

        //the total number of legal advisors
        $totalAdvisors = DB::table('legal_advisors')->count();

        //the total number of comments on this admin's cases
        $totalComments = DB::table('comments')
            ->join('cases', 'comments.case_id', '=', 'cases.id')
            ->where('cases.admin_id', $adminId)
            ->count();

        $cases = DB::table('cases')
            ->where('admin_id', $adminId)
            ->when($this->search, function ($query) {
                return $query->where('number', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->paginate(5);

        return view('livewire.admin.dashboard', [
            'cases' => $cases,
            'totalCases' => $totalCases,
            'totalAdvisors' => $totalAdvisors,
            'totalComments' => $totalComments
        ]);
    }
}
