<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class CaseList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $perPage = 6;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table('cases')
            ->join('admins', 'cases.admin_id', '=', 'admins.id')
            ->select(
                'cases.id',
                'cases.number',
                'cases.description',
                'cases.status',
                'cases.Parties_defendant',
                'cases.Parties_Plaintiff',
                'cases.court_date',
                'admins.name as admin_name'
            );

        // Filter by search input (case number)
        if ($this->search) {
            $query->where('cases.number', 'like', '%' . $this->search . '%');
        }

        // Filter by status
        if ($this->status) {
            $query->where('cases.status', $this->status);
        }

        // Paginate the results
        $cases = $query->paginate($this->perPage);

        return view('livewire.admin.case-list', [
            'cases' => $cases
        ]);
    }
}
