@extends('dashboard.MUA.layouts.main', [
    'title' => 'Classes',
    'active' => 'Classes'
])

@section('content')
<section class="p-3">
    <header>
      <h3>Classes</h3>
      <p>Manage your article and see it growth</p>
    </header>
    <div class="information d-flex flex-column gap-5">
      <div class="row px-1 mb-2 gap-5">
        <div class="col-xl-4 col-12 card debit">
          <img src="{{ asset('assets/images/MUA/ic_card.svg') }}" alt="Debit" width="54px" />
          <p class="number">â€¢â€¢â€¢â€¢ &nbsp;&nbsp; 2208 &nbsp;&nbsp; 1996</p>
          <div>
            <p class="fw-semibold m-0">{{ Auth::user()->role_name . " " . Auth::user()->class }}</p>
            <p class="fw-light m-0">20/24</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card balance">
          <p>Active Classes ðŸ“‘</p>
          <h2>{{ $classes->count() }}</h2>
          <div>
            <p class="m-0 fw-bold">8 Regular | 2 Exclusive</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card donut-chart m-lg-0 p-2">
          <div>
            <canvas id="chart-class" style="height: 226px; width: 100%">
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
      {{-- @if(Auth::user()->role !== 'Manager') --}}
      <div class="row px-1 d-flex justify-content-between add-button">
        <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
          <div data-bs-toggle="modal" data-bs-target="#addClass" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: fit-content; cursor: pointer">
            <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;">+</p>
          </div>
        </div>
      </div>
      {{-- @endif --}}
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Tracking and modifying your article</h5>
          <div>
            <table id="example" class="table" style="width:100%">
    <thead>
        <tr class="text-center">
            <th></th>
            <th class="text-center">Class ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">First Choice Total Register</th>
            <th class="text-center">Second Choice Total Register</th>
            
            <th class="text-center">Mentor</th>
            @if(Auth::user()->role_name == 'Super Admin')
            <th class="text-center">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $class)
                <tr class="p-5 text-left">
                    <td class="w-[5rem]">
                        <img src="{{ asset("storage/$class->logo") }}" alt="" class="img-testimonial w-fit h-fit rounded-full object-contain">
                    </td>
                    <td class="text-center">{{ $class->classID }}</td>
                    <td class="text-center">{{ $class->class_name }}</td>
                    <td class="text-center">{{ $class->menteeOnFirstClass->count() }} @if($class->menteeOnFirstClass->count() >= 25) ✅ @else 💔 @endif</td>
                    <td class="text-center">{{ $class->menteeOnSecondClass->count() }}</td>
                    
                    <td class="text-center">{{ $class->mentor->mentor_name ?? "" }}</td>
                    @if(Auth::user()->role_name == 'Super Admin')
                    <td class="" style="height: 100%;">
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $class->classID }}"><i class='bx bx-trash-alt'></i></button>&nbsp;
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $class->classID }}"><i class='bx bx-edit-alt'></i></button>
                        </div>
                    </td>
                    @endif
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal-{{ $class->classID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Class Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dashboard.mua.classes.destroy') }}" class="needs-validation" method="post" novalidate>
                                @csrf
                                @method('DELETE')
                                <div class="modal-body mt-3">
                                    <input type="hidden" name="id" class="form-control" value="{{ $class->classID }}" id="id">
                                    <p>Are you sure want delete data <b>{{ $class->class_name }}'s</b> class ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="editModal-{{ $class->classID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Class Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dashboard.mua.classes.update') }}" enctype="multipart/form-data" class="needs-validation" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3 has-validation">
                                      <label for="class_name" class="form-label">Name</label>
                                      <input type="text" class="form-control" name="class_name" value="{{ $class->class_name }}" id="class_name" aria-describedby="class_name" placeholder="Fill class name">
                                  </div>
                                  <div class="row">
                                    <div class="mb-3 has-validation col-md-6">
                                      <label for="class_slug" class="form-label">Slug</label>
                                      <input type="text" class="form-control" name="class_slug" value="{{ $class->class_slug }}" id="class_slug" aria-describedby="class_slug" placeholder="Fill class slug">
                                  </div>
                                  <div class="mb-3 has-validation col-md-6">
                                    <label for="volume" class="form-label">Volume</label>
                                    <input type="number" class="form-control" name="volume" id="volume" value="{{ $class->volume }}" aria-describedby="volume" placeholder="Fill MUA volume">
                                </div>
                                    </div>
                                    <div class="mb-3 has-validation">
                                      <label for="class_name" class="form-label">Mentor</label>
                                      <select name="mentorID" id="mentorID" class="form-control">
                                        <option value="0">Choose Mentor</option>
                                        @foreach($mentors as $mentor)
                                            <option value="{{ $mentor->id }}" {{ ($class->mentorID == $mentor->id) ? 'selected' : '' }}>{{ $mentor->mentor_name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="row">
                                    <div class="mb-3 has-validation col-md-6">
                                    <label for="class_session_1" class="form-label">Session 1</label>
                                    <input type="datetime-local" class="form-control" name="class_session_1" value="{{ $class->class_session_1 }}" id="class_session_1" aria-describedby="class_session_1" placeholder="Fill your jabatan">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="class_session_2" class="form-label">Session 2</label>
                                    <input type="datetime-local" class="form-control" name="class_session_2" value="{{ $class->class_session_2 }}" id="class_session_2" aria-describedby="batchHelp" placeholder="1">
                                </div>
                                </div>
                                {{-- <label for="logo" class="form-label">Class's Logo</label>
                                <div class="mb-3 thumbnail-container-edit @error('logo') is-invalid @enderror d-flex">
                                <div class="drag-area-old">
                                    <img src='{{ asset("storage/$class->logo") }}' class="w-[200px] h-[200px] object-contain"  alt="" />
                                </div>
        
                                <div class="drag-area">
                                    <div class="browse-thumbnail flex-column align-items-center justify-content-center">
                                        <div class="icon mb-4">
                                            <i class='bx bx-images' style="font-size: 40px"></i>
                                        </div>
        
                                        <span class="header">Choose your thumbnail</span>
                                        <span class="header">and <span class="button">browse</span></span>
                                        <span class="support">Supports: Webp</span>
                                    </div>
                                    
                                     <input type="file" hidden name="logo" class="thumbnail-input" id="logo">
                                    <img src="" class="img-preview" alt="" />
                                </div>
                                
                            </div> --}}
                            <div class="mb-3">
                              <label for="logo" class="form-label">Class's Logo</label>
                              <input type="file" class="form-control" name="logo" value="{{ $class->class_session_1 }}" id="class_session_1" aria-describedby="class_session_1" placeholder="Fill your jabatan">
                            </div>
                                  <div class="mb-3">
                                      <label for="description" class="form-label">Description</label>
                                      <textarea name="description" id="createClass" placeholder="Description Class" class="form-control trigger" id="description" rows="6">{{ $class->description }}</textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="id" value="{{ $class->classID }}">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
            <th class="text-center">Class ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">First Choice Total Register</th>
            <th class="text-center">Second Choice Total Register</th>
            
            <th class="text-center">Mentor</th>
            @if(Auth::user()->role_name == 'Super Admin')
            <th class="text-center">Action</th>
            @endif
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="addClass" tabindex="-1" aria-labelledby="addClassLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Class</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dashboard.mua.classes.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
          <div class="modal-body">
                      <div class="mb-3 has-validation">
                          <label for="class_name" class="form-label">Name</label>
                          <input type="text" class="form-control" name="class_name" id="class_name" aria-describedby="class_name" placeholder="Fill class name">
                      </div>
                      <div class="row">
                        <div class="mb-3 has-validation col-md-6">
                          <label for="class_slug" class="form-label">Slug</label>
                          <input type="text" class="form-control" name="class_slug" id="class_slug" aria-describedby="class_slug" placeholder="Fill class slug">
                      </div>
                      <div class="mb-3 has-validation col-md-6">
                        <label for="volume" class="form-label">Volume</label>
                        <input type="number" class="form-control" name="volume" id="volume" aria-describedby="volume" placeholder="Fill MUA volume">
                    </div>
                        </div>
                        <div class="mb-3 has-validation">
                          <label for="class_name" class="form-label">Mentor</label>
                          <select name="mentorID" id="mentorID" class="form-control">
                            <option value="0">Choose Mentor</option>
                            @foreach($mentors as $mentor)
                                <option value="{{ $mentor->id }}">{{ $mentor->mentor_name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="row">
                        <div class="mb-3 has-validation col-md-6">
                        <label for="class_session_1" class="form-label">Session 1</label>
                        <input type="datetime-local" class="form-control" name="class_session_1" id="class_session_1" aria-describedby="class_session_1" placeholder="Fill your jabatan">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="class_session_2" class="form-label">Session 2</label>
                        <input type="datetime-local" class="form-control" name="class_session_2" id="class_session_2" aria-describedby="batchHelp" placeholder="1">
                    </div>
                    </div>
                      <label for="logo" class="form-label">Class's Logo</label>
                      <div class="mb-3 thumbnail-container d-flex align-items-center justify-content-center mx-auto">
                          <div class="drag-area align-self-center">
                              <div class="browse-thumbnail flex-column align-items-center justify-content-center">
                                  <div class="icon mb-4">
                                      <i class='bx bx-images' style="font-size: 40px"></i>
                                  </div>
  
                                  <span class="header">Choose your picture</span>
                                  <span class="header">and <span class="button">browse</span></span>
                                  <span class="support">Supports: Webp, Png</span>
                              </div>
                              
                               <input type="file" hidden name="logo" class="thumbnail-input" id="logo">
                               <img src="" class="img-preview" alt="" />
                          </div>
                      </div>
                      <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea name="description" id="createClass" placeholder="Description Class" class="form-control trigger" id="description" rows="6"></textarea>
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
@endsection