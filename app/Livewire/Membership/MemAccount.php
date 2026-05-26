<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class MemAccount extends Component
{
    public $memberID;
    public $member;
    public $cme_activities;

    public $isEditing = false;

    // editable fields
    public $first_name, $last_name, $middle_name;
    public $email, $phone1, $phone2, $address;
    public $gender, $religion, $civil_status, $spouse_name;

    public $purpose = '';
    public $showPurposeModal = false;


    public function mount($member_id)
    {
        $this->memberID = $member_id;

        $this->member = DB::table('member as m')
            ->join('chapters as c', function ($join) {
                $join->on('m.psa_chapter_code', '=', DB::raw('c.psa_chapter_code COLLATE DATABASE_DEFAULT'));
            })
            ->join('membership_type as mt', function ($join) {
                $join->on('m.psa_mem_type', '=', DB::raw('mt.Memtypecode COLLATE DATABASE_DEFAULT'));
            })
            ->where('m.member_id_no', $this->memberID)
            ->select(
                'm.member_id_no',
                'm.mem_first_name',
                'm.mem_last_name',
                'm.mem_middle_name',
                'm.mem_email_address',
                'm.mem_mobile_no1',
                'm.mem_mobile_no2',
                'm.mem_home_address',
                'm.mem_gender',
                'm.mem_religion',
                'm.mem_civil_status',
                'm.spouse_name',
                'm.mem_birth_date',
                'm.mem_prc_no',
                'm.mem_pma_id_no',
                'm.mem_phic_no',
                'm.mem_fellow_no',
                'm.mem_fellow_yr',
                'm.member_id_no',
                'm.psa_mem_type',
                'm.psa_mem_stat',
                'm.mem_stat',
                'm.psa_chapter_code',
                'c.psa_chapter_desc',
                'mt.Memtype',

            )
            ->first();

        $this->fillForm();

        $this->cme_activities = DB::table('cme_program_registration')
            ->where('member_id_no', $this->memberID)
            ->orderBy('cme_year', 'desc')
            ->get();
    }

    private function fillForm()
    {
        $this->first_name = $this->member->mem_first_name;
        $this->last_name = $this->member->mem_last_name;
        $this->middle_name = $this->member->mem_middle_name;
        $this->email = $this->member->mem_email_address;
        $this->phone1 = $this->member->mem_mobile_no1;
        $this->phone2 = $this->member->mem_mobile_no2;
        $this->address = $this->member->mem_home_address;
        $this->gender = $this->member->mem_gender;
        $this->religion = $this->member->mem_religion;
        $this->civil_status = $this->member->mem_civil_status;
        $this->spouse_name = $this->member->spouse_name;
    }

    public function enableEdit()
    {
        $this->isEditing = true;
    }

    public function cancelEdit()
    {
        $this->fillForm();
        $this->isEditing = false;
    }

    public function save()
    {
        DB::table('member')
            ->where('member_id_no', $this->memberID)
            ->update([
                'mem_first_name' => $this->first_name,
                'mem_last_name' => $this->last_name,
                'mem_middle_name' => $this->middle_name,
                'mem_email_address' => $this->email,
                'mem_mobile_no1' => $this->phone1,
                'mem_mobile_no2' => $this->phone2,
                'mem_home_address' => $this->address,
                'mem_gender' => $this->gender,
                'mem_religion' => $this->religion,
                'mem_civil_status' => $this->civil_status,
                'spouse_name' => $this->spouse_name,
            ]);

        $this->isEditing = false;

        session()->flash('success', 'Profile updated successfully!');
    }

    public function openPurposeModal()
    {
        $this->reset('purpose');
        $this->dispatch('show-purpose-modal');
    }

    public function savePurpose()
    {
        $this->validate([
            'purpose' => 'required'
        ]);
        // dd($this->member);
        $pdf = Pdf::loadView('pdf.goodtandingPDF', [
            'info' => $this->member,
            'purpose' => $this->purpose,
            // 'mem_type' => $this->mem_type,
        ]);
        
        // Example: save or generate COGS
        session()->flash('success', 'Purpose saved: ' . $this->purpose);

        $this->dispatch('hide-purpose-modal');

        return response()->streamDownload(function () use ($pdf) { echo $pdf->stream(); }, $this->first_name . ' ' . $this->last_name . ' - Certificate of Good Standing.pdf');

    }

    public function render()
    {
        return view('livewire.membership.mem-account');
    }
}