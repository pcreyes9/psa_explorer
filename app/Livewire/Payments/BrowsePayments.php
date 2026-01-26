<?php

namespace App\Livewire\Payments;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BrowsePayments extends Component
{
    public $searchType = 'OR No.', $search = '-', $records = [], $modalRecords = [], $modalMember = [];
    public $dbType, $dbSearch;

    public function mount()
    {
        $this->modalMember = DB::table('members as m')
        ->join('payments as p', function ($join) {
            $join->on(
                DB::raw('p.member_id_no COLLATE Latin1_General_CI_AS'),
                '=',
                DB::raw('m.member_id_no COLLATE Latin1_General_CI_AS')
            );
        })
        ->where('p.payment_ref_no', 'C150000025')
        ->select(
            'm.member_id_no',
            'm.mem_last_name',
            'm.mem_first_name',
            'm.mem_middle_name',
            'm.psa_mem_type',
            'p.payment_ref_no',
            'p.payment_date',
            'p.payment_total_amt',
            'p.payment_gross_amt',
            'p.payment_discounted_amt',
        )
        ->first();
    }
    public function searchRecords()
    {
        if ($this->searchType == 'OR No.') {
            $this->dbType = 'p.or_no';
        } elseif ($this->searchType == 'Reference No.') {
            $this->dbType = 'p.payment_ref_no';
        } elseif ($this->searchType == 'PSA ID No.') {
            $this->dbType = 'p.member_id_no';
        } elseif ($this->searchType == 'Last Name') {
            $this->dbType = 'm.mem_last_name';
        }
        
        $this->records = DB::table('payments as p')
        ->select(
            'p.payment_ref_no',
            'p.or_no',
            'p.payment_date',
            'p.payment_total_amt',
            'p.payment_gross_amt',
            'p.payment_discounted_amt',
            'p.payment_type',

            'm.member_id_no',
            'm.mem_last_name',
            'm.mem_first_name',
            'm.mem_middle_name',
            'm.psa_mem_type',


        )
        ->leftJoin('members as m', function ($join) {
            $join->on(
                DB::raw('p.member_id_no COLLATE Latin1_General_CI_AS'),
                '=',
                DB::raw('m.member_id_no COLLATE Latin1_General_CI_AS')
            );
        })
        ->where($this->dbType, $this->search)
        ->orderBy('p.payment_date', 'desc')
        ->get();
    }

    public function modalView($paymentRefNo)
    {

        $this->modalMember = DB::table('members as m')
        ->join('payments as p', function ($join) {
            $join->on(
                DB::raw('p.member_id_no COLLATE Latin1_General_CI_AS'),
                '=',
                DB::raw('m.member_id_no COLLATE Latin1_General_CI_AS')
            );
        })
        ->where('p.payment_ref_no', $paymentRefNo)
        ->select(
            'm.member_id_no',
            'm.mem_last_name',
            'm.mem_first_name',
            'm.mem_middle_name',
            'm.psa_mem_type',
            'p.payment_ref_no',
            'p.payment_date',
            'p.payment_total_amt',
            'p.payment_gross_amt',
            'p.payment_discounted_amt',
        )
        ->first();
        // dd($this->modalMember);

        $this->modalRecords = DB::table('payments as p')
        ->select(
            'p.payment_ref_no',
            'p.or_no',
            'p.payment_date',
            'p.payment_total_amt',
            'p.payment_gross_amt',
            'p.payment_discounted_amt',

            'pi.item_code',
            'pi.tran_code',
            'pi.fiscal_year',
            'pi.amount_due'
        )
        ->join('payment_items as pi', function ($join) {
            $join->on(
                DB::raw('p.payment_ref_no COLLATE Latin1_General_CI_AS'),
                '=',
                DB::raw('pi.payment_ref_no COLLATE Latin1_General_CI_AS')
            );
        })

        ->where('p.payment_ref_no', $paymentRefNo)
        ->orderBy('p.or_no')
        ->orderByDesc('p.payment_date')
        ->orderBy('p.payment_ref_no')
        ->get();
        // dd($this->modalRecords);

    }
    public function render()
    {
        
        
        // dd($this->records);
        return view('livewire.payments.browse-payments');
    }
}
