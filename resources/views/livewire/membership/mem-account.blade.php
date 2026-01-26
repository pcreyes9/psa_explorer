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
                    <div class="tab-pane fade show active" id="navs-pills-justified-profile" role="tabpanel">
                        <!-- Account -->
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                {{-- <img
                                    src="{{ asset('assets/img/avatars/1.png') }}"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="100"
                                    width="100"
                                    id="uploadedAvatar"
                                /> --}}

                                <img 
                                    src="{{ route('member.photo', $member->member_id_no) }}"
                                    class="img-thumbnail"
                                    height="150"
                                    width="150"
                                    alt="Member Photo"
                                >

                                {{-- <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" disabled />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" disabled>
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div> --}}
                                 <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="psa_id" class="form-label">PSA ID</label>
                                        <input class="form-control" type="text" id="psa_id" name="psa_id" value="{{ $member->member_id_no }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="psa_chapter" class="form-label">PSA Chapter</label>
                                        <input class="form-control" type="text" name="psa_chapter" id="psa_chapter" value="{{ $member->psa_chapter_code }}-{{ $member->psa_chapter_desc }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="mem_type" class="form-label">Membership Type</label>
                                        <input class="form-control" type="text" id="mem_type" name="mem_type" value="{{ $member->psa_mem_type }}-{{ $member->Memtype }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0" />

                        <div class="card-body">
                            <form id="formAccountSettings" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input class="form-control" type="text" id="firstName" name="firstName" value="{{ $member->mem_first_name }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $member->mem_last_name }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_email_address }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            {{-- <span class="input-group-text">US (+1)</span> --}}
                                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111" value="{{ $member->mem_mobile_no1 }}, {{ $member->mem_mobile_no2 }}" readonly />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea 
                                            class="form-control" 
                                            id="address" 
                                            name="address" 
                                            rows="3" 
                                            readonly
                                        >{{ $member->mem_home_address }}</textarea>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">Gender</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_gender }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">Religion</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_religion }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">Civil Status</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_civil_status }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Name of Spouse (if married)</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->spouse_name }}" readonly />
                                    </div>


                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">PRC No.</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_prc_no }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">PMA ID No.</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_pma_id_no }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">PHIC No.</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_phic_no }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">Fellow No.</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_fellow_no }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="email" class="form-label">Conferral Year</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $member->mem_fellow_yr}}" readonly />
                                    </div>
                                    
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2" disabled>Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary" disabled>Cancel</button>
                                </div>
                            </form>
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
</div>
