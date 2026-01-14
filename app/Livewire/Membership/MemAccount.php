<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class MemAccount extends Component
{
    public $memberID, $member, $cme_activities;
    public function mount($member_id)
    {
        $this->memberID = $member_id;

    }


    public function render()
    {

        // Get all column names from the table and remove 'mem_pic'
        $columns = array_diff(Schema::getColumnListing('members'), ['mem_pic']);

        // Fetch as a single object (stdClass)
        $this->member = DB::table('members')
            ->select($columns)
            ->where('member_id_no', $this->memberID)
            ->first();

        $this->cme_activities = DB::table('cme_program_registration')
            // ->select($columns)
            ->where('member_id_no', $this->memberID)
            ->orderBy('cme_year', 'desc')
            ->get();

        

        
        return view('livewire.membership.mem-account');
    }
}
