<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MemSearch extends Component
{
    public $search = '';

    public function render()    
    {
        $members = DB::table('members')
            ->when($this->search, function ($query) {
                $query->where('mem_last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('mem_first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('member_id_no', 'like', '%' . $this->search . '%');
            })
            ->limit(10)
            ->get();

        return view('livewire.membership.mem-search', [
            'members' => $members
        ]);
    }

    public function sendID($mem){
        $this->dispatch('memberSelected', $mem);
        // dd($asd);
    }
}
