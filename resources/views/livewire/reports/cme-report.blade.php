<div class="card mx-4 my-3">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    {{-- <h3>CME Reports Component</h3> --}}

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Fiscal Year</th>
                    <th>CME Code & Type</th>
                    <th>Title & Topic</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($cme_records as $item)
                    <tr wire:click="modalView('{{ $item->cme_program_code }}')" data-bs-toggle="modal" data-bs-target="#largeModal" style="cursor: pointer;">

                        <td>{{ $item->cme_year }}</td>
                        <td><strong>{{ $item->cme_program_code }}</strong> <br> {{ $item->cme_program_type }}</td>
                        <td><strong>{{ $item->cme_title }}:</strong> <br> {{ $item->cme_topic }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>  
    <!-- Pagination links -->
    <div class="flex justify-content-center my-2 mx-5">
        {{ $cme_records->links() }}
    </div>

    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3"><strong>CME PROGRAM DETAILS</strong></h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2 mb-4">
                            <label>Fiscal Year</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_year }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>CME Code</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_program_code }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>CME Type</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_program_type }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>Title</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_title }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>Topic</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_topic }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>Venue</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_venue }}"
                                readonly
                            />
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>CME Chair</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_chair }}"
                                readonly
                            />
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>CME Incumbent President</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_incumbent_prez }}"
                                readonly
                            />
                        </div>


                        <div class="col-md-3 mb-4">
                            <label>Start Date</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_startdate }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>End Date</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $modal_cme->cme_enddate }}"
                                readonly
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                    Close
                    </button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        window.addEventListener('show-modal', event => {
            // Using Bootstrap 5 modal
            let myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    </script> --}}
</div>
