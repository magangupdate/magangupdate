@extends('dashboard.MUA.layouts.main', [
    'title' => $class->class_name . " Registrants",
    'active' => 'Mentees Detail',
])


@section('content')
<section class="p-3">
    <header class="flex flex-row justify-start items-center gap-3">
      <div class="icon-history w-[50px] h-[50px] -mt-6">
        <img
          src="{{ asset("storage/$class->logo") }}"
          width="50"
          height="50"
        />
      </div>
      <div class="flex flex-col">
        <h3>{{ $class->class_name }} Registrants</h3>
        <p>Manage the registrants and choose to be mentee</p>
      </div>
    </header>
    <div class="information d-flex flex-column gap-5">
      <div class="row px-1 mb-2 gap-5">
        <!--<div class="col-xl-4 col-12 card debit">-->
        <!--  <img src="{{ asset('assets/images/MUA/ic_card.svg') }}" alt="Debit" width="54px" />-->
        <!--  <p class="number">•••• &nbsp;&nbsp; 2208 &nbsp;&nbsp; 1996</p>-->
        <!--  <div>-->
        <!--    <p class="fw-semibold m-0">{{ Auth::user()->role_name . " " . Auth::user()->class }}</p>-->
        <!--    <p class="fw-light m-0">20/24</p>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="col-xl-4 col-12 card balance">
          <p>Total Registrants </p>
          <h2>{{ $menteeOnFirstClass->count() }}</h2>
          <div>
            <p class="m-0 fw-bold">{{ $menteeOnFirstClass->count() / 25 * 100 }}%</p>
          </div>
        </div>
        <div class="col-xl-4 col-12 card donut-chart m-lg-0 p-2">
          <div>
            <canvas id="chart-class" style="height: 226px; width: 100%">
            </canvas>
          </div>
        </div>
        <div class="col-xl-4 col-12 card donut-chart m-lg-0 p-2">
          <div>
            <canvas id="chart-scored" style="height: 226px; width: 100%">
            </canvas>
          </div>
        </div>
      </div>
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-6 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Registrants Per Days In A Week of {{ $class->class_name }}</h5>
          <div>
            <canvas id="chart-revenue" width="100%"></canvas>
          </div>
        </div>
        <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
          <h5>Top 3 Registrants</h5>
          <div class="d-flex flex-column gap-4">
            @php $i = 0 @endphp
            @foreach($topThree as $mentee)
            <div class="d-flex flex-row gap-3">
              <div class="icon-history">
                <h2 class="rank">{{ $i + 1 }}</h2>
              </div>
              <div class="trans-history flex-fill">
                <div>
                  <p class="m-0 title">{{ $mentee->full_name }}</p>
                  <p class="m-0 date">{{ $mentee->university }}</p>
                </div>
                <p class="m-0 income">{{ $mentee->total_score ?? 0 }}</p>
              </div>
            </div>
            @php $i++ @endphp
            @endforeach
          </div>
        </div>
        
      </div>
   
      <div class="row px-1 d-flex justify-content-between add-button">
        <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
          <a href="@if ($menteeOnFirstClass->count() >= 25 && $arentScored == 0) /MUAVol9/dashboard/mentees/export/{{ uniqid() }}/{{ $class->classID }} @else # @endif" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: 5rem; cursor: pointer; @if ($menteeOnFirstClass->count() >= 25 && $arentScored == 0) background-color: #A6CB12; @else background-color: gray; @endif">
            <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;"><i class='bx bx-cloud-download'></i></p>
          </a>
        </div>
      </div>
      
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Tracking and find all registrants</h5>
          <div>
            <table id="example" class="table" style="width:100%">
    <thead>
        <tr class="text-center">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th class="py-3">Action</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
            <th>Registered At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mentees as $mentee)
            <tr class="p-5 text-left">
                <td></td>
                <!--<td>{{ $mentee->menteeID }}</td>-->
                <td>{{ $mentee->full_name }}</td>
                <td class="flex flex-col py-3 items-center justify-center">
                    @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'PIC Class')
                        @if($mentee->assessmentMenteeApplication != null)
                        <button type="button" class="btn @if(Auth::user()->class === $class->class_name) btn-warning @else btn-secondary @endif" data-bs-toggle="modal" data-bs-target="#editModal-{{ $mentee->menteeID }}" style="width: 2.5rem;"><i class="bx @if(Auth::user()->class === $class->class_name) bx-pencil @else bx-info-circle @endif"></i></button>&nbsp;
                        @endif
                        @if($mentee->assessmentMenteeApplication == null)
                        <button type="button" class="btn @if(Auth::user()->class === $class->class_name) btn-success @else btn-secondary @endif" data-bs-toggle="modal" data-bs-target="#infoModal-{{ $mentee->menteeID }}" style="width: 2.5rem;"><i class='bx @if(Auth::user()->class === $class->class_name) bx-task @else bx-info-circle @endif'></i></button>&nbsp;
                        @endif
                    @endif
                    @if(Auth::user()->role_name === 'Manager')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoModal-{{ $mentee->menteeID }}"><i class='bx bx-info-circle' style="width: 2.5rem;"></i></button>&nbsp;
                    @endif
                    @if(Auth::user()->role_name === 'Super Admin')
                    <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?" style="width: 2.5rem;"><i class='bx bx-trash-alt'></i></button>&nbsp;
                    @endif
                </td>
                <td style="text-align: center;" class="py-3">
                    {{ $mentee->total_score ?? 0 }}
                </td>
                <td>{{ $mentee->email }}</td>
                <td>{{ $mentee->university }}</td>
                <td>{{ $mentee->major }}</td>
                <td>{{ $mentee->firstClass->class_name }}</td>
                <td>{{ $mentee->secondClass->class_name }}</td>
                <td><a href="https://wa.me/{{ $mentee->whatsapp_number }}">+{{ $mentee->whatsapp_number }}</td>
                <td><a href="https://instagram.com/{{ $mentee->instagram }}">{{ $mentee->instagram }}</a></td>
                <td>{{ $mentee->created_at }}</td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="infoModal-{{ $mentee->menteeID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mentee Assessment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action={{ route('dashboard.mua.assessment.store') }}>
                            @csrf
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Full Name</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->full_name }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Email</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->email }}">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">University</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->university }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Major</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->major }}">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Whatsapp Number</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->whatsapp_number }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Instagram</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->instagram }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font-bold">First Class</label>
                                <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->firstClass->class_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose First Class</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_first_class }}</textarea>
                                        <div class="collapse" id="qa1">
                                            <input type="number" name="assessment0" min="0" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name )
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa1" aria-expanded="false" aria-controls="qa1" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                            2 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            3 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                            4 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            5 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font-bold">Second Class</label>
                                <input type="email" class="form-control" readonly id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->secondClass->class_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose Second Class</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_second_class }}</textarea>
                                        <div class="collapse" id="qa2">
                                            <input type="number" min="0" name="assessment01" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                  
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa2" aria-expanded="false" aria-controls="qa2" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                            2 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            3 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                            4 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            5 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <label for="trigger" class="form-label font-bold">CV</label>
                            <div class="mb-3">
                              <div class="w-full">
                                <object
                                  data="{{ asset("storage/$mentee->cv") }}"
                                  type="application/pdf"
                                  width="100%"
                                  height="500px"
                                >
                                  <iframe
                                    src="{{ asset("storage/$mentee->cv") }}"
                                    width="100%"
                                    height="100%"
                                    style="border: none;"
                                  >
                                    <p>
                                      Your browser does not support PDFs.
                                      <a href="https://example.com/test.pdf">Download the PDF</a>
                                      .
                                    </p>
                                  </iframe>
                                </object>
                                <div class="collapse" id="qaCv">
                                    <input type="number" min="0" name="assessment02" max="5" class="form-control mt-1" placeholder="Score" value="">
                                </div>
                            </div>
                            </div>
                            @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                            <div class="flex mt-2">
                                
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#qaCv" aria-expanded="false" aria-controls="qaCv" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="CV" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>
                                  0 : Tidak ada jawaban<br>
                                  1 : <br>
                                  - <b>Tidak</b> ada pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  2 : <br>
                                  - <b>Minim</b> pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  3 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>50% pengalaman relevan</b> dengan kelas yang dipilih (Setengah dari pengalamannya relate dengan kelas)<br>
                                  - Penjelasan pengalaman cukup <b>komprehensif</b><br>
                                  - Informasi yang didapatkan <b>cukup</b><br>
                                  4 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Sebagian besar pengalamannya relate dengan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  5 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan > <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Hampir Seluruh/semua pengalamannya relate degnan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  - Pencapaian yang <b>baik</b><br>
                                  </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                            </div>
                            @endif
                            <div class="row col-md-12 mt-5">
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Twibbon Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->twibbon_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaTwibbon">
                                          <input type="number" min="0" name="assessment9" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div>    
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaTwibbon" aria-expanded="false" aria-controls="qaTwibbon" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="Twibbon" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid/IG Private/Postingan dihapus/Bukan 1st Account<br>
                                          3 : Hanya mengupload slide satu saja, tidak mengupload slide dua (poster)<br>
                                          5 : <br>
                                          - Bukti Valid <br>
                                          - Postingan masih di keep<br>
                                          - Upload di First Account
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Repost Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->repost_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaRepost">
                                          <input type="number" min="0" name="assessment10" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaRepost" aria-expanded="false" aria-controls="qaRepost" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Repost Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="row col-md-12 mt-5">
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Tag Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->tag_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaTag">
                                          <input type="number" min="0" name="assessment11" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaTag" aria-expanded="false" aria-controls="qaTag" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Tag Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Subscribe Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->subscribe_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaSubscribe">
                                          <input type="number" min="0" name="assessment12" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaSubscribe" aria-expanded="false" aria-controls="qaSubscribe" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Subscribe Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 :Bukti tidak valid (Foto hanya asal ambil di gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Tell About Yourself</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q1 }}</textarea>
                                        <div class="collapse" id="qa3">
                                            <input type="number" min="0" name="assessment1" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa3" aria-expanded="false" aria-controls="qa3" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Identity Personal" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Hanya nama & memiliki <b>< 3 kalimat</b><br>
                                            2 : Hanya nama, statusnya saat ini, dan <b>penjelasan yang singkat</b> yakni <b>< 3 kalimat</b><br>
                                            3 : Hanya poin dan penjelasan <b>singkat</b> mengenai <b>status, univ, dan kelebihan diri. Memiliki < 4 kalimat</b> <br>
                                            4 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, serta interest. Memiliki < 5 kalimat.</b><br>
                                            5 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, interest, serta pengalaman</b>. Memiliki <b> 5 kalimat.</b><br>" data-bs-html="true"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Why You Interest to Join MUA Vol. 9?</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q2 }}</textarea>
                                        <div class="collapse" id="qa4">
                                            <input type="number" min="0" max="5 " name="assessment2" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name) 
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa4" aria-expanded="false" aria-controls="qa4" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Motivation, Achievement Orientation" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                            2 :  <br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan</b> mengikuti mentoring<br>
                                            3 : <br>
                                            - Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi </b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan serta harapan/capaian yang akan didapat</b> setelah mengikuti mentoring<br>
                                            4 : <br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi </b>mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring 3. Memiliki <b>< 5 Kalimat</b><br>
                                            5 : <br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi</b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring <b>pada kelas yang dipilih</b><br>
                                            - Memiliki <b>> 5 kalimat</b><br>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Your Busy Right Now</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q3 }}</textarea>
                                        <div class="collapse" id="qa5">
                                            <input type="number" min="0" max="5" name="assessment3" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa5" aria-expanded="false" aria-controls="qa5" class="btn btn-success" data-bs-toggle="modal"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Business" data-bs-html="true" data-bs-content="<p>
                                            1 : Memiliki lebih dari <b>8</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            2 :  Memiliki <b>6-7</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            3 : Memiliki <b>4-5</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            4 : Memiliki <b>3</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            5 : Tidak memiliki kesibukan atau Memiliki <b>1-2</b> kesibukan dalam satu waktu (termasuk akademik)<br></p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">How Do You Manage Your Time Between MUA Vol. 9 And Others?</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q4 }}</textarea>
                                        <div class="collapse" id="qa6">
                                            <input type="number" min="0" max="5" name="assessment4" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa6" aria-expanded="false" aria-controls="qa6" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Organizational Commitment, Self Control, Flexibility" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat poin <b>singkat</b> mengenai <b>cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            2 :  Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            3 : <br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan <b>singkat</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            4 : <br>
                                            - Terdapat penjelasan mengenai <b>list prioritas</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat poin dan penjelasan <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Memiliki <b>< 5 kalimat</b><br>
                                            5 : <br>
                                            - Terdapat penjelasan <b>secara rinci</b> mengenai <b>list prioritas</b> dalam mengerjakan aktivitas dan penempatan MagangUpdate Academy Vol.9<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan <b>secara rinci</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Memiliki <b>> 6 kalimat</b>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Commitment (1-9)</label>
                                <div class="flex gap-1">
                                    <div class="w-full">
                                        <input type="text" name="" readonly value="{{ $mentee->q5 }}" id="" class="form-control">
                                        <div class="collapse" id="qa7">
                                            <input type="number" min="0" max="5" name="assessment5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa7" aria-expanded="false" aria-controls="qa7" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Commitment" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : 1-2<br>
                                            2 : 3-4<br>
                                            3 : 5-6<br>
                                            4 : 7-8<br>
                                            5 : 9
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Realization of Your Commitment Value to MUA Vol. 9</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q6 }}</textarea>
                                        <div class="collapse" id="qa8">
                                            <input type="number" min="0" max="5" name="assessment6" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa8" aria-expanded="false" aria-controls="qa8" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Commitment's Realization" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Tidak terdapat <b>bentuk komitmen</b>. Melainkan hanya menjelaskan bahwa mereka berkomitmen<br>
                                            2 :  Terdapat penjelasan secara <b>singkat</b> mengenai komitmen yang diberikan. Memiliki <b>< 2 kalimat</b><br>
                                            3 : Terdapat penjelasan secara <b>singkat</b> bahwa mereka berkomitmen dan <b>memberikan bentuk komitmennya saja tanpa adanya penjelasan.</b><br>
                                            4 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>< 3 kalimat</b><br>
                                            5 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>> 3 kalimat</b><br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Hope Joining MUA Vol. 9</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q7 }}</textarea>
                                        <div class="collapse" id="qa9">
                                            <input type="number" min="0" max="5" name="assessment7" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa9" aria-expanded="false" aria-controls="qa9" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Achievement Oriantation" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>1 kalimat</b> saja namun kurang jelas<br>
                                            2 :  Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>< 2 kalimat namun jelas</b><br>
                                            3 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9 secara umum</b>. Memiliki <b>< 3 kalimat</b><br>
                                            4 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih</b>.<br>
                                            5 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih dan passion ataupun kemampuan yang dimiliki</b>. Memiliki <b>> 5 Kalimat</b><br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Will You Contribute Actively to Open Cam During The Class?</label>
                                <div class="flex gap-1">
                                    <div class="w-full">
                                        <input type="text" name="" readonly value="@if($mentee->q8 == '1') Yes @else No @endif" id="" class="form-control">
                                        <div class="collapse" id="qa10">
                                            <input type="number" min="0" max="5" name="assessment8" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa10" aria-expanded="false" aria-controls="qa10" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Open Camera" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak<br>
                                            5 : Ya
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <input type="hidden" name="menteeID" value="{{ $mentee->menteeID }}">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save Assessment</button>
                                @endif
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            @if($mentee->assessmentMenteeApplication != null)
            <div class="modal fade" id="editModal-{{ $mentee->menteeID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mentee Assessment</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="post" action={{ route('dashboard.mua.assessment.update') }}>
                          @csrf
                          @method('PUT')
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Full Name</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->full_name }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Email</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->email }}">
                              </div>
                          </div>
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">University</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->university }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Major</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->major }}">
                              </div>
                          </div>
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Whatsapp Number</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->whatsapp_number }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Instagram</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->instagram }}">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label font-bold">First Class</label>
                              <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->firstClass->class_name }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose First Class</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_first_class }}</textarea>
                                      <input type="number" name="assessment0" min="0" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment0 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                          2 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          3 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                          4 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          5 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>

                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label font-bold">Second Class</label>
                              <input type="email" class="form-control" readonly id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->secondClass->class_name }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose Second Class</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_second_class }}</textarea>
                                          <input type="number" min="0" name="assessment01" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment01 }}">
                                  </div>
                                
                                @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                          2 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          3 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                          4 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          5 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                 @endif
                              </div>
                          </div>
                          <label for="trigger" class="form-label font-bold">CV</label>
                          <div class="mb-3">
                            <div class="w-full">
                              <object
                                data="{{ asset("storage/$mentee->cv") }}"
                                type="application/pdf"
                                width="100%"
                                height="500px"
                              >
                                <iframe
                                  src="{{ asset("storage/$mentee->cv") }}"
                                  width="100%"
                                  height="100%"
                                  style="border: none;"
                                >
                                  <p>
                                    Your browser does not support PDFs.
                                    <a href="{{ asset("storage/$mentee->cv") }}">Download the PDF</a>
                                    .
                                  </p>
                                </iframe>
                              </object>
                                  <input type="number" min="0" name="assessment02" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment02 }}">
                          </div>
                          </div>
                          @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                          <div class="flex mt-2">
                              
                              <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="CV" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>
                                  0 : Tidak ada jawaban<br>
                                  1 : <br>
                                  - <b>Tidak</b> ada pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  2 : <br>
                                  - <b>Minim</b> pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  3 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>50% pengalaman relevan</b> dengan kelas yang dipilih (Setengah dari pengalamannya relate dengan kelas)<br>
                                  - Penjelasan pengalaman cukup <b>komprehensif</b><br>
                                  - Informasi yang didapatkan <b>cukup</b><br>
                                  4 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Sebagian besar pengalamannya relate dengan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  5 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan > <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Hampir Seluruh/semua pengalamannya relate degnan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  - Pencapaian yang <b>baik</b><br>
                                  </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                          </div>
                          @endif
                          <div class="row col-md-12 mt-5">
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Twibbon Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->twibbon_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment9" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment9 }}">
                                    </div>    
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="Twibbon" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid/IG Private/Postingan dihapus/Bukan 1st Account<br>
                                        3 : Hanya mengupload slide satu saja, tidak mengupload slide dua (poster)<br>
                                        5 : <br>
                                        - Bukti Valid <br>
                                        - Postingan masih di keep<br>
                                        - Upload di First Account
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                              
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Repost Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->repost_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment10" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment10 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Repost Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                  
                          <div class="row col-md-12 mt-5">
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Tag Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->tag_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment11" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment11 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Tag Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>

                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Subscribe Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->subscribe_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment12" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment12 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Subscribe Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 :Bukti tidak valid (Foto hanya asal ambil di gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3 mt-4">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Tell About Yourself</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q1 }}</textarea>
                                          <input type="number" min="0" name="assessment1" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment1 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Identity Personal" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Hanya nama & memiliki <b>< 3 kalimat</b><br>
                                          2 : Hanya nama, statusnya saat ini, dan <b>penjelasan yang singkat</b> yakni <b>< 3 kalimat</b><br>
                                          3 : Hanya poin dan penjelasan <b>singkat</b> mengenai <b>status, univ, dan kelebihan diri. Memiliki < 4 kalimat</b> <br>
                                          4 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, serta interest. Memiliki < 5 kalimat.</b><br>
                                          5 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, interest, serta pengalaman</b>. Memiliki <b> 5 kalimat.</b><br>" data-bs-html="true"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Why You Interest to Join MUA Vol. 9?</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q2 }}</textarea>
                                      <input type="number" min="0" max="5 " name="assessment2" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment2 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Motivation, Achievement Orientation" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                          2 :  <br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan</b> mengikuti mentoring<br>
                                          3 : <br>
                                          - Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi </b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan serta harapan/capaian yang akan didapat</b> setelah mengikuti mentoring<br>
                                          4 : <br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi </b>mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring 3. Memiliki <b>< 5 Kalimat</b><br>
                                          5 : <br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi</b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring <b>pada kelas yang dipilih</b><br>
                                          - Memiliki <b>> 5 kalimat</b><br>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Your Busy Right Now</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q3 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment3" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment3 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Business" data-bs-html="true" data-bs-content="<p>
                                          1 : Memiliki lebih dari <b>8</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          2 :  Memiliki <b>6-7</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          3 : Memiliki <b>4-5</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          4 : Memiliki <b>3</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          5 : Tidak memiliki kesibukan atau Memiliki <b>1-2</b> kesibukan dalam satu waktu (termasuk akademik)<br></p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">How Do You Manage Your Time Between MUA Vol. 9 And Others?</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q4 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment4" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment4 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Organizational Commitment, Self Control, Flexibility" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat poin <b>singkat</b> mengenai <b>cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          2 :  Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          3 : <br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan <b>singkat</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          4 : <br>
                                          - Terdapat penjelasan mengenai <b>list prioritas</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat poin dan penjelasan <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Memiliki <b>< 5 kalimat</b><br>
                                          5 : <br>
                                          - Terdapat penjelasan <b>secara rinci</b> mengenai <b>list prioritas</b> dalam mengerjakan aktivitas dan penempatan MagangUpdate Academy Vol.9<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan <b>secara rinci</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Memiliki <b>> 6 kalimat</b>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Commitment (1-9)</label>
                              <div class="flex gap-1">
                                  <div class="w-full">
                                      <input type="text" name="" readonly value="{{ $mentee->q5 }}" id="" class="form-control">
                                          <input type="number" min="0" max="5" name="assessment5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment5 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Commitment" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : 1-2<br>
                                          2 : 3-4<br>
                                          3 : 5-6<br>
                                          4 : 7-8<br>
                                          5 : 9
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Realization of Your Commitment Value to MUA Vol. 9</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q6 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment6" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment6 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Commitment's Realization" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Tidak terdapat <b>bentuk komitmen</b>. Melainkan hanya menjelaskan bahwa mereka berkomitmen<br>
                                          2 :  Terdapat penjelasan secara <b>singkat</b> mengenai komitmen yang diberikan. Memiliki <b>< 2 kalimat</b><br>
                                          3 : Terdapat penjelasan secara <b>singkat</b> bahwa mereka berkomitmen dan <b>memberikan bentuk komitmennya saja tanpa adanya penjelasan.</b><br>
                                          4 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>< 3 kalimat</b><br>
                                          5 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>> 3 kalimat</b><br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Hope Joining MUA Vol. 9</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q7 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment7" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment7 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      <button type="button" class="btn btn-secondary " data-bs-toggle="popover" data-bs-title="Achievement Oriantation" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>1 kalimat</b> saja namun kurang jelas<br>
                                          2 :  Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>< 2 kalimat namun jelas</b><br>
                                          3 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9 secara umum</b>. Memiliki <b>< 3 kalimat</b><br>
                                          4 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih</b>.<br>
                                          5 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih dan passion ataupun kemampuan yang dimiliki</b>. Memiliki <b>> 5 Kalimat</b><br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Will You Contribute Actively to Open Cam During The Class?</label>
                              <div class="flex gap-1">
                                  <div class="w-full">
                                      <input type="text" name="" readonly value="@if($mentee->q8 == '1') Yes @else No @endif" id="" class="form-control">
                                          <input type="number" min="0" max="5" name="assessment8" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment8 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Open Camera" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak<br>
                                          5 : Ya
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                              <input type="hidden" name="menteeID" value="{{ $mentee->menteeID }}">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update Assessment</button>
                              @endif
                      </div>
                  </form>
                  </div>
              </div>
              @endif
          </div>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="text-center">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th class="py-3">Action</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
            <th>Registered At</th>
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
      
      <div class="row px-1 d-flex justify-content-between">
        <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
          <h5>Tracking and find all registrants of Second Choice</h5>
          <div>
            <table id="example" class="table" style="width:100%">
    <thead>
        <tr class="text-left">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th class="py-3">Action</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
            <th>Registered At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menteesSecond as $mentee)
            <tr class="p-5 text-left">
                <td></td>
                <!--<td>{{ $mentee->menteeID }}</td>-->
                <td>{{ $mentee->full_name }}</td>
                <td class="flex flex-col py-3 items-center justify-center">
                    @if(Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'PIC Class')
                        @if($mentee->assessmentMenteeApplication != null)
                        <button type="button" class="btn @if(Auth::user()->class === $class->class_name) btn-warning @else btn-secondary @endif" data-bs-toggle="modal" data-bs-target="#editModal-{{ $mentee->menteeID }}" style="width: 2.5rem;"><i class="bx @if(Auth::user()->class === $class->class_name) bx-pencil @else bx-info-circle @endif"></i></button>&nbsp;
                        @endif
                        @if($mentee->assessmentMenteeApplication == null)
                        <button type="button" class="btn @if(Auth::user()->class === $class->class_name) btn-success @else btn-secondary @endif" data-bs-toggle="modal" data-bs-target="#infoModal-{{ $mentee->menteeID }}" style="width: 2.5rem;"><i class='bx @if(Auth::user()->class === $class->class_name) bx-task @else bx-info-circle @endif'></i></button>&nbsp;
                        @endif
                    @endif
                    @if(Auth::user()->role_name === 'Manager')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoModal-{{ $mentee->menteeID }}"><i class='bx bx-info-circle' style="width: 2.5rem;"></i></button>&nbsp;
                    @endif
                    @if(Auth::user()->role_name === 'Super Admin')
                    <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?" style="width: 2.5rem;"><i class='bx bx-trash-alt'></i></button>&nbsp;
                    @endif
                </td>
                <td style="text-align: center;" class="py-3">
                    {{ $mentee->total_score ?? 0 }}
                </td>
                <td>{{ $mentee->email }}</td>
                <td>{{ $mentee->university }}</td>
                <td>{{ $mentee->major }}</td>
                <td>{{ $mentee->firstClass->class_name }}</td>
                <td>{{ $mentee->secondClass->class_name }}</td>
                <td><a href="https://wa.me/{{ $mentee->whatsapp_number }}">+{{ $mentee->whatsapp_number }}</td>
                <td><a href="https://instagram.com/{{ $mentee->instagram }}">{{ $mentee->instagram }}</a></td>
                <td>{{ $mentee->created_at }}</td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="infoModal-{{ $mentee->menteeID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mentee Assessment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action={{ route('dashboard.mua.assessment.store') }}>
                            @csrf
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Full Name</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->full_name }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Email</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->email }}">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">University</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->university }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Major</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->major }}">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Whatsapp Number</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->whatsapp_number }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label font-bold">Instagram</label>
                                    <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->instagram }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font-bold">First Class</label>
                                <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->firstClass->class_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose First Class</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_first_class }}</textarea>
                                        <div class="collapse" id="qa1">
                                            <input type="number" name="assessment0" min="0" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name )
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa1" aria-expanded="false" aria-controls="qa1" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                            2 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            3 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                            4 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            5 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font-bold">Second Class</label>
                                <input type="email" class="form-control" readonly id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->secondClass->class_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose Second Class</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_second_class }}</textarea>
                                        <div class="collapse" id="qa2">
                                            <input type="number" min="0" name="assessment01" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                  
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa2" aria-expanded="false" aria-controls="qa2" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                            2 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            3 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                            4 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            5 : <br>
                                            - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                            - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                            - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                            - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <label for="trigger" class="form-label font-bold">CV</label>
                            <div class="mb-3">
                              <div class="w-full">
                                <object
                                  data="{{ asset("storage/$mentee->cv") }}"
                                  type="application/pdf"
                                  width="100%"
                                  height="500px"
                                >
                                  <iframe
                                    src="{{ asset("storage/$mentee->cv") }}"
                                    width="100%"
                                    height="100%"
                                    style="border: none;"
                                  >
                                    <p>
                                      Your browser does not support PDFs.
                                      <a href="https://example.com/test.pdf">Download the PDF</a>
                                      .
                                    </p>
                                  </iframe>
                                </object>
                                <div class="collapse" id="qaCv">
                                    <input type="number" min="0" name="assessment02" max="5" class="form-control mt-1" placeholder="Score" value="">
                                </div>
                            </div>
                            </div>
                            @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                            <div class="flex mt-2">
                                
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#qaCv" aria-expanded="false" aria-controls="qaCv" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="CV" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>
                                  0 : Tidak ada jawaban<br>
                                  1 : <br>
                                  - <b>Tidak</b> ada pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  2 : <br>
                                  - <b>Minim</b> pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  3 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>50% pengalaman relevan</b> dengan kelas yang dipilih (Setengah dari pengalamannya relate dengan kelas)<br>
                                  - Penjelasan pengalaman cukup <b>komprehensif</b><br>
                                  - Informasi yang didapatkan <b>cukup</b><br>
                                  4 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Sebagian besar pengalamannya relate dengan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  5 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan > <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Hampir Seluruh/semua pengalamannya relate degnan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  - Pencapaian yang <b>baik</b><br>
                                  </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                            </div>
                            @endif
                            <div class="row col-md-12 mt-5">
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Twibbon Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->twibbon_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaTwibbon">
                                          <input type="number" min="0" name="assessment9" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div>    
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaTwibbon" aria-expanded="false" aria-controls="qaTwibbon" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="Twibbon" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid/IG Private/Postingan dihapus/Bukan 1st Account<br>
                                          3 : Hanya mengupload slide satu saja, tidak mengupload slide dua (poster)<br>
                                          5 : <br>
                                          - Bukti Valid <br>
                                          - Postingan masih di keep<br>
                                          - Upload di First Account
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Repost Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->repost_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaRepost">
                                          <input type="number" min="0" name="assessment10" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaRepost" aria-expanded="false" aria-controls="qaRepost" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Repost Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="row col-md-12 mt-5">
                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Tag Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->tag_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaTag">
                                          <input type="number" min="0" name="assessment11" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaTag" aria-expanded="false" aria-controls="qaTag" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Tag Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-5">
                                    <label for="trigger" class="form-label font-bold">Subscribe Screenshot</label>
                                    <div class="mb-3 thumbnail-container-edit">
                                      <div class="w-full">
                                        <div class="drag-area-old">
                                          <img src="{{ asset("storage/$mentee->subscribe_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                        </div>
                                        <div class="collapse" id="qaSubscribe">
                                          <input type="number" min="0" name="assessment12" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                      </div> 
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex mt-2">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qaSubscribe" aria-expanded="false" aria-controls="qaSubscribe" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Subscribe Screenshot" data-bs-html="true" data-bs-content="<p>
                                          0 :Bukti tidak valid (Foto hanya asal ambil di gallery)<br>
                                          5 : Bukti valid
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Tell About Yourself</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q1 }}</textarea>
                                        <div class="collapse" id="qa3">
                                            <input type="number" min="0" name="assessment1" max="5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa3" aria-expanded="false" aria-controls="qa3" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Identity Personal" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Hanya nama & memiliki <b>< 3 kalimat</b><br>
                                            2 : Hanya nama, statusnya saat ini, dan <b>penjelasan yang singkat</b> yakni <b>< 3 kalimat</b><br>
                                            3 : Hanya poin dan penjelasan <b>singkat</b> mengenai <b>status, univ, dan kelebihan diri. Memiliki < 4 kalimat</b> <br>
                                            4 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, serta interest. Memiliki < 5 kalimat.</b><br>
                                            5 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, interest, serta pengalaman</b>. Memiliki <b> 5 kalimat.</b><br>" data-bs-html="true"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Why You Interest to Join MUA Vol. 9?</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q2 }}</textarea>
                                        <div class="collapse" id="qa4">
                                            <input type="number" min="0" max="5 " name="assessment2" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name) 
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa4" aria-expanded="false" aria-controls="qa4" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Motivation, Achievement Orientation" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                            2 :  <br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan</b> mengikuti mentoring<br>
                                            3 : <br>
                                            - Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi </b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan serta harapan/capaian yang akan didapat</b> setelah mengikuti mentoring<br>
                                            4 : <br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi </b>mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring 3. Memiliki <b>< 5 Kalimat</b><br>
                                            5 : <br>
                                            - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi</b> mengikuti mentoring<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring <b>pada kelas yang dipilih</b><br>
                                            - Memiliki <b>> 5 kalimat</b><br>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Your Busy Right Now</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q3 }}</textarea>
                                        <div class="collapse" id="qa5">
                                            <input type="number" min="0" max="5" name="assessment3" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa5" aria-expanded="false" aria-controls="qa5" class="btn btn-success" data-bs-toggle="modal"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Business" data-bs-html="true" data-bs-content="<p>
                                            1 : Memiliki lebih dari <b>8</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            2 :  Memiliki <b>6-7</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            3 : Memiliki <b>4-5</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            4 : Memiliki <b>3</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                            5 : Tidak memiliki kesibukan atau Memiliki <b>1-2</b> kesibukan dalam satu waktu (termasuk akademik)<br></p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">How Do You Manage Your Time Between MUA Vol. 9 And Others?</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q4 }}</textarea>
                                        <div class="collapse" id="qa6">
                                            <input type="number" min="0" max="5" name="assessment4" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa6" aria-expanded="false" aria-controls="qa6" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Organizational Commitment, Self Control, Flexibility" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat poin <b>singkat</b> mengenai <b>cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            2 :  Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            3 : <br>
                                            - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan <b>singkat</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            4 : <br>
                                            - Terdapat penjelasan mengenai <b>list prioritas</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat poin dan penjelasan <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Memiliki <b>< 5 kalimat</b><br>
                                            5 : <br>
                                            - Terdapat penjelasan <b>secara rinci</b> mengenai <b>list prioritas</b> dalam mengerjakan aktivitas dan penempatan MagangUpdate Academy Vol.9<br>
                                            - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Terdapat penjelasan <b>secara rinci</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                            - Memiliki <b>> 6 kalimat</b>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Commitment (1-9)</label>
                                <div class="flex gap-1">
                                    <div class="w-full">
                                        <input type="text" name="" readonly value="{{ $mentee->q5 }}" id="" class="form-control">
                                        <div class="collapse" id="qa7">
                                            <input type="number" min="0" max="5" name="assessment5" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa7" aria-expanded="false" aria-controls="qa7" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Commitment" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : 1-2<br>
                                            2 : 3-4<br>
                                            3 : 5-6<br>
                                            4 : 7-8<br>
                                            5 : 9
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Realization of Your Commitment Value to MUA Vol. 9</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q6 }}</textarea>
                                        <div class="collapse" id="qa8">
                                            <input type="number" min="0" max="5" name="assessment6" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa8" aria-expanded="false" aria-controls="qa8" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Commitment's Realization" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Tidak terdapat <b>bentuk komitmen</b>. Melainkan hanya menjelaskan bahwa mereka berkomitmen<br>
                                            2 :  Terdapat penjelasan secara <b>singkat</b> mengenai komitmen yang diberikan. Memiliki <b>< 2 kalimat</b><br>
                                            3 : Terdapat penjelasan secara <b>singkat</b> bahwa mereka berkomitmen dan <b>memberikan bentuk komitmennya saja tanpa adanya penjelasan.</b><br>
                                            4 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>< 3 kalimat</b><br>
                                            5 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>> 3 kalimat</b><br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Hope Joining MUA Vol. 9</label>
                                <div class="flex flex-row gap-1"> 
                                    <div class="w-full">
                                        <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q7 }}</textarea>
                                        <div class="collapse" id="qa9">
                                            <input type="number" min="0" max="5" name="assessment7" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex flex-col gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa9" aria-expanded="false" aria-controls="qa9" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary -mt-[20px]" data-bs-toggle="popover" data-bs-title="Achievement Oriantation" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak ada jawaban<br>
                                            1 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>1 kalimat</b> saja namun kurang jelas<br>
                                            2 :  Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>< 2 kalimat namun jelas</b><br>
                                            3 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9 secara umum</b>. Memiliki <b>< 3 kalimat</b><br>
                                            4 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih</b>.<br>
                                            5 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih dan passion ataupun kemampuan yang dimiliki</b>. Memiliki <b>> 5 Kalimat</b><br>
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label font-bold">Will You Contribute Actively to Open Cam During The Class?</label>
                                <div class="flex gap-1">
                                    <div class="w-full">
                                        <input type="text" name="" readonly value="@if($mentee->q8 == '1') Yes @else No @endif" id="" class="form-control">
                                        <div class="collapse" id="qa10">
                                            <input type="number" min="0" max="5" name="assessment8" class="form-control mt-1" placeholder="Score" value="">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                    <div class="flex gap-0">
                                        
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#qa10" aria-expanded="false" aria-controls="qa10" class="btn btn-success"><i class='bx bx-task'></i></button>&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Open Camera" data-bs-html="true" data-bs-content="<p>
                                            0 : Tidak<br>
                                            5 : Ya
                                            </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <input type="hidden" name="menteeID" value="{{ $mentee->menteeID }}">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save Assessment</button>
                                @endif
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            @if($mentee->assessmentMenteeApplication != null)
            <div class="modal fade" id="editModal-{{ $mentee->menteeID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mentee Assessment</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="post" action={{ route('dashboard.mua.assessment.update') }}>
                          @csrf
                          @method('PUT')
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Full Name</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->full_name }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Email</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->email }}">
                              </div>
                          </div>
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">University</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->university }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Major</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->major }}">
                              </div>
                          </div>
                          <div class="row col-md-12">
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Whatsapp Number</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->whatsapp_number }}">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="exampleFormControlInput1" class="form-label font-bold">Instagram</label>
                                  <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->instagram }}">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label font-bold">First Class</label>
                              <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->firstClass->class_name }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose First Class</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_first_class }}</textarea>
                                      <input type="number" name="assessment0" min="0" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment0 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                          2 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          3 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                          4 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          5 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>

                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label font-bold">Second Class</label>
                              <input type="email" class="form-control" readonly id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->secondClass->class_name }}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Reason to Choose Second Class</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->reason_second_class }}</textarea>
                                          <input type="number" min="0" name="assessment01" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment01 }}">
                                  </div>
                                
                                @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Motivation" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>singkat</b><br>
                                          2 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas  secara <b>singkat</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          3 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, tetapi tanpa alasan jelas</b><br>
                                          4 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara jelas<br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          5 : <br>
                                          - <b>Terdapat</b> penjelasan <b>tujuan</b> memilih kelas secara <b>jelas</b><br>
                                          - <b>Alasan</b> memilih kelas <b>jelas</b><br>
                                          - Terdapat <b>motivasi tinggi, dengan</b> adanya <b>penjelasan dan rincian yang jelas</b> terkait motivasi tersebut<br>
                                          - Terdapat <b>penjelasan secara jelas</b> mengenai <b>hubungan dari kelas tersebut </b>dengan <b>passion</b> yang dimiliki<br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                 @endif
                              </div>
                          </div>
                          <label for="trigger" class="form-label font-bold">CV</label>
                          <div class="mb-3">
                            <div class="w-full">
                              <object
                                data="{{ asset("storage/$mentee->cv") }}"
                                type="application/pdf"
                                width="100%"
                                height="500px"
                              >
                                <iframe
                                  src="{{ asset("storage/$mentee->cv") }}"
                                  width="100%"
                                  height="100%"
                                  style="border: none;"
                                >
                                  <p>
                                    Your browser does not support PDFs.
                                    <a href="{{ asset("storage/$mentee->cv") }}">Download the PDF</a>
                                    .
                                  </p>
                                </iframe>
                              </object>
                                  <input type="number" min="0" name="assessment02" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment02 }}">
                          </div>
                          </div>
                          @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                          <div class="flex mt-2">
                              
                              <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="CV" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>
                                  0 : Tidak ada jawaban<br>
                                  1 : <br>
                                  - <b>Tidak</b> ada pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  2 : <br>
                                  - <b>Minim</b> pengalaman yang bekaitan dengan kelas yang dipilih<br>
                                  - Penjelasan pengalaman <b>tidak komprehensif</b>><br>
                                  - Minim penjelasan dan informasi yang bisa didapatkan<br>
                                  3 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>50% pengalaman relevan</b> dengan kelas yang dipilih (Setengah dari pengalamannya relate dengan kelas)<br>
                                  - Penjelasan pengalaman cukup <b>komprehensif</b><br>
                                  - Informasi yang didapatkan <b>cukup</b><br>
                                  4 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Sebagian besar pengalamannya relate dengan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  5 : <br>
                                  - Terdapat <b>minimal 5</b> pengalaman pada CV, dengan > <b>70% pengalaman relevan</b> dengan kelas yang dipilih (Hampir Seluruh/semua pengalamannya relate degnan kelas yang dipilih)<br>
                                  - Penjelasan pengalaman <b>komprehensif</b> (terdapat penjelasan mengenai pencapaian di setiap pengalaman)<br>
                                  - Pencapaian yang <b>baik</b><br>
                                  </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                          </div>
                          @endif
                          <div class="row col-md-12 mt-5">
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Twibbon Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->twibbon_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment9" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment9 }}">
                                    </div>    
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="Twibbon" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid/IG Private/Postingan dihapus/Bukan 1st Account<br>
                                        3 : Hanya mengupload slide satu saja, tidak mengupload slide dua (poster)<br>
                                        5 : <br>
                                        - Bukti Valid <br>
                                        - Postingan masih di keep<br>
                                        - Upload di First Account
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                              
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Repost Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->repost_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment10" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment10 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Repost Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                  
                          <div class="row col-md-12 mt-5">
                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Tag Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->tag_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment11" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment11 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Tag Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 : Bukti tidak valid (Foto hanya asal ambil dari gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>

                              <div class="col-md-5">
                                  <label for="trigger" class="form-label font-bold">Subscribe Screenshot</label>
                                  <div class="mb-3 thumbnail-container-edit">
                                    <div class="w-full">
                                      <div class="drag-area-old">
                                        <img src="{{ asset("storage/$mentee->subscribe_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                                      </div>
                                        <input type="number" min="0" name="assessment12" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment12 }}">
                                    </div> 
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex mt-2">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Subscribe Screenshot" data-bs-html="true" data-bs-content="<p>
                                        0 :Bukti tidak valid (Foto hanya asal ambil di gallery)<br>
                                        5 : Bukti valid
                                        </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3 mt-4">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Tell About Yourself</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q1 }}</textarea>
                                          <input type="number" min="0" name="assessment1" max="5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment1 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Identity Personal" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Hanya nama & memiliki <b>< 3 kalimat</b><br>
                                          2 : Hanya nama, statusnya saat ini, dan <b>penjelasan yang singkat</b> yakni <b>< 3 kalimat</b><br>
                                          3 : Hanya poin dan penjelasan <b>singkat</b> mengenai <b>status, univ, dan kelebihan diri. Memiliki < 4 kalimat</b> <br>
                                          4 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, serta interest. Memiliki < 5 kalimat.</b><br>
                                          5 : Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>status, univ, kelebihan diri (seperti tekun, suka mempelajari hal baru, dll), passion, interest, serta pengalaman</b>. Memiliki <b> 5 kalimat.</b><br>" data-bs-html="true"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Why You Interest to Join MUA Vol. 9?</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q2 }}</textarea>
                                      <input type="number" min="0" max="5 " name="assessment2" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment2 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Motivation, Achievement Orientation" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                          2 :  <br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>motivasi</b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan</b> mengikuti mentoring<br>
                                          3 : <br>
                                          - Terdapat poin dan penjelasan <b>secara  singkat</b> mengenai <b>motivasi </b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>tujuan serta harapan/capaian yang akan didapat</b> setelah mengikuti mentoring<br>
                                          4 : <br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi </b>mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring 3. Memiliki <b>< 5 Kalimat</b><br>
                                          5 : <br>
                                          - Terdapat poin dan penjelasan <b>secara rinci dan jelas mengenai motivasi</b> mengikuti mentoring<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>tujuan dan harapan/capaian yang akan didapat</b> setelah mengikuti mentoring <b>pada kelas yang dipilih</b><br>
                                          - Memiliki <b>> 5 kalimat</b><br>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Your Busy Right Now</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q3 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment3" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment3 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Business" data-bs-html="true" data-bs-content="<p>
                                          1 : Memiliki lebih dari <b>8</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          2 :  Memiliki <b>6-7</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          3 : Memiliki <b>4-5</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          4 : Memiliki <b>3</b> kesibukan dalam satu waktu (termasuk akademik)<br>
                                          5 : Tidak memiliki kesibukan atau Memiliki <b>1-2</b> kesibukan dalam satu waktu (termasuk akademik)<br></p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">How Do You Manage Your Time Between MUA Vol. 9 And Others?</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q4 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment4" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment4 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Organizational Commitment, Self Control, Flexibility" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat poin <b>singkat</b> mengenai <b>cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          2 :  Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          3 : <br>
                                          - Terdapat poin dan penjelasan <b>secara singkat</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan <b>singkat</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          4 : <br>
                                          - Terdapat penjelasan mengenai <b>list prioritas</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat poin dan penjelasan <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Memiliki <b>< 5 kalimat</b><br>
                                          5 : <br>
                                          - Terdapat penjelasan <b>secara rinci</b> mengenai <b>list prioritas</b> dalam mengerjakan aktivitas dan penempatan MagangUpdate Academy Vol.9<br>
                                          - Terdapat poin dan penjelasan <b>secara rinci</b> mengenai <b>cara-cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Terdapat penjelasan <b>secara rinci</b> mengenai <b>implementasi cara membagi waktu</b> dalam mengerjakan aktivitas<br>
                                          - Memiliki <b>> 6 kalimat</b>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Commitment (1-9)</label>
                              <div class="flex gap-1">
                                  <div class="w-full">
                                      <input type="text" name="" readonly value="{{ $mentee->q5 }}" id="" class="form-control">
                                          <input type="number" min="0" max="5" name="assessment5" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment5 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex">
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-title="Commitment" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : 1-2<br>
                                          2 : 3-4<br>
                                          3 : 5-6<br>
                                          4 : 7-8<br>
                                          5 : 9
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Realization of Your Commitment Value to MUA Vol. 9</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q6 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment6" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment6 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Commitment's Realization" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Tidak terdapat <b>bentuk komitmen</b>. Melainkan hanya menjelaskan bahwa mereka berkomitmen<br>
                                          2 :  Terdapat penjelasan secara <b>singkat</b> mengenai komitmen yang diberikan. Memiliki <b>< 2 kalimat</b><br>
                                          3 : Terdapat penjelasan secara <b>singkat</b> bahwa mereka berkomitmen dan <b>memberikan bentuk komitmennya saja tanpa adanya penjelasan.</b><br>
                                          4 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>< 3 kalimat</b><br>
                                          5 : Terdapat pernyataan <b>bahwa mereka berkomitmen</b> dan terdapat penjelasan yang jelas mengenai komitmen yang diberikan. Memiliki <b>> 3 kalimat</b><br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Hope Joining MUA Vol. 9</label>
                              <div class="flex flex-row gap-1"> 
                                  <div class="w-full">
                                      <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="10">{{ $mentee->q7 }}</textarea>
                                          <input type="number" min="0" max="5" name="assessment7" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment7 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex flex-col gap-0">
                                      
                                      <button type="button" class="btn btn-secondary " data-bs-toggle="popover" data-bs-title="Achievement Oriantation" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak ada jawaban<br>
                                          1 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>1 kalimat</b> saja namun kurang jelas<br>
                                          2 :  Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b>. Memiliki <b>< 2 kalimat namun jelas</b><br>
                                          3 : Terdapat penjelasan <b>singkat</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9 secara umum</b>. Memiliki <b>< 3 kalimat</b><br>
                                          4 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih</b>.<br>
                                          5 : Terdapat penjelasan <b>secara spesifik</b> mengenai <b>harapan setelah mengikuti MagangUpdate Academy Vol.9</b> yang <b>relevan dengan kelas yang dipilih dan passion ataupun kemampuan yang dimiliki</b>. Memiliki <b>> 5 Kalimat</b><br>
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label font-bold">Will You Contribute Actively to Open Cam During The Class?</label>
                              <div class="flex gap-1">
                                  <div class="w-full">
                                      <input type="text" name="" readonly value="@if($mentee->q8 == '1') Yes @else No @endif" id="" class="form-control">
                                          <input type="number" min="0" max="5" name="assessment8" class="form-control mt-1" placeholder="Score" value="{{ $mentee->assessmentMenteeApplication->assessment8 }}">
                                  </div>
                                  @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                                  <div class="flex gap-0">
                                      <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Open Camera" data-bs-html="true" data-bs-content="<p>
                                          0 : Tidak<br>
                                          5 : Ya
                                          </p>"><i class='bx bx-info-circle'></i></button>&nbsp;
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                              <input type="hidden" name="menteeID" value="{{ $mentee->menteeID }}">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              @if(Auth::user()->role_name === 'PIC Class' && Auth::user()->class === $class->class_name)
                              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update Assessment</button>
                              @endif
                      </div>
                  </form>
                  </div>
              </div>
              @endif
          </div>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="text-center">
            <th></th>
            <!--<th>Mentee ID</th>-->
            <th>Full Name</th>
            <th class="py-3">Action</th>
            <th>Score</th>
            <th>Email</th>
            <th>University At</th>
            <th>Major</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Whatsapp Number</th>
            <th>Instagram</th>
            <th>Registered At</th>
        </tr>
    </tfoot>
</table>
          </div>
        </div>
      </div>
  </section>
@endsection