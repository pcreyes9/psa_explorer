<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class MemAcc extends Component
{
    public $member, $acc;

    #[On('memberSelected')]

    public function loadMember($mem)
    {
        // dd($mem, 'mem accs');
        $this->acc = $mem;      
    }

    public function render()
    {
        $member = null;
        if ($this->acc) {
            $member = DB::table('members')
                ->where('member_id_no', $this->acc)
                ->first();
            // dd($member);
        }
        
        return view('livewire.membership.mem-acc', compact('member'));

    }
}
