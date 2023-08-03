@extends('dashboard.MUA.layouts.main', [
    'title' => 'Overview',
    'active' => 'Overview',
])

@section('content')
<section class="p-3">
    <header>
      <h3>Overview</h3>
      <p>Manage data for growth</p>
    </header>
    <div class="information d-flex flex-column gap-5">
      <div class="row px-1 mb-2 gap-5">
        <div class="col-xl-4 col-12 card debit">
          <img src="{{ asset('assets/images/MUA/ic_card.svg') }}" alt="Debit" width="54px" />
          <p class="number">•••• &nbsp;&nbsp; 2208 &nbsp;&nbsp; 1996</p>
          <div>
            <p class="fw-semibold m-0">{{ Auth::user()->role_name . " " . Auth::user()->class }}</p>
            <p class="fw-light m-0">20/24</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card balance">
          <p>Total Registrants</p>
          <h2>{{ $totalMentees }}</h2>
          <div>
            <p class="m-0 fw-bold">{{ $totalMentees/200 * 100 }}%</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 donut-chart m-lg-0 p-2" style="border-radius: 20px; width: 400px;">
          <div>
            <canvas id="chart-overview" style="height: 226px; width: 110%">
            </canvas>
          </div>
        </div>
      </div>
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-6 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Registrants Per Days In A Week</h5>
          <div>
            <canvas id="chart-revenue" width="100%"></canvas>
          </div>
        </div>
        <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
          <h5>Latest Transactions</h5>
          <div class="d-flex flex-column gap-4">
            <div class="d-flex flex-row gap-3">
              <div class="icon-history">
                <i class='bx bxs-heart' style="font-size: 2rem; color: #e10180;"></i>
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="m-0 title">Most Registered</p>
                  <p class="m-0 date">{{ $mostRegistered->class_name }}</p>
                </div>
                <p class="m-0 outcome">{{ $totalMostRegistered }}</p>
              </div>
            </div>
            <div class="d-flex flex-row gap-3">
              <div class="icon-history">
                <img
                  src="{{ asset('assets/images/MUA/ic_receive_act.svg') }}"
                  width="32"
                  height="32"
                />
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="m-0 title">Most Registerd on First Choice</p>
                  <p class="m-0 date">{{ $mostRegisteredOnFirstClass }}</p>
                </div>
                <p class="m-0 income">{{ $countMostRegisteredOnFirstClass }}</p>
              </div>
            </div>
            <div class="d-flex flex-row gap-3">
              <div class="icon-history">
                <img
                  src="{{ asset('assets/images/MUA/ic_send_act.svg') }}"
                  width="32"
                  height="32"
                />
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="title m-0">Most Registered on Second Choice</p>
                  <p class="date m-0">{{ $mostRegisteredOnSecondClass }}</p>
                </div>
                <p class="income m-0">{{ $countMostRegisteredOnSecondClass }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--<div class="col-xl-6 col-12 p-0 transaction">-->
      <!--  <h5>MUA Vol.9 Classes</h5>-->
      <!--  <div class="grid grid-cols-3 gap-4 w-[65rem]">-->
      <!--    @foreach($classes as $class)-->
      <!--    <div class="d-flex flex-row gap-2" style="display: flex; flex-direction: row; align-items: center;">-->
      <!--        <div class="icon-history w-8 h-8">-->
      <!--          <img-->
      <!--            src="{{ asset("storage/$class->logo") }}"-->
      <!--            width="32"-->
      <!--            height="32"-->
      <!--          />-->
      <!--        </div>-->
      <!--        <div class="trans-history flex-fill">-->
      <!--          <div>-->
      <!--            <p class="m-0 title">{{ $class->class_name }}</p>-->
      <!--            <p class="date no-underline">1️⃣: {{ $class->menteeOnFirstClass->count() }} | 2️⃣: {{ $class->menteeOnSecondClass->count() }}</p>-->
      <!--            <a href="/MUAVol9/dashboard/mentees/export/{{ uniqid() }}/{{ $class->classID }}" class="date no-underline" style="margin-top: -1.5rem;">Download Excel</a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    @endforeach-->
      <!--  </div>-->
      <!--</div>-->
    </div>
    
    
</section>
@endsection