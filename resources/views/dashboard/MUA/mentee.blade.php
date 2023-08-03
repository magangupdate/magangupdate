@extends('dashboard.MUA.layouts.main', [
    'title' => 'Mentees',
    'active' => 'Mentees'
])

@section('content')
<section class="p-3">
    <header>
      <h3>Mentees</h3>
      <p>Manage your article and see it growth</p>
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
          <p>Total Registrants </p>
          <h2>{{ $totalMentees }}</h2>
          <div>
            <p class="m-0 fw-bold">{{ $totalMentees / 200 * 100 }}%</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 donut-chart m-lg-0 p-2" style="border-radius: 20px; width: 400px;">
          <div>
            <canvas id="chart-overview" style="height: 226px; width: 110%">
            </canvas>
          </div>
        </div>
      </div>
      @if(Auth::user()->role === 'Super Admin')
      <div class="row px-1 d-flex justify-content-between add-button">
        <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
          <a href="" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: fit-content; cursor: pointer">
            <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;">+</p>
          </a>
        </div>
      </div>
      @endif

      <div class="col-xl-6 col-12 p-0 transaction">
        <h5>MUA Vol.9 Classes</h5>
        <div class="grid grid-cols-3 gap-4 w-[65rem]">
          @foreach($classes as $class)
          <div class="d-flex flex-row gap-3">
              <div class="icon-history w-8 h-8">
                <img
                  src="{{ asset("storage/$class->logo") }}"
                  width="32"
                  height="32"
                />
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="m-0 title">{{ $class->class_name }}</p>
                  @if(Auth::user()->class === $class->class_name)
                  <a href="/MUAVol9/dashboard/mentees/class/{{ uniqid() }}/{{ $class->class_slug }}" class="m-0 date no-underline">Registrants →</a>
                  @else
                    
                        <a href="/MUAVol9/dashboard/mentees/class/{{ uniqid() }}/{{ $class->class_slug }}" class="m-0 date no-underline">Registrants →</a>
                    
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      
      @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'Manager')
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Tracking and find all registrants</h5>
          <div>
            <table id="example" class="table text-center" style="width:100%">
    <thead>
        <tr class="text-center">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mentees as $mentee)
            <tr class="p-5 text-left">
                <td></td>
                <!--<td>{{ $mentee->menteeID }}</td>-->
                <td>{{ $mentee->full_name }}</td>
                <td style="text-align: center;">
                    {{ $mentee->total_score ?? 0 }}
                </td>
                <td>{{ $mentee->email }}</td>
                <td>{{ $mentee->university }}</td>
                <td>{{ $mentee->major }}</td>
                <td>{{ $mentee->firstClass->class_name }}</td>
                <td>{{ $mentee->secondClass->class_name }}</td>
                <td><a href="https://wa.me/{{ $mentee->whatsapp_number }}">+{{ $mentee->whatsapp_number }}</a></td>
                <td><a href="https://instagram.com/{{ $mentee->instagram }}">{{ $mentee->instagram }}</a></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="text-center">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
@endsection