<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
    <a href="/" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/favicon/favicon.ico') }}" alt="PSA Logo" width="30" height="30" class="d-inline-block align-text-top">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">PSA EXPLORER</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item mb-3 {{ request()->routeIs('mem-*') ? 'active open' : '' }}">
            <a href="{{ route('mem-search') }}" class="menu-link">
            {{-- <i class="menu-icon tf-icons bx bx-collection"></i> --}}
            <i class='menu-icon tf-icons bx bx-user'></i> 
            <div data-i18n="Basic">Membership</div>
            </a>
        </li>

        {{-- CME SECTION --}}
        <li class="menu-item mb-3">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Misc">CME Program Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Basic">CME Program File</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-under-maintenance.html" class="menu-link">
                        <div data-i18n="Basic">CME Program Registration</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-under-maintenance.html" class="menu-link">
                        <div data-i18n="Basic">CME Certification</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- PAYMENT SECTION --}}
        <li class="menu-item mb-3 {{ request()->routeIs(patterns: 'payments-*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-wallet"></i>
                <div data-i18n="Misc">Payments</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Basic">New Payment</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('payments-browse') ? 'active' : '' }}">
                    <a href="{{ route('payments-browse') }}" class="menu-link">
                        <div data-i18n="Basic">Browse Payment Details</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- REPORTS SECTION --}}
        <li class="menu-item mb-3 {{ request()->routeIs('reports-*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-archive"></i>
                <div data-i18n="Misc">Reports</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Basic">Tellers Report</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('reports-cme') ? 'active' : '' }}">
                    <a href="{{ route('reports-cme') }}" class="menu-link">
                        <div data-i18n="Basic">CME Report</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-under-maintenance.html" class="menu-link">
                        <div data-i18n="Basic">Members Report</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">PSA USER: <strong>{{ Auth::user()->username }}</strong></span>
        </li>
        <li class="menu-item">
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" class="menu-link">
                {{-- <i class="menu-icon tf-icons bx bx-collection"></i> --}}
                <i class='menu-icon tf-icons bx bx-x'></i> 
                <div data-i18n="Basic">Logout</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</aside>