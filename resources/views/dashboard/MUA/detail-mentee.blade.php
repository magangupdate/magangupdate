@extends('dashboard.MUA.layouts.main', [
    'title' => 'Mentee Detail',
    'active' => 'Mentees'
])

@section('content')
<section class="p-3">
    <header>
      <h3>Mentees</h3>
      <p>Manage your article and see it growth</p>
    </header>
    <div>
        <div class="row col-md-12">
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->full_name }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->email }}">
            </div>
        </div>
        <div class="row col-md-12">
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">University</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->university }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Major</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->major }}">
            </div>
        </div>
        <div class="row col-md-12">
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Whatsapp Number</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->whatsapp_number }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->instagram }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">First Class</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->first_class }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Reason to Choose First Class</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->reason_first_class }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Second Class</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $mentee->second_class }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Reason to Choose Second Class</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->reason_second_class }}</textarea>
        </div>
        <label for="trigger" class="form-label">CV</label>
        <div class="mb-3 thumbnail-container-edit">
            <div class="drag-area-old">
                <img src='' class="h-fit" style="width: 100%;"  alt="" />
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-5">
                <label for="trigger" class="form-label">Twibbon Screenshot</label>
                <div class="mb-3 thumbnail-container-edit">
                    <div class="drag-area-old">
                        <img src="{{ asset("storage/$mentee->twibbon_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                    </div>
                </div>
            </div>
            
            <div class="col-md-5">
                <label for="trigger" class="form-label">Repost Screenshot</label>
                <div class="mb-3 thumbnail-container-edit">
                    <div class="drag-area-old">
                        <img src="{{ asset("storage/$mentee->repost_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12 mt-5">
            <div class="col-md-5">
                <label for="trigger" class="form-label">Tag Screenshot</label>
                <div class="mb-3 thumbnail-container-edit">
                    <div class="drag-area-old">
                        <img src="{{ asset("storage/$mentee->tag_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <label for="trigger" class="form-label">Subscribe Screenshot</label>
                <div class="mb-3 thumbnail-container-edit">
                    <div class="drag-area-old">
                        <img src="{{ asset("storage/$mentee->subscribe_screenshot") }}" class="h-fit" style="width: 100%;"  alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tell About Yourself</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q1 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Why You Interest to Join MUA Vol. 9</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q2 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Your Busy Right Now</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q3 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">How Do You Manage Your Time Between MUA Vol. 9 And Others?</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q4 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Commitment (1-9)</label>
            <input type="number" name="" value="{{ $mentee->q5 }}" id="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Realization of Your Commitment Value to MUA Vol. 9</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q6 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Hope Joining MUA Vol. 9</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q7 }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Will You Contribute Actively to Open Cam During The Class?</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $mentee->q8 }}</textarea>
        </div>
    </div>
</section>
@endsection