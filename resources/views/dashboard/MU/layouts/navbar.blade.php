<nav
      class="sidebar offcanvas-md offcanvas-start"
      data-bs-scroll="true"
      data-bs-backdrop="false"
    >
      <div class="d-flex justify-content-end m-3 d-block d-md-none">
        <button
          aria-label="Close"
          data-bs-dismiss="offcanvas"
          data-bs-target=".sidebar"
          class="btn p-0 border-0 fs-4"
        >
          <i class="fas fa-close"></i>
        </button>
      </div>
      <div class="d-flex justify-content-center mt-md-5 mb-5">
        <img
          src="{{ asset('assets/images/logos/logo-full.webp') }}"
          alt="Logo"
          width="210px"
          height="100%"
        />
      </div>
      <div class="pt-2 d-flex flex-column gap-5 -mt-5">
        <div class="menu p-0">
          <p>Daily Use</p>
          {{-- @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'Manager') --}}
            <a href="{{ route('dashboard.mu.articles') }}" class="item-menu @if($active == 'Articles') active @endif">
              <i class='bx bx-book-open'></i>
              Articles
            </a>
          {{-- @endif --}}
          <a href="{{ route('dashboard.mu.jobs') }}" class="item-menu @if($active == 'Jobs') active @endif">
            <i class='bx bxs-graduation' ></i>
            Jobs
          </a>
        </a>
        </div>
        <div class="menu" style="margin-top: -1rem;">
          <p>Others</p>
          {{-- @if(Auth::user()->role_name === 'Super Admin') --}}
            <a href="https://analytics.google.com/analytics/web/#/p377446475/reports/reportinghub?params=_u..nav%3Dmaui" class="item-menu @if($active == 'Traffics') active @endif">
              <i class='bx bx-bar-chart'></i>
              Traffics
            </a>
          {{-- @endif --}}
          <a href="{{ route('dashboard.mua.logout') }}" class="item-menu">
            <i class='bx bx-log-out' ></i>
            Logout
          </a>
        </div>
      </div>
    </nav>