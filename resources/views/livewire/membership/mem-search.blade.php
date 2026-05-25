<div>
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar"
        >
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                        type="text"
                        wire:model="search"
                        wire:keydown.enter="searchMembers"
                        class="form-control border-0 shadow-none"
                        placeholder="Enter last name or PSA ID #"
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
                            <tr wire:click='sendID("{{ $member->member_id_no }}")' style="cursor: pointer;">
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
            {{-- {{ $members->links() }} --}}
        </div>
    @else
        <div class="card mx-4 my-3">
            <p class="card-header">Please enter at least 2 characters to search.</p>
        </div>
    @endif
</div