<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use App\Livewire\Membership\MemAcc;

class MemSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $members = [];

    public function searchMembers()
    {
        // dd($this->search);
        $this->members = DB::table('member')
        ->select('member_id_no', 'mem_last_name', 'mem_first_name', 'mem_middle_name', 'mem_prc_no', 'psa_chapter_code')
        ->when($this->search, function ($query) {
            $query->where('mem_last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('mem_first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('member_id_no', 'like', '%' . $this->search . '%');
        })
        // ->paginate(40);
        ->get();
        // dd($this->members); 
    }

    public function render()
    {
        return view('livewire.membership.mem-search', [
            'members' => $this->members
        ]);
    }

    public function sendID($mem)
    {
        return redirect()->route('mem-account', $mem);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
