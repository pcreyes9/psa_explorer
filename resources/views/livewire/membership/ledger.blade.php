
<div class="">
    <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <button
                    type="button"
                    class="nav-link active"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-dues"
                    aria-controls="navs-top-dues"
                    aria-selected="true"
                >
                    Member Dues
                </button>
            </li>
            <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-payHistory"
                    aria-controls="navs-top-payHistory"
                    aria-selected="false"
                >
                    Payment History
                </button>
            </li>
            <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-archiveHistory"
                    aria-controls="navs-top-archiveHistory"
                    aria-selected="false"
                >
                    Archive History
                </button>
            </li>
        </ul>
        {{-- MEMBER DUES TAB --}}
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-top-dues" role="tabpanel">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fiscal Year</th>
                                <th>Description</th>
                                <th>Charge</th>
                                <th>Credit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total Balance</strong></td>
                                <td><strong>{{ number_format($totalBalance, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                        <tbody class="table-border-bottom-0">
                            @foreach ($ledger as $item)
                                <tr wire:click="modal('{{ $item->fiscal_year }}', 'dues')" data-bs-toggle="modal"
                                    data-bs-target="#largeModal" style="cursor: pointer;">


                                    <td>{{ $item->fiscal_year }}</td>
                                    <td>{{ $item->tran_desc }}</td>
                                    <td>{{ number_format($item->dbit, 2) }}</td>
                                    <td>{{ number_format($item->cbit, 2) }}</td>
                                    <td><strong>{{ number_format($item->bal, 2) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PAYMENT HISTORY TAB --}}
            <div class="tab-pane fade" id="navs-top-payHistory" role="tabpanel">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Payment Date</th>
                                <th>Reference No.</th>
                                <th>Payment Type</th>
                                <th>OR No.</th>
                                <th>Total Amount</th>
                                <th>Cashier's ID</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($payment_histo as $item)
                                <tr wire:click="modal('{{ $item->payment_ref_no }}', 'payHisto')" data-bs-toggle="modal"
                                    data-bs-target="#largeModal" style="cursor: pointer;">
                                    <td>{{ $item->payment_date }}</td>
                                    <td>{{ $item->payment_ref_no }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>{{ $item->or_no }}</td>
                                    <td>{{ number_format($item->payment_total_amt, 2) }}</td>
                                    <td><strong>{{ $item->userid }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ARCHIVE HISTORY TAB --}}
            <div class="tab-pane fade" id="navs-top-archiveHistory" role="tabpanel">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fiscal Year</th>
                                <th>TranCode</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>OR No.</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($archive_histo as $item)
                                <tr style="cursor: pointer;">
                                    <td>{{ $item->fiscalyear }}</td>
                                    <td>{{ $item->trancode }}</td>
                                    <td>{{ $item->itemcode }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ number_format($item->amount, 2) }}</td>
                                    <td><strong>{{ $item->orno }}</strong></td>
                                    <td><strong>{{ $item->paydate }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Reference No: {{ $ref_num }}</h5>
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
                                    @foreach ($header as $heads)
                                        <th>{{ $heads }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total Debit</strong></td>
                                    <td><strong>{{ number_format($modalBalance, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total Credit</strong></td>
                                    <td><strong>{{ number_format($modalBalance, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total Balance</strong></td>
                                    <td><strong>{{ number_format($modalBalance, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                            <tbody class="table-border-bottom-0">
                                @foreach ($modal_dues as $item)
                                    <tr>
                                        @foreach ($item as $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
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
    <script>
        window.addEventListener('show-modal', event => {
            // Using Bootstrap 5 modal
            let myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    </script>

</div>

