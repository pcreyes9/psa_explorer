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
        $columns = array_diff(Schema::getColumnListing('member'), ['mem_pic', 'remarks', 'cme_units', 'mem_prc_exp_date', '[mem_fax_no]', '[old_id]', '[mem_province]', '[mem_birth_place]', '[spouse_occupation]', '[spouse_address]', '[spouse_phone_no]', '[mem_pma_exp_yr]', '[mem_sr_no]', '[mem_practice_pref]', '[mem_dbfstat]', '[mem_total_bal]']);

        $columns = array_map(fn($col) => "m.{$col}", $columns);

        $columns[] = 'c.psa_chapter_desc';
        $columns[] = 'mt.Memtype';

        $this->member = DB::table('member as m')
            ->join('chapters as c', function ($join) {
                $join->on('m.psa_chapter_code', '=', DB::raw('c.psa_chapter_code COLLATE DATABASE_DEFAULT'));
            })
            ->join('membership_type as mt', function ($join) {
                $join->on('m.psa_mem_type', '=', DB::raw('mt.Memtypecode COLLATE DATABASE_DEFAULT'));
            })
            ->select($columns)
            ->select('member_id_no', 'mem_last_name', 'mem_first_name', 'mem_middle_name', 'psa_mem_type'
            , 'm.psa_chapter_code', 'mem_prc_no', 'mem_mobile_no1', 'mem_email_address', 'mem_home_address', 'spouse_name'
            , 'c.psa_chapter_desc', 'mt.Memtype', 'mem_pma_id_no', 'mem_prc_no', 'mem_phic_no', 'mem_fellow_no', 'mem_fellow_yr'
            , 'psa_mem_stat', 'mem_stat', 'mem_mobile_no2', 'mem_gender', 'mem_religion', 'mem_civil_status')
            ->where('member_id_no', $this->memberID)
            ->first();
            // dd($this->member);

        $this->cme_activities = DB::table('cme_program_registration')
            ->where('member_id_no', $this->memberID)
            ->orderBy('cme_year', 'desc')
            ->get();

    }

    public function showImg($memberId)
    {
        $photo = DB::table('member')
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

        
            
        return view('livewire.membership.mem-account');
    }
}
