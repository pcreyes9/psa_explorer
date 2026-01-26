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

    public function showImg($memberId)
    {
        $photo = DB::table('test_paul.dbo.members')
            ->where('member_id_no', $memberId)
            ->value('mem_pic');

        if (!$photo) {
        return response()->file(
            public_path('assets/img/favicon/PSA_LOGO1.png')
        );
    }

        return response($photo)
            ->header('Content-Type', 'image/jpeg')
            ->header('Cache-Control', 'public, max-age=86400');
    }


    public function render()
    {

        $columns = array_diff(Schema::getColumnListing('members'), ['mem_pic']);

        $columns = array_map(fn($col) => "m.{$col}", $columns);

        $columns[] = 'c.psa_chapter_desc';
        $columns[] = 'mt.Memtype';

        $this->member = DB::table('test_paul.dbo.members as m')
            ->join('chapters as c', function ($join) {
                $join->on('m.psa_chapter_code', '=', DB::raw('c.psa_chapter_code COLLATE DATABASE_DEFAULT'));
            })
            ->join('membership_type as mt', function ($join) {
                $join->on('m.psa_mem_type', '=', DB::raw('mt.Memtypecode COLLATE DATABASE_DEFAULT'));
            })
            ->select($columns)
            ->where('member_id_no', $this->memberID)
            ->first();

        $this->cme_activities = DB::table('cme_program_registration')
            ->where('member_id_no', $this->memberID)
            ->orderBy('cme_year', 'desc')
            ->get();
            
        return view('livewire.membership.mem-account');
    }
}
