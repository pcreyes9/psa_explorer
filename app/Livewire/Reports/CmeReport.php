<?php

namespace App\Livewire\Reports;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CmeReport extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $modal_cme =[];

    public function mount()
    {
        $this->modal_cme = DB::table('cme_program')
            ->where('cme_program_code', 'CME2026001')
            ->first();
    }
    public function modalView($cmeProgramCode)
    {
        $this->modal_cme = DB::table('cme_program')
            ->where('cme_program_code', $cmeProgramCode)
            ->first();
    }

    public function render()
    {
        $cme_records = DB::table('cme_program')
            ->orderBy('cme_year', 'desc')
            ->paginate(15);

        return view('livewire.reports.cme-report', compact('cme_records'));
    }
}
