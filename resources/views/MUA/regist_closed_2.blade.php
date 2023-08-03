<!--@extends('MUA.layouts.main', [-->
<!--    'title' => 'Pendaftaran Mentee - MagangUpdate Academy (MUA) Vol. 9',-->
<!--    'active' => 'MUA',-->
<!--    'heroTitle' => "Find & Start Your<br> Journey From Here!",-->
<!--    'metaDescription' => "MagangUpdate Academy adalah program mentoring gratis dengan mentor profesional untuk memberikan pengembangan keterampilan eksklusif untuk tujuan pekerjaan tertentu. Ada 8 kelas yang dapat dipilih oleh para mentee untuk menyelami lebih dalam keajaiban MagangUpdate Academy Vol. 9 Kelas pendampingan. Mentee terbaik akan mendapatkan kelas ekstra eksklusif dengan Mentor spesial kami.",-->
<!--    'heroButton' => 'Regist',-->
<!--    'description' => '-->
        
<!--    ',-->
<!--    'metaKeywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',-->
<!--    'metaCanonical' =>  'https://magangupdate.id/MUAVol9'-->
<!--])-->

<!--@section('content')-->
<!--<section class="mx-auto">-->
<!--   <div class="flex justify-center px-6 mt-24">-->
<!--      <div class="w-full max-w-7xl flex mb-16">-->
<!--         {{-- lg:w-7/12 --}}-->
<!--         <div-->
<!--            class="w-full h-auto hidden lg:block lg:w-11/12 bg-cover rounded-l-lg bg-transparent"-->
<!--            style="background-image: url('https://i.postimg.cc/RhzbJP76/Pintu-Ajaib-10x-min-1-1-min.png'); background-size: 45rem auto; background-repeat: no-repeat;"-->
<!--         ></div>-->
<!--         <div class="w-full md:h-[108vh] lg:h-[108vh] md:max-w-7xl mx-auto p-5 rounded-3xl bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] md:overflow-scroll regist-form">-->

<!--            <form action="{{ route('mua.mentees.store') }}" method="post" enctype="multipart/form-data" autocomplete="off" class="px-4 md:px-8 pt-6 pb-8 mb-4 rounded registration-form">-->
<!--               @csrf-->
<!--               {{-- Personal Info --}}-->
<!--               <div class="page form-section current slide-page">-->
<!--                  <a href="/">-->
<!--                     <img src="https://i.postimg.cc/Jn82G6cy/logo-full-1-1-min.png" class="w-[80px] mb-3 md:mb-0 md:w-[200px] md:-ml-25 h-auto mx-auto mt-4" alt="MagangUpdate Academy's logo">-->
<!--                 </a>-->
<!--                  <h2 class="text-[30px] md:text-[40px] font-bold text-white text-center mt-4 leading-[30px] mb-3 md:leading-[40px] mx-3 md:mx-0 font-gilroySemiBold max-w-2xl md:w-full">Pendaftaran Mentee<br> MUA Vol. 9</h2>-->
<!--                  <p class="hero-description text-caution-regist mt-2 text-[#A0AABA] text-[13px] text-center lg:text-[13px] w-full md:w-[25rem] mx-auto font-gilroyRegular">-->
<!--                     Hai, Hunters! Mari duduk & bersantai sambil mengisi formulir ini. Agar jawaban Anda tetap tersimpan, harap jangan keluar/kembali dari tab ini sebelum hunters mengirimkan hasilnya. Terima kasih!-->
<!--                  </p>-->

<!--                  <div class="mb-4 mt-5">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Alamat Email</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="email" value="{{ old('email') }}" name="email" placeholder="mike@gmail.com">-->
<!--                     @error('email')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Nama Lengkap</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="full_name" value="{{ old('full_name') }}" placeholder="MagangUpdate">-->
<!--                     @error('full_name')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Asal Universitas/Institusi</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="university" value="{{ old('university') }}" placeholder="Universitas Indonesia">-->
<!--                     @error('university')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Jurusan/Program Studi</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="major" value="{{ old('major') }}" placeholder="Kedokteran">-->
<!--                     @error('major')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Nomor Whatsapp</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="number" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="628098080803">-->
<!--                     @error('whatsapp_number')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Username Instagram</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" type="text" name="instagram" value="{{ old('instagram') }}" placeholder="magangupdate">-->
<!--                     @error('instagram')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
<!--               </div>-->

<!--               {{-- Class Info Choice --}}-->
<!--               <div class="page form-section">-->
                  
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Kelas Pilihan Pertama</div>-->
<!--                     <select name="first_class" id="first_class" class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-gray-200 dark:text-gray-200 bg-dark-900">-->
<!--                        <option value="100">Pilih Kelas</option>-->
<!--                        @foreach($classes as $class)-->
<!--                           <option value="{{ $class->classID }}" {{ ($class->classID == old('first_class')) ? 'selected' : '' }}>{{ $class->class_name }}</option>-->
<!--                        @endforeach-->
<!--                    </select>-->
<!--                    <p class="hero-description text-caution-regist mt-4 mb-4  text-[#A0AABA] text-[13px] text-left lg:text-[13px] w-full md:w-[30rem] font-gilroyRegular">-->
<!--                     *Hai, Hunters! Yuk lihat dan download booklet mentee terlebih dahulu untuk mengetahui kelas apa saja yang bisa kamu pilih <a class="text-violet-400" href="https://drive.google.com/file/d/128T7ZjNvY-RT3CjRgfIgFBAHD7ID-y69/view?usp=drive_link" target="_blank">disini</a>-->
<!--                  </p>-->
<!--                    @error('first_class')-->
<!--                       <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                    @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Alasan Memilih Kelas Pertama</div>-->
<!--                     <textarea name="reason_first_class" id="reason_first_class" cols="30" rows="10" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('reason_first_class') }}</textarea>-->
<!--                     @error('reason_first_class')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
   
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Kelas Pilihan Kedua</div>-->
<!--                     <select name="second_class" id="second_class" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-gray-200 dark:text-gray-200 bg-dark-900">-->
<!--                        <option value="100">Pilih Kelas</option>-->
<!--                        @foreach($classes as $class)-->
<!--                           <option value="{{ $class->classID }}" {{ ($class->classID == old('second_class')) ? 'selected' : '' }}>{{ $class->class_name }}</option>-->
<!--                        @endforeach-->
<!--                    </select>-->
<!--                    <p class="text-[#eee] mt-2 text-[13px]">*Pilih kelas yang berbeda dari pilihan pertama</p>-->
<!--                    @error('second_class')-->
<!--                       <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                    @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Alasan Memilih Kelas Kedua</div>-->
<!--                     <textarea name="reason_second_class" id="reason_second_class" cols="30" rows="10" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('reason_second_class') }}</textarea>-->
<!--                     @error('reason_second_class')-->
<!--                        <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                     @enderror-->
<!--                  </div>-->
<!--               </div>-->

<!--               {{-- Attachment Documents --}}-->
<!--               <div class="page form-section">-->
<!--                  <div class="mb-6">-->
<!--                     <fieldset class="w-full space-y-1 dark:text-gray-100">-->
<!--                        <div class="text-sm font-bold text-gray-100 tracking-wide">Curriculum Vitae (CV)</div>-->
<!--                        <div class="flex">-->
<!--                           <input type="file" name="cv" id="cv" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 text-gray-400 w-full">-->
<!--                        </div>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format File Harus PDF.</p>-->
<!--                        @error('cv')-->
<!--                           <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                        @enderror-->
<!--                     </fieldset>-->
<!--                  </div>-->

<!--                  <div class="mb-6">-->
<!--                     <fieldset class="w-full space-y-1 dark:text-gray-100">-->
<!--                        <div class="text-sm font-bold text-gray-100 tracking-wide">Bukti Upload Twibbon</div>-->
<!--                        <div class="flex">-->
<!--                           <input type="file" name="twibbon_screenshot" id="twibbon_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 text-gray-400 w-full">-->
<!--                        </div>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Link <a href="https://bit.ly/TwibbonMUAVol9" class="text-violet-400" target="_blank">Twibbon MUA Vol. 9</a> dan harus dipost di first account <br>serta pastikan akun hunters tidak di private.</p>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format file: jpeg, jpg, png</p>-->
<!--                        @error('twibbon_screenshot')-->
<!--                           <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                        @enderror-->
<!--                     </fieldset>-->
<!--                  </div>-->

<!--                  <div class="mb-6">-->
<!--                     <fieldset class="w-full space-y-1 dark:text-gray-100">-->
<!--                        <div class="text-sm font-bold text-gray-100 tracking-wide">Bukti Repost Feed Open Registrasi <a href="https://instagram.com/magangupdate.academy" class="text-violet-400" target="_blank">@magangupdate.academy</a> Ke Instastory</div>-->
<!--                        <div class="flex">-->
<!--                           <input type="file" name="repost_screenshot" id="repost_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 text-gray-400 w-full">-->
<!--                        </div>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format file: jpeg, jpg, png</p>-->
<!--                        @error('repost_screenshot')-->
<!--                           <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                        @enderror-->
<!--                     </fieldset>-->
<!--                  </div>-->

<!--                  <div class="mb-6">-->
<!--                     <fieldset class="w-full space-y-1 dark:text-gray-100">-->
<!--                        <div class="text-sm font-bold text-gray-100 tracking-wide">Bukti Tag 3 Temanmu Di Kolom Komentar Postingan Feed Kelas <a href="https://instagram.com/magangupdate.academy" target="_blank" class="text-violet-400">@magangupdate.academy</a> Yang Kamu Minati</div>-->
<!--                        <div class="flex">-->
<!--                           <input type="file" name="tag_screenshot" id="tag_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 text-gray-400 w-full">-->
<!--                        </div>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format file: jpeg, jpg, png</p>-->
<!--                        @error('tag_screenshot')-->
<!--                           <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                        @enderror-->
<!--                     </fieldset>-->
<!--                  </div>-->

<!--                  <div class="mb-6">-->
<!--                     <fieldset class="w-full space-y-1 dark:text-gray-100">-->
<!--                        <div class="text-sm font-bold text-gray-100 tracking-wide">Bukti Subscribe Youtube Channel MagangUpdate</div>-->
<!--                        <div class="flex">-->
<!--                           <input type="file" name="subscribe_screenshot" id="subscribe_screenshot" class="px-8 py-6 border-2 border-dashed rounded-md dark:border-gray-700 text-gray-400 w-full">-->
<!--                        </div>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Link <a href="http://youtube.com/@SeputarKampus" target="_blank" class="text-violet-400">Youtube Seputar Kampus</a></p>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format file: jpeg, jpg, png</p>-->
<!--                        @error('subscribe_screenshot')-->
<!--                           <p class="text-red-500 mt-2">{{ $message }}</p>-->
<!--                        @enderror-->
<!--                     </fieldset>-->
<!--                  </div>-->
<!--               </div>-->

<!--               {{-- About Yourself --}}-->
<!--               <div class="page form-section">-->
<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Ceritakan Tentang Diri Kamu</div>-->
<!--                     <textarea name="q1" id="q1" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q1') }}</textarea>-->
<!--                     @error('q1')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Mengapa Kamu Tertarik Untuk Ikut Program MagangUpdate Academy (MUA) Vol. 9?</div>-->
<!--                     <textarea name="q2" id="q2" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q2') }}</textarea>-->
<!--                     @error('q2')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Apa Saja Kesibukan Kamu Sekarang?</div>-->
<!--                     <textarea name="q3" id="q3" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q3') }}</textarea>-->
<!--                     <div class="flex flex-col space-y-1">-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Format Jawaban: Jabatan - Organisasi/Kepanitian/Magang - Periode</p>-->
<!--                        <p class="text-[#eee] mt-2 text-[13px]">*Jika tidak ada dapat diisikan dengan (-)</p>-->
<!--                     </div>-->
<!--                     @error('q3')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Bagaimana Kamu Membagi Waktu Antara Kesibukan Lainnya dengan MagangUpdate Academy (MUA) Vol. 9?</div>-->
<!--                     <textarea name="q4" id="q4" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q4') }}</textarea>-->
<!--                     @error('q4')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Nilai Komitmen Mengikuti MagangUpdate Academy (MUA) Vol. 9 (0-9)</div>-->
<!--                     <input class="w-full bg-transparent text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white" min="0" max="9" type="number" value="{{ old('q5') }}" name="q5" placeholder="">-->
<!--                     @error('q5')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Berdasarkan Angka Di Atas, Bagaimana Komitmen Kamu Mengikuti MagangUpdate Academy (MUA) Vol. 9?</div>-->
<!--                     <textarea name="q6" id="q6" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q6') }}</textarea>-->
<!--                     @error('q6')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Harapan Yang Dicapai Setelah Mengikuti Program MagangUpdate Academy (MUA) Vol. 9</div>-->
<!--                     <textarea name="q7" id="q7" cols="30" rows="4" placeholder="" class="w-full text-lg py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-indigo-500 text-white">{{ old('q7') }}</textarea>-->
<!--                     @error('q7')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->

<!--                  <div class="mb-4">-->
<!--                     <div class="text-sm font-bold text-gray-100 tracking-wide">Apakah Kamu Bersedia Untuk Berkontribusi Aktif dan Menyalakan Kamera Selama Kelas Berlangsung?</div>-->
<!--                     <div class="flex gap-10">-->
<!--                        <div class="inline-flex items-center">-->
<!--                          <label-->
<!--                            class="relative flex cursor-pointer items-center rounded-full p-3"-->
<!--                            for="html"-->
<!--                            data-ripple-dark="true"-->
<!--                          >-->
<!--                            <input-->
<!--                              id="html"-->
<!--                              name="q8"-->
<!--                              type="radio"-->
<!--                              value="1"-->
<!--                              class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-violet-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-violet-400 checked:before:bg-violet-400 hover:before:opacity-10"-->
<!--                            />-->
<!--                            <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-violet-400 opacity-0 transition-opacity peer-checked:opacity-100">-->
<!--                              <svg-->
<!--                                xmlns="http://www.w3.org/2000/svg"-->
<!--                                class="h-3.5 w-3.5"-->
<!--                                viewBox="0 0 16 16"-->
<!--                                fill="currentColor"-->
<!--                              >-->
<!--                                <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>-->
<!--                              </svg>-->
<!--                            </div>-->
<!--                          </label>-->
<!--                          <label-->
<!--                            class="mt-px cursor-pointer select-none font-light text-gray-200"-->
<!--                            for="html"-->
<!--                          >-->
<!--                            Ya-->
<!--                          </label>-->
<!--                        </div>-->
<!--                        <div class="inline-flex items-center">-->
<!--                          <label-->
<!--                            class="relative flex cursor-pointer items-center rounded-full p-3"-->
<!--                            for="react"-->
<!--                            data-ripple-dark="true"-->
<!--                          >-->
<!--                            <input-->
<!--                              id="react"-->
<!--                              name="q8"-->
<!--                              type="radio"-->
<!--                              value="0"-->
<!--                              class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-violet-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-violet-400 checked:before:bg-violet-400 hover:before:opacity-10"-->
<!--                            />-->
<!--                            <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-violet-400 opacity-0 transition-opacity peer-checked:opacity-100">-->
<!--                              <svg-->
<!--                                xmlns="http://www.w3.org/2000/svg"-->
<!--                                class="h-3.5 w-3.5"-->
<!--                                viewBox="0 0 16 16"-->
<!--                                fill="currentColor"-->
<!--                              >-->
<!--                                <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>-->
<!--                              </svg>-->
<!--                            </div>-->
<!--                          </label>-->
<!--                          <label-->
<!--                            class="mt-px cursor-pointer select-none font-light text-gray-200"-->
<!--                            for="react"-->
<!--                          >-->
<!--                            Tidak-->
<!--                          </label>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                     @error('q8')-->
<!--                        <p class="text-red-500 mt-2">This question must be answered</p>-->
<!--                     @enderror-->
<!--                  </div>-->
<!--               </div>-->

<!--               <div class="form-navigation mt-3 flex gap-2">-->
<!--                  <button-->
<!--                        class="previous w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"-->
<!--                        type="button"-->
<!--                     >-->
<!--                        Sebelumnya-->
<!--                     </button>-->
<!--                  <button-->
<!--                        class="next w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"-->
<!--                        type="button"-->
<!--                     >-->
<!--                        Selanjutnya-->
<!--                     </button>-->
<!--                  <button-->
<!--                     class="w-full px-4 py-2 font-bold text-white bg-violet-400 rounded-full hover:bg-violet-600 focus:outline-none focus:shadow-outline"-->
<!--                     type="submit"-->
<!--                  >-->
<!--                     Daftar-->
<!--                  </button>-->
<!--               </div>-->
<!--            </form>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
<!--<div class="stars-wrapper w-full -z-20 top-0 absolute mt-[5vh] md:-mt-[5vh]">-->
<!--   <div class="stars "></div>-->
<!-- </div>-->

<!--<img src="https://i.postimg.cc/rs33jStx/Pusaran-sihir-min-1-1-min-1-1-min.png" class="absolute w-[1000px] h-[1000px] -z-50 bottom-0 opacity-30 object-cover block md:hidden">-->
<!--<img src="https://i.postimg.cc/VL20q3SV/gradient-compressed-1-min-1-min.png" class="absolute -z-[100] -top-[10rem] left-0 md:-left-[15rem] md:-left-[10rem] object-cover w-[1000px] h-[1000px]" alt="">-->
<!--@endsection-->

@extends('MUA.layouts.main', [
    'title' => 'Pendaftaran Ditutup! - MagangUpdate Academy (MUA) Vol. 9',
    'active' => 'MUA',
    'heroTitle' => "Find & Start Your<br> Journey From Here!",
    'metaDescription' => "MagangUpdate Academy adalah program mentoring gratis dengan mentor profesional untuk memberikan pengembangan keterampilan eksklusif untuk tujuan pekerjaan tertentu. Ada 8 kelas yang dapat dipilih oleh para mentee untuk menyelami lebih dalam keajaiban MagangUpdate Academy Vol. 9 Kelas pendampingan. Mentee terbaik akan mendapatkan kelas ekstra eksklusif dengan Mentor spesial kami.",
    'heroButton' => 'Regist',
    'description' => '
        
    ',
    'metaKeywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',
    'metaCanonical' =>  'https://magangupdate.id/MUAVol9'
])

@section('content')
<section class="mx-auto">
   <div class="flex justify-center h-[100vh] px-6 mt-12">
      <div class="w-full max-w-3xl flex mb-16 py-8 md:py-3">
         <div class="w-full h-[95vh] md:max-w-2xl mx-auto p-5 rounded-3xl bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] regist-form flex items-center justify-center flex-col">
            <img src="{{ asset('assets/images/logos/logo-full.webp') }}" class="w-[80px] mb-3 md:mb-0 md:w-[200px] md:-ml-25 h-auto mx-auto mt-4" alt="MagangUpdate Academy's logo">
            <h2 class="text-[30px] md:text-[40px] font-bold text-white text-center mt-4 leading-[30px] mb-3 md:leading-[40px] mx-3 md:mx-0 font-gilroySemiBold">Registrasi MagangUpdate Academy (MUA) Vol. 9 <br>DITUTUP!!!</h2>
            <p class="hero-description mt-2 text-[#A0AABA] text-[16px] text-center lg:text-[16px] w-full md:max-w-3xl mx-auto font-gilroyRegular">
                Nantikan informasi selanjutnya di instagram <a href="https://instagram.com/magangupdate.academy" class="text-violet-400">@magangupdate.academy</a> terkait pengumuman yang lolos menjadi mentee dan informasi lainnya terkait MUA Vol. 9. Yang belum berkesempatan mendaftar, tetap semangat dan sampai jumpa di MUA Vol. 10!!!
            </p>
         </div>
      </div>
   </div>
</section>
<div class="stars-wrapper w-full -z-20 top-0 absolute mt-[5vh] md:-mt-[5vh]">
   <div class="stars "></div>
 </div>

<img src="https://i.postimg.cc/rs33jStx/Pusaran-sihir-min-1-1-min-1-1-min.png" class="absolute w-[1000px] h-[1000px] -z-50 bottom-0 opacity-30 object-cover block md:hidden">
<img src="https://i.postimg.cc/VL20q3SV/gradient-compressed-1-min-1-min.png" class="absolute -z-[100] -top-[10rem] left-0 md:-left-[15rem] md:-left-[10rem] object-cover w-[1000px] h-[1000px]" alt="">
@endsection