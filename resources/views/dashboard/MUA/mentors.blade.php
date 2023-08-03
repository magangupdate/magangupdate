@extends('dashboard.MUA.layouts.main', [
    'title' => 'Mentors',
    'active' => 'Mentors'
])


@section('content')
<section class="p-3">
    <header>
      <h3>Mentors</h3>
      <p>Manage your article and see it growth</p>
    </header>
    <div class="information d-flex flex-column gap-5">
      <div class="row px-1 mb-2 gap-5">
        <div class="col-xl-4 col-12 card balance">
          <p>Total Mentors </p>
          <h2>{{ $mentors->count() }}</h2>
          <div>
            <p class="m-0 fw-bold">MUA Vol. 9</p>
          </div>
        </div>
      </div>
      {{-- @if(Auth::user()->role !== 'Manager') --}}
      <div class="row px-1 d-flex justify-content-between add-button">
        <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
          <a data-bs-toggle="modal" data-bs-target="#addMentors" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: fit-content; cursor: pointer">
            <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;">+</p>
          </a>
        </div>
      </div>
      {{-- @endif --}}
      
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Manage Mentors Data</h5>
          <div>
            <table id="example" class="table text-center" style="width:100%">
    <thead>
        <tr class="text-center">
            <th></th>
            <th>Mentor ID</th>
            <th>Full Name</th>
            <th>Job</th>
            <th>Mentor At</th>
            <th>Volume</th>
            @if(Auth::user()->role_name === 'Super Admin')
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($mentors as $mentor)
            <tr class="p-5 text-left">
                <td class="" style="width: 8rem;">
                    <img src="{{ $mentor->mentor_picture }}" alt="" class="img-testimonial object-contain" style="width: 5rem; height: 8rem; border-radius: 0;">
                </td>
                <td>{{ $mentor->id }}</td>
                <td>{{ $mentor->mentor_name }}</td>
                <td>{{ $mentor->mentor_job }}</td>
                <td>{{ $mentor->class->class_name ?? "" }}</td>
                <td>{{ $mentor->volume }}</td>
                @if(Auth::user()->role_name === 'Super Admin')
                <td class="" style="height: 100%;">
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $mentor->id }}"><i class='bx bx-trash-alt'></i></button>&nbsp;
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $mentor->id }}"><i class='bx bx-edit-alt'></i></button>
                    </div>
                </td>
                @endif
            </tr>

            <!-- Modal -->
            @if(Auth::user()->role_name === 'Super Admin')
            <div class="modal fade" id="deleteModal-{{ $mentor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Mentor Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('dashboard.mua.mentors.destroy') }}" class="needs-validation" method="post" novalidate >
                            @csrf
                            @method('DELETE')
                            <div class="modal-body mt-3">
                                <input type="hidden" name="id" class="form-control" value="{{ $mentor->id }}" id="id">
                                <p>Are you sure want delete data <b>{{ $mentor->mentor_name }}'s</b> class ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <!-- Modal -->
            @if(Auth::user()->role_name === 'Super Admin')
            <div class="modal fade" id="editModal-{{ $mentor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Class Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('dashboard.mua.mentors.update') }}" enctype="multipart/form-data" class="needs-validation" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3 has-validation">
                                    <label for="mentor_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" value="{{ $mentor->mentor_name }}" name="mentor_name" id="mentor_name" aria-describedby="mentor_name" placeholder="Fill mentor name">
                                </div>
                                <div class="mb-3 has-validation">
                                    <label for="mentor_job" class="form-label">Job</label>
                                    <input type="text" class="form-control" value="{{ $mentor->mentor_job }}" name="mentor_job" id="mentor_job" aria-describedby="mentor_job" placeholder="Fill mentor job">
                                </div>
                                <div class="mb-3 has-validation">
                                    <label for="class" class="form-label">Mentor At</label>
                                    <select name="classID" id="mentorID" class="form-control">
                                        <option value="0">Select Mentoring At</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->classID }}" {{ ($mentor->classID == $class->classID) ? 'selected' : '' }}>{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 has-validation">
                                    <label for="volume" class="form-label">Volume</label>
                                    <input type="number" class="form-control" value={{ $mentor->volume }} name="volume" id="volume" aria-describedby="volume" placeholder="Fill volume">
                                </div>
                                <label for="logo" class="form-label">Mentor's Picture</label>
                                <input type="text" class="form-control" name="mentor_picture" value="{{ $mentor->mentor_picture }}" id="class_session_1" aria-describedby="class_session_1" placeholder="Fill your jabatan">
                                <div class="mb-3">
                                    <label for="mentor_description" class="form-label">Description</label>
                                    <textarea name="mentor_description" id="createClass" placeholder="Description Mentor" class="form-control trigger" id="mentor_description" rows="3">{{ $mentor->mentor_description }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id" value="{{ $mentor->id }}">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </tbody>
    <tfoot>
        <tr class="text-center">
            <th></th>
            <th>Mentor ID</th>
            <th>Full Name</th>
            <th>Job</th>
            <th>Mentor At</th>
            <th>Volume</th>
            @if(Auth::user()->role_name === 'Super Admin')
            <th>Action</th>
            @endif
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
    </div>
  </section>

@if(Auth::user()->role_name === 'Super Admin')
  <div class="modal fade" id="addMentors" tabindex="-1" aria-labelledby="addMentorsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Mentors</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dashboard.mua.mentors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3 has-validation">
                    <label for="mentor_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="mentor_name" id="mentor_name" aria-describedby="mentor_name" placeholder="Fill mentor name">
                </div>
                <div class="mb-3 has-validation">
                    <label for="mentor_job" class="form-label">Job</label>
                    <input type="text" class="form-control" name="mentor_job" id="mentor_job" aria-describedby="mentor_job" placeholder="Fill mentor job">
                </div>
                <div class="mb-3 has-validation">
                    <label for="class" class="form-label">Mentor At</label>
                    <select name="classID" id="mentorID" class="form-control">
                        <option value="0">Select Mentoring At</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->classID }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 has-validation">
                    <label for="volume" class="form-label">Volume</label>
                    <input type="number" class="form-control" name="volume" id="volume" aria-describedby="volume" placeholder="Fill URL">
                </div>
                <div class="mb-3 has-validation">
                    <label for="volume" class="form-label">Mentor Picture</label>
                    <input type="url" class="form-control" name="mentor_picture" id="volume" aria-describedby="volume" placeholder="Fill URL">
                </div>

                <div class="mb-3">
                    <label for="mentor_description" class="form-label">Description</label>
                    <textarea name="mentor_description" id="createClass" placeholder="Description Mentor" class="form-control trigger" id="mentor_description" rows="3"></textarea>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endif
@endsection