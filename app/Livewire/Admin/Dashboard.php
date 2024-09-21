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
        $cases = DB::table('cases')
            ->when($this->search, function ($query) {
                return $query->where('number', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->paginate(10);

        return view('livewire.admin.dashboard', [
            'cases' => $cases
        ]);
    }
}
