<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3 mb-0">
            <span class="text-muted fw-light">
                {{ $member->member_id_no }} - {{ $member->psa_mem_type}} /
            </span>
            {{ $member->mem_last_name }},
            {{ $member->mem_first_name }}
            {{ $member->mem_middle_name }}
        </h4>

        <h4 class="">
            {{ $member->psa_mem_stat}} / <strong>{{ $member->mem_stat}}</strong> / {{ $member->psa_chapter_code }}
        </h4>
    </div>


    <div class="row">
        <div class="col-md-12">
            {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" ><i class="bx bx-coin me-1"></i> Ledger </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" ><i class="bx bx-history me-1"></i> CME Records</a>
                </li>
            </ul> --}}

            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-profile"
                            aria-controls="navs-pills-justified-profile"
                            aria-selected="true"
                        >
                            <i class="tf-icons bx bx-user"></i> Profile
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-ledger"
                            aria-controls="navs-pills-justified-ledger"
                            aria-selected="false"
                        >
                            <i class="tf-icons bx bx-coin me-1"></i> Ledger
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-cme_records"
                            aria-controls="navs-pills-justified-cme_records"
                            aria-selected="false"
                        >
                            <i class="tf-icons bx bx-history me-1"></i> CME Records
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active"
                        id="navs-pills-justified-profile"
                        role="tabpanel">

                        <div class="">

                            <!-- HEADER -->
                            <div class="card-header bg-white border-bottom">

                                <div>
                                    {{-- <h5 class="mb-0 text-primary">
                                        {{ $member->member_id_no }} - {{ $member->psa_mem_type }} /
                                        {{ $member->mem_last_name }}, {{ $member->mem_first_name }} {{ $member->mem_middle_name }}
                                    </h5> --}}

                                    <small class="text-muted">
                                        {{ $isEditing ? 'Editing Mode Enabled' : 'View Mode' }}
                                    </small>
                                </div>

                            </div>

                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success py-2">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form wire:submit.prevent="save">

                                    <!-- TOP INFO -->
                                    <div class="d-flex align-items-start gap-4 mb-4">

                                        <img src="{{ route('member.photo', $member->member_id_no) }}"
                                            class="img-thumbnail rounded"
                                            width="150"
                                            height="150">

                                        <div class="row w-100 g-3">

                                            <div class="col-md-4">
                                                <label class="form-label text-muted">PSA ID</label>
                                                <input class="form-control input-soft"
                                                    value="{{ $member->member_id_no }}"
                                                    disabled>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label text-muted">Chapter</label>
                                                <input class="form-control input-soft"
                                                    value="{{ $member->psa_chapter_code }} - {{ $member->psa_chapter_desc }}"
                                                    disabled>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label text-muted">Membership Type</label>
                                                <input class="form-control input-soft"
                                                    value="{{ $member->psa_mem_type }} - {{ $member->Memtype }}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control input-soft"
                                                    wire:model="first_name"
                                                    @disabled(!$isEditing)>
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control input-soft"
                                                    wire:model="last_name"
                                                    @disabled(!$isEditing)>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">Middle Name</label>
                                                <input class="form-control input-soft"
                                                    wire:model="middle_name"
                                                    @disabled(!$isEditing)>
                                            </div>

                                        </div>
                                    </div>

                                    <hr>

                                    <!-- PERSONAL -->
                                    <h6 class="text-primary mb-3">Personal Information</h6>

                                    <div class="row g-3">
                                        {{-- <div class="col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control input-soft"
                                                wire:model="first_name"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control input-soft"
                                                wire:model="last_name"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Middle Name</label>
                                            <input class="form-control input-soft"
                                                wire:model="middle_name"
                                                @disabled(!$isEditing)>
                                        </div> --}}

                                        <div class="col-md-3">
                                            <label class="form-label">Birthday</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_birth_date }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Gender</label>
                                            <input class="form-control input-soft"
                                                wire:model="gender"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Civil Status</label>
                                            <input class="form-control input-soft"
                                                wire:model="civil_status"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Religion</label>
                                            <input class="form-control input-soft"
                                                wire:model="religion"
                                                @disabled(!$isEditing)>
                                        </div>

                                    </div>

                                    <hr class="my-4">

                                    <!-- CONTACT -->
                                    <h6 class="text-info mb-3">Contact Information</h6>

                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input class="form-control input-soft"
                                                wire:model="email"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control input-soft"
                                                wire:model="phone1"
                                                @disabled(!$isEditing)>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control input-soft"
                                                    rows="3"
                                                    wire:model="address"
                                                    @disabled(!$isEditing)></textarea>
                                        </div>

                                    </div>

                                    <hr class="my-4">

                                    <!-- PROFESSIONAL -->
                                    <h6 class="text-success mb-3">Professional Details</h6>

                                    <div class="row g-3">

                                        <div class="col-md-4">
                                            <label class="form-label">PRC No.</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_prc_no }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">PMA ID No.</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_pma_id_no }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">PHIC No.</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_phic_no }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Fellow No.</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_fellow_no }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Conferral Year</label>
                                            <input class="form-control input-soft"
                                                value="{{ $member->mem_fellow_yr }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Spouse</label>
                                            <input class="form-control input-soft"
                                                wire:model="spouse_name"
                                                @disabled(!$isEditing)>
                                        </div>

                                    </div>

                                    <!-- BOTTOM ACTION BAR -->
                                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">

                                        <small class="text-muted">
                                            {{ $isEditing ? 'Editing mode active' : 'Click edit to modify profile' }}
                                        </small>

                                        <div class="d-flex gap-2">

                                            <button type="button"
                                                    class="btn btn-outline-dark"
                                                    wire:click="openPurposeModal">
                                                Print COGS
                                            </button>

                                            @if(!$isEditing)
                                                <button type="button"
                                                        class="btn btn-primary"
                                                        wire:click="enableEdit">
                                                    Edit Profile
                                                </button>
                                            @endif

                                            @if($isEditing)
                                                <button type="button"
                                                        class="btn btn-outline-secondary"
                                                        wire:click="cancelEdit">
                                                    Cancel
                                                </button>

                                                <button type="submit"
                                                        class="btn btn-success">
                                                    Save Changes
                                                </button>
                                            @endif

                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <h5 class="card-header">Delete Account</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                                </div>
                            </div>
                            <form id="formAccountDeactivation" onsubmit="return false">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" disabled />
                                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                                </div>
                                <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="tab-pane fade" id="navs-pills-justified-ledger" role="tabpanel">
                        @livewire('membership.ledger', ['member' => $member], key('ledger-'.$member->member_id_no))
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-cme_records" role="tabpanel">
                       <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fiscal Year</th>
                                        <th>Program Code</th>
                                        <th>Registratiton Date</th>
                                        <th>Registration Type</th>
                                        <th>Payment Reference No.</th>
                                        <th>Units</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($cme_activities as $item)
                                        <tr>
                                            <td>{{ $item->cme_year }}</td>
                                            <td>{{ $item->cme_program_code }}</td>
                                            <td>{{ $item->cme_reg_date }}</td>
                                            <td>{{ $item->cme_reg_type }}</td>
                                            <td><strong>{{ $item->payment_ref_no }}</strong></td>
                                            <td><strong>{{ $item->cme_units }}</strong></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            {{-- <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" disabled />
                            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="purposeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">

            <form wire:submit.prevent="savePurpose" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Certificate of Good Standing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <label class="form-label">Purpose</label>

                    <select class="form-select" wire:model="purpose">
                        <option value="">-- Select Purpose --</option>
                        <option>PBA Written Exam</option>
                        <option>PBA Oral Exam</option>
                        <option>Philhealth Purposes</option>
                        <option>Philhealth Renewal</option>
                        <option>Philhealth Accreditation Renewal</option>
                        <option>Whatever purpose it may serve her best</option>
                        <option>Whatever purpose it may serve him best</option>
                    </select>

                    @error('purpose')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Generate
                    </button>
                </div>

            </form>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modalEl = document.getElementById('purposeModal');
            const modal = new bootstrap.Modal(modalEl);

            window.addEventListener('show-purpose-modal', () => {
                modal.show();
            });

            window.addEventListener('hide-purpose-modal', () => {
                modal.hide();
            });

        });
    </script>
</div>
