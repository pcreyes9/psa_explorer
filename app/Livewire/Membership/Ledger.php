<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Ledger extends Component
{
    public $mem, $ledger, $totalBalance = 0, $modal_dues = [], $modalBalance = 0, $payment_histo = [], $archive_histo = [];

    public array $memberData = [];

    public function mount($member)
    {
        // Convert to array and strip binary data to prevent the JSON crash
        $data = (array) $member;
        unset($data['mem_pic']); 
        
        $this->memberData = $data;
        
    }
    public function modalDues ($fiscalYear){
        $this->modal_dues = DB::table('transaction_type_item')
            // ->where('member_id_no', $modalID)
            ->where('fiscal_year', $fiscalYear)
            ->where('charge_code', $this->memberData['psa_mem_type'])
            ->where('tran_code', 'MEMF')
            ->where( 'stat', 1)
            ->get();
        // dd($this->modal_dues);
        $this->modalBalance = 0;


    }


    public function render()
    {
        
        $this->ledger = DB::table('member_ledger_bal')
            // ->select('fiscal_year', 'tran_desc', 'dbit', 'cbit', 'bal')
            ->where('member_id_no', $this->memberData['member_id_no'])
            ->orderBy('fiscal_year', 'desc')
            ->get();
        //  dd($this->ledger);

        $this->totalBalance = $this->ledger->sum('bal');

        $this->payment_histo = DB::table('payments')
            ->select('payment_date', 'payment_ref_no', 'payment_type', 'or_no', 'payment_total_amt', 'userid')
            ->where('member_id_no', $this->memberData['member_id_no'])
            ->orderBy('payment_date', 'desc')
            ->get();

        $this->archive_histo = DB::table('archive_histo')
            // ->select('fiscalyear', 'trancode', 'itemcode', 'description', 'amount', 'orno', 'paydate')
            ->where('psaid', $this->memberData['member_id_no'])
            ->orderBy('fiscalyear', 'desc')
            ->get();
    
        return view('livewire.membership.ledger');
    }
}
