@extends('dashboard.MUA.layouts.main', [
    'title' => 'Accounts',
    'active' => 'Accounts'
])

@section('content')
<section class="p-3">
    <header>
      <h3>Accounts</h3>
      <p>Manage your article and see it growth</p>
    </header>
    <div class="information d-flex flex-column gap-5">
      <div class="row px-1 mb-2 gap-5">
        <div class="col-xl-4 col-12 card debit">
          <img src="{{ asset('assets/images/MUA/ic_card.svg') }}" alt="Debit" width="54px" />
          <p class="number">•••• &nbsp;&nbsp; 2208 &nbsp;&nbsp; 1996</p>
          <div>
            <p class="fw-semibold m-0">Shayna Qowy</p>
            <p class="fw-light m-0">20/24</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card balance">
          <p>Total Users </p>
          <h2>{{ $accounts->count() }}</h2>
          <div>
            <p class="m-0 fw-bold">+22%</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card donut-chart m-lg-0 p-2">
          <div>
            <canvas id="chart-budget" style="height: 226px; width: 100%">
            </canvas>
          </div>
        </div>
      </div>
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-6 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Revenue Past 6 Months</h5>
          <div>
            <canvas id="chart-revenue" width="100%"></canvas>
          </div>
        </div>
        <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
          <h5>Latest Transactions</h5>
          <div class="d-flex flex-column gap-4">
            <div class="d-flex flex-row gap-3">
              <div class="icon-history">
                <img
                  src="{{ asset('assets/images/MUA/ic_spotify.svg') }}"
                  width="32"
                  height="32"
                />
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="m-0 title">Spotify</p>
                  <p class="m-0 date">12 Jan</p>
                </div>
                <p class="m-0 outcome">- $20,000</p>
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
                  <p class="m-0 title">Top Up BCA</p>
                  <p class="m-0 date">12 Jan</p>
                </div>
                <p class="m-0 income">+ $120,000</p>
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
                  <p class="title m-0">Send to @anggapro</p>
                  <p class="date m-0">12 Jan</p>
                </div>
                <p class="outcome m-0">- $6,000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if(Auth::user()->role_name === 'Super Admin')
      <div class="row px-1 d-flex justify-content-between add-button">
        <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
          <a href="" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: fit-content; cursor: pointer">
            <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;">+</p>
          </a>
        </div>
      </div>
      @endif
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Tracking and modifying your article</h5>
          <div>
            <table id="example" class="table" style="width:100%">
    <thead>
        <tr class="text-center">
            <th></th>
            <th>User ID</th>
            <th>Role</th>
            <th>Username</th>
            <th>Email</th>
            <th>PIC Class</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $account)
            <tr class="p-5 text-left">
                <td></td>
                <td>{{ $account->id }}</td>
                <td>{{ $account->role_name }}</td>
                <td>{{ $account->username }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->class }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#infoModal-{{ $account->id }}"><i class='bx bx-pencil'></i></button>&nbsp;
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $account->id }}"><i class='bx bx-trash-alt'></i></button>&nbsp;
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal-{{ $account->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Testimonial Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal-{{ $account->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('dashboard.mua.accounts.destroy') }}" class="needs-validation" method="POST" novalidate>
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <input type="hidden" name="id" class="form-control" value="{{ $account->id }}" id="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="text-center">
            <th></th>
            <th>User ID</th>
            <th>Role</th>
            <th>Username</th>
            <th>Email</th>
            <th>PIC Class</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection