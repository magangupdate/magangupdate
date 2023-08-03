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
          src="https://i.postimg.cc/x1r1HHWB/logo-mua.png"
          alt="Logo"
          width="250px"
          height="100%"
        />
      </div>
      <div class="pt-2 d-flex flex-column gap-5 -mt-5">
        <div class="menu p-0">
          <p>Daily Use</p>
          <a href="{{ route('dashboard.mua.index') }}" class="item-menu @if($active == 'Overview') active @endif">
            <i class='bx bxs-dashboard'></i>
            Overview
          </a>
          @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'Manager')
            <a href="{{ route('dashboard.mua.classes') }}" class="item-menu @if($active == 'Classes') active @endif">
              <i class='bx bx-book-open'></i>
              Classes
            </a>
          @endif
          <a href="{{ route('dashboard.mua.mentees') }}" class="item-menu @if($active == 'Mentees') active @endif">
            <i class='bx bxs-graduation' ></i>
            Mentees
          </a>
          @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'Manager')
          <a href="{{ route('dashboard.mua.mentors') }}" class="item-menu @if($active == 'Mentors') active @endif">
            <i class='bx bxs-hand' ></i>
            Mentors
          </a>
          @endif
        </a>
        @if(Auth::user()->role_name === 'Super Admin')
          <a href="{{ route('dashboard.mua.accounts') }}" class="item-menu @if($active == 'Accounts') active @endif">
            <i class='bx bx-user' ></i>
            Accounts
          </a>
        @endif
        </div>
        @if(Auth::user()->role_name === 'Super Admin')
        <div class="menu p-0">
          <p>MagangUpdate Academy</p>
          <a href="{{ route('dashboard.mua.index') }}" class="item-menu @if($active == 'Database') active @endif">
            <i class='bx bxs-data'></i>
            Database MUA
          </a>
        </div>
        @endif
        <div class="menu">
          <p>Others</p>
          @if(Auth::user()->role_name === 'Super Admin')
            <a href="{{ route('dashboard.mua.classes') }}" class="item-menu @if($active == 'Contents') active @endif">
              <i class='bx bx-desktop' ></i>
              Contents
            </a>
            <a href="https://analytics.google.com/analytics/web/#/p379014102/reports/reportinghub?params=_u..nav%3Dmaui" class="item-menu @if($active == 'Traffics') active @endif">
              <i class='bx bx-bar-chart'></i>
              Traffics
            </a>
          @endif
          <a href="{{ route('dashboard.mua.logout') }}" class="item-menu">
            <i class='bx bx-log-out' ></i>
            Logout
          </a>
        </div>
      </div>
    </nav>