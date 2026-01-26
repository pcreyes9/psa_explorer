<div class="card mx-4 my-3">
    <nav class="navbar navbar-light bg-light mb-5">
        <div class="d-flex flex-row align-items-center gap-2 mx-3">
            <label class="navbar-brand">Search By</label>
            <div>
                <select class="form-select" wire:model.live="searchType">
                    <option selected>OR No.</option>
                    <option>Reference No.</option>
                    <option>PSA ID No.</option>
                    <option>Last Name</option>
                </select>
            </div>
            <div class="d-flex">
                <input wire:model.live="search" wire:keydown.enter="searchRecords" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" onfocus="this.select()" />
                <button wire:click="searchRecords" class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </div>
    </nav>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>PSA No.</th>
                <th>Name</th>
                <th>Reference No.</th>
                <th>OR No.</th>
                <th>Payment Date</th>
                <th>Payment Type</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($records as $item)
                <tr wire:click="modalView('{{ $item->payment_ref_no }}')" data-bs-toggle="modal" data-bs-target="#largeModal" style="cursor: pointer;">

                    <td>{{ $item->member_id_no }}</td>
                    <td><strong>{{ $item->mem_last_name }}, {{ $item->mem_first_name }} {{ $item->mem_middle_name }}</strong> <br> {{ $item->psa_mem_type }}</td>
                    <td>{{ $item->payment_ref_no }}</td>
                    <td>{{ $item->or_no }}</td>
                    <td>{{ $item->payment_date }}</td>
                    <td>{{ $item->payment_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between w-100 fw-bold">
                        <div>
                            <h5><strong>{{ $modalMember->member_id_no }}</strong> / {{ $modalMember->mem_last_name }}, {{ $modalMember->mem_first_name }} {{ $modalMember->mem_middle_name }}</h5>
                        </div>
                        <div class="text-end">
                           <div>{{ $modalMember->psa_mem_type }}</div>
                           <div>{{ $modalMember->payment_date }}</div>
                           <div>{{ $modalMember->payment_ref_no }}</div>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Fiscal Year</th>
                                    <th>Transaction Code</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tfoot clas>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Gross Total</strong></td>
                                    <td><strong>{{ number_format($modalMember->payment_gross_amt, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Discount</strong></td>
                                    <td><strong>{{ number_format($modalMember->payment_discounted_amt, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Net Total</strong></td>
                                    <td><strong>{{ number_format($modalMember->payment_total_amt, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                            <tbody class="table-border-bottom-0">
                                @foreach ($modalRecords as $item)
                                    <tr>

                                        <td>{{ $item->fiscal_year }}</td>
                                        <td>{{ $item->tran_code }}</td>
                                        <td>{{ $item->item_code }}</td>
                                        <td>-</td>
                                        <td><strong>{{ number_format($item->amount_due, 2) }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
