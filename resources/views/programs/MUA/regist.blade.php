@extends('MUA.layouts.main', [
    'title' => 'Registration Mentee - MagangUpdate Academy (MUA) Vol. 9',
    'active' => 'MUA',
    'heroTitle' => "Find & Start Your<br> Journey From Here!",
    'metaDescription' => "Search the information by company's name, type of working, and etc",
    'heroButton' => 'Regist',
    'description' => '
        
    ',
    'metaKeywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',
    'metaCanonical' =>  'http://localhost:8000/MUAVol9'
])

@section('content')
<section class="mx-auto">
   <div class="flex justify-center px-6 mt-24">
      <div class="w-full max-w-7xl flex mb-16">
         {{-- lg:w-7/12 --}}
         <div
            class="w-full h-auto hidden lg:block lg:w-11/12 bg-cover rounded-l-lg bg-transparent"
            style="background-image: url('https://i.postimg.cc/sgRS4LZ9/pintu-ajaib.png'); background-size: 45rem auto; background-repeat: no-repeat;"
         ></div>
         <div class="w-full md:h-[108vh] lg:h-[108vh] md:max-w-7xl mx-auto p-5 rounded-3xl bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] md:overflow-scroll regist-form">

            <form action="{{ route('mua.mentees.store') }}" method="post" enctype="multipart/form-data" autocomplete="off" class="px-4 md:px-8 pt-6 pb-8 mb-4 rounded registration-form">
               @csrf
               {{-- Personal Info --}}
               <div class="page form-section current slide-page">
                  <img src="{{ asset('assets/images/logos/logo-full.webp') }}" class="w-[80px] mb-3 md:mb-0 md:w-[200px] md:-ml-25 h-auto mx-auto mt-4" alt="MagangUpdate Academy's logo">
                  <h2 class="text-[30px] md:text-[40px] font-bold text-white text-center mt-4 leading-[30px] mb-3 md:leading-[40px] mx-3 md:mx-0 font-gilroySemiBold max-w-2xl md:w-full">Register to MUA Vol. 9</h2>
                  <p class="hero-description mt-2 text-[#A0AABA] text-[13px] text-center lg:text-[13px] w-full md:w-[25rem] mx-auto font-gilroyRegular">
                     MagangUpdate Academy is a free mentoring program with professional mentors to provide an exclusive class.
                  </p>

                  <div class="mb-4 mt-5">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Email Address</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="email" value="{{ old('email') }}" name="email" placeholder="mike@gmail.com">
                     @error('email')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Full Name</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="full_name" value="{{ old('full_name') }}" placeholder="MagangUpdate">
                     @error('full_name')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Univesity</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="university" value="{{ old('university') }}" placeholder="Universitas Indonesia">
                     @error('university')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Major/Program Study</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="major" value="{{ old('major') }}" placeholder="Kedokteran">
                     @error('major')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Whatsapp Number</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="number" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="628098080803">
                     @error('whatsapp_number')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Instagram Username</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="instagram" value="{{ old('instagram') }}" placeholder="magangupdate">
                     @error('instagram')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
               </div>

               {{-- Class Info Choice --}}
               <div class="page form-section">
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">First Choice Class</div>
                     <select name="first_class" id="first_class" class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">
                        <option value="100">Select Class</option>
                        @foreach($classes as $class)
                           <option value="{{ $class->classID }}" {{ ($class->classID == old('first_class')) ? 'selected' : '' }}>{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('first_class')
                       <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Reason Choose The Class In First Choice</div>
                     <textarea name="reason_first_class" id="reason_first_class" cols="30" rows="10" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('reason_first_class') }}</textarea>
                     @error('reason_first_class')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Second Choice Class</div>
                     <select name="second_class" id="second_class" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">
                        <option value="100">Select Class</option>
                        @foreach($classes as $class)
                           <option value="{{ $class->classID }}" {{ ($class->classID == old('second_class')) ? 'selected' : '' }}>{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    <p class="text-[#eee] mt-2 text-[13px]">*Choose another class, not same like first choice</p>
                    @error('second_class')
                       <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Reason Choose The Class In Second Choice</div>
                     <textarea name="reason_second_class" id="reason_second_class" cols="30" rows="10" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('reason_second_class') }}</textarea>
                     @error('reason_second_class')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
               </div>

               {{-- Attachment Documents --}}
               <div class="page form-section">
                  <div class="mb-4">
                     <fieldset class="w-full space-y-1 dark:text-gray-100">
                        <div class="text-sm font-bold text-gray-100 tracking-wide">Curriculum Vitae (CV)</div>
                        <div class="flex">
                           <input type="file" name="cv" id="cv" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 dark:text-gray-400 w-full">
                        </div>
                        <p class="text-[#eee] mt-2 text-[13px]">*File type must be PDF</p>
                        @error('cv')
                           <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                     </fieldset>
                  </div>

                  <div class="mb-4">
                     <fieldset class="w-full space-y-1 dark:text-gray-100">
                        <div class="text-sm font-bold text-gray-100 tracking-wide">Proof of Uploading Twibbon</div>
                        <div class="flex">
                           <input type="file" name="twibbon_screenshot" id="twibbon_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 dark:text-gray-400 w-full">
                        </div>
                        <p class="text-[#eee] mt-2 text-[13px]">*Allowed file type: png, jpg, jpeg</p>
                        @error('twibbon_screenshot')
                           <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                     </fieldset>
                  </div>

                  <div class="mb-4">
                     <fieldset class="w-full space-y-1 dark:text-gray-100">
                        <div class="text-sm font-bold text-gray-100 tracking-wide">Proof of Reposting MUA Vol.9 Post</div>
                        <div class="flex">
                           <input type="file" name="repost_screenshot" id="repost_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 dark:text-gray-400 w-full">
                        </div>
                        <p class="text-[#eee] mt-2 text-[13px]">*Allowed file type: png, jpg, jpeg</p>
                        @error('repost_screenshot')
                           <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                     </fieldset>
                  </div>

                  <div class="mb-4">
                     <fieldset class="w-full space-y-1 dark:text-gray-100">
                        <div class="text-sm font-bold text-gray-100 tracking-wide">Proof of Tagging Friends in MUA Vol. 9 Post</div>
                        <div class="flex">
                           <input type="file" name="tag_screenshot" id="tag_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 dark:text-gray-400 w-full">
                        </div>
                        <p class="text-[#eee] mt-2 text-[13px]">*Allowed file type: png, jpg, jpeg</p>
                        @error('tag_screenshot')
                           <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                     </fieldset>
                  </div>

                  <div class="mb-4">
                     <fieldset class="w-full space-y-1 dark:text-gray-100">
                        <div class="text-sm font-bold text-gray-100 tracking-wide">Proof of Subscribing MagangUpdate Youtube Channel</div>
                        <div class="flex">
                           <input type="file" name="subscribe_screenshot" id="subscribe_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 dark:text-gray-400 w-full">
                        </div>
                        <p class="text-[#eee] mt-2 text-[13px]">*Allowed file type: png, jpg, jpeg</p>
                        @error('subscribe_screenshot')
                           <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                     </fieldset>
                  </div>
               </div>

               {{-- About Yourself --}}
               <div class="page form-section">
                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Tell Us About Yourself</div>
                     <textarea name="q1" id="q1" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q1') }}</textarea>
                     @error('q1')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Why you interest to join MUA Vol. 9?</div>
                     <textarea name="q2" id="q2" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q2') }}</textarea>
                     @error('q2')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Your Busy Now</div>
                     <textarea name="q3" id="q3" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q3') }}</textarea>
                     <div class="flex flex-col space-y-1">
                        <p class="text-[#eee] mt-2 text-[13px]">*Format: Jabatan - Organisasi/Kepanitian/Magang - Periode</p>
                        <p class="text-[#eee] mt-2 text-[13px]">*Fill with (-) if there are no busy right now</p>
                     </div>
                     @error('q3')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">How Do You Manage Your Time Between MUA Vol. 9 and others?</div>
                     <textarea name="q4" id="q4" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q4') }}</textarea>
                     @error('q4')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Commitment Joining MUA Vol. 9 (0-9)</div>
                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="number" value="{{ old('q5') }}" name="q5" placeholder="Your Commitement (0-9)">
                     @error('q5')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Realization of Commitment You Input Previously to MUA Vol. 9</div>
                     <textarea name="q6" id="q6" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q6') }}</textarea>
                     @error('q6')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Hope Joining MUA Vol. 9</div>
                     <textarea name="q7" id="q7" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q7') }}</textarea>
                     @error('q7')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>

                  <div class="mb-4">
                     <div class="text-sm font-bold text-gray-100 tracking-wide">Will You Contribute to Actively Open Camera During The Class?</div>
                     <div class="flex gap-10">
                        <div class="inline-flex items-center">
                          <label
                            class="relative flex cursor-pointer items-center rounded-full p-3"
                            for="html"
                            data-ripple-dark="true"
                          >
                            <input
                              id="html"
                              name="q8"
                              type="radio"
                              value="1"
                              class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-violet-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-violet-400 checked:before:bg-violet-400 hover:before:opacity-10"
                            />
                            <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-violet-400 opacity-0 transition-opacity peer-checked:opacity-100">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                              >
                                <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                              </svg>
                            </div>
                          </label>
                          <label
                            class="mt-px cursor-pointer select-none font-light text-gray-200"
                            for="html"
                          >
                            Yes
                          </label>
                        </div>
                        <div class="inline-flex items-center">
                          <label
                            class="relative flex cursor-pointer items-center rounded-full p-3"
                            for="react"
                            data-ripple-dark="true"
                          >
                            <input
                              id="react"
                              name="q8"
                              type="radio"
                              value="0"
                              class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-violet-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-violet-400 checked:before:bg-violet-400 hover:before:opacity-10"
                            />
                            <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-violet-400 opacity-0 transition-opacity peer-checked:opacity-100">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                              >
                                <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                              </svg>
                            </div>
                          </label>
                          <label
                            class="mt-px cursor-pointer select-none font-light text-gray-200"
                            for="react"
                          >
                            No
                          </label>
                        </div>
                      </div>
                     @error('q8')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                     @enderror
                  </div>
               </div>

               <div class="form-navigation mt-3 flex gap-2">
                  <button
                        class="previous w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"
                        type="button"
                     >
                        Previous
                     </button>
                  <button
                        class="next w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"
                        type="button"
                     >
                        Next
                     </button>
                  <button
                     class="w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"
                     type="submit"
                  >
                     Submit
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<div class="stars-wrapper w-full -z-20 top-0 absolute mt-[5vh] md:-mt-[5vh]">
   <div class="stars "></div>
 </div>

<img src="https://i.postimg.cc/LsrZV66k/Pusaran_sihir-min_1_(1)-min.png" class="absolute w-[1000px] h-[1000px] -z-50 bottom-0 opacity-30 object-cover block md:hidden">
<img src="https://i.postimg.cc/qB63X8x3/gradient-compressed_1-min.png" class="absolute -z-[100] -top-[10rem] left-0 md:-left-[15rem] md:-left-[10rem] object-cover w-[1000px] h-[1000px]" alt="">
@endsection