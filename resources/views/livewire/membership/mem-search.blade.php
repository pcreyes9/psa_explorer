<div>
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar"
        >
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                    type="text"
                    wire:model.live="search"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                    />
                </div>
            </div>
        </div>
    </nav>
    @if ($search)
        <div class="card mx-4 my-3">
            <h5 class="card-header">Search results for: {{ $search }}</h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PSA ID NO.</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middle Initial</th>
                            <th>PRC NO.</th>
                            <th>PSA Chapter</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @foreach ($members as $member)
                            <tr wire:click='sendID("{{ $member->member_id_no }}")'>
                                <td>{{ $member->member_id_no }}</td>
                                <td>{{ $member->mem_last_name }}</td>
                                <td>{{ $member->mem_first_name }}</td>
                                <td>{{ $member->mem_middle_name }}</td>
                                <td>{{ $member->mem_prc_no }}</td>
                                <td>{{ $member->psa_chapter_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div