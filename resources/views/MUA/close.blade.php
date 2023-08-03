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