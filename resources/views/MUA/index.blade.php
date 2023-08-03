@extends('MUA.layouts.main', [
    'title' => 'MagangUpdate Academy (MUA) Vol. 9',
    'active' => 'MUA',
    'heroTitle' => "Find Your Potential and Unlock Future Career Opportunities",
    'metaDescription' => "MagangUpdate Academy is a free mentoring program with professional mentors to provide an exclusive skill-development for specific job purposes. There are 8 classes for mentees to choose to dive deeper into the magic of MagangUpdate Academy Vol. 9 Mentoring class. Best mentees will get an extra exclusive class with our special Mentors.",
    'heroButton' => '',
    'description' => '
        
    ',
    'metaKeywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',
    'metaCanonical' =>  'http://localhost:8000/MUAVol9'
])

@section('content')
{{--============================= SECTION 1: HERO =============================--}}
<section class="hero-section flex flex-row items-center h-screen justify-start w-full mx-auto relative">
  <div class="hero-text max-w-7xl mx-4 md:mx-auto text-center md:text-center flex flex-col items-center justify-center md:items-center md:justify-center" data-aos="zoom-in" data-aos-duration="1500">
     <div class="flex flex-row  mb-7">
      <img src="https://i.postimg.cc/VkgrXm5Z/logo-mua.webp" class="w-[120px] mb-3 md:mb-0 md:w-fit md:h-fit md:-ml-10 h-fit" style="height: 5rem; width: 15rem;" alt="MagangUpdate Academy's logo">
      <img src="{{ asset('assets/images/logos/logo-full.webp') }}" class="w-[120px] mb-3 md:mb-0 md:-ml-25 h-fit" style="height: 5rem; width: 15rem;" alt="MagangUpdate Academy's logo">
     </div>
      <h1 class="hero-title text-[36px] lg:text-[60px] font-gilroySemiBold font-bold text-white leading-[45px] -mt-5 md:mt-0 lg:leading-[80px]">
          MagangUpdate Academy Vol. 9 : <br>Find Your Potential and Unlock <br> Future Career Opportunities
      </h1>
      <p class="hero-description font-gilroyRegular mt-4 max-w-2xl text-[#A0AABA] text-[16px] lg:text-[19px]">
          
      </p>
      <div class="flex flex-col md:flex-row items-center space-x-2">
          <a href="/RegistMUAVol9" class="hover:animate-pulse hero-btn block w-fit rounded-full py-3 px-9 mt-6 border-white border text-white text-[15px] md:text-[16px]">Register Here</a>
          <a href="https://bit.ly/BookletMenteeMUAVol9" target="_blank" class="hover:animate-pulse hero-btn block w-fit rounded-full py-3 md:px-[1.25rem] px-9 mt-3 md:mt-6 border-white border text-white text-[15px] md:text-[16px]">Download Booklet</a>
      </div>

      <div class="container-chevron mt-10">
        <div class="chevron"></div>
        <div class="chevron"></div>
        <div class="chevron"></div>
        <span class="text">Scroll down</span>
      </div>
  </div>
  
  <div class="stars-wrapper w-full -z-10 absolute">
      <div class="stars "></div>
  </div>
</section>
{{--============================= END OF SECTION 1: HERO =============================--}}

{{--============================= SECTION 2: GET TO KNOW =============================--}}
<section class="flex flex-col items-center justify-start w-full mx-auto relative mt-10 md:-mt-7">

  <div class="faq-heading mx-auto text-center w-full md:max-w-4xl">
      <h2 class="text-[23px] md:text-[40px] font-bold text-white leading-[30px] mb-3 md:leading-[40px] mx-3 md:mx-0 font-gilroySemiBold">Get to Know MagangUpdate Academy Vol. 9</h2>
      <p class="hero-description mt-2 text-white md:text-[#A0AABA] text-[15px] lg:text-[19px] w-5/6 mx-auto md:w-full font-gilroyRegular">
          MagangUpdate Academy is a free mentoring program with professional mentors to provide an exclusive skill-development for specific job purposes. There are 8 classes for mentees to choose to dive deeper into the magic of MagangUpdate Academy Vol. 9 Mentoring class. Best mentees will get an extra exclusive class with our special Mentors.
      </p>
  </div>

  <div class="swiper mySwiper mt-8">
    <div class="swiper-wrapper">
        <div class="swiper-slide relative">
            <img src="https://i.postimg.cc/7PKzh8jV/opening-1-photoaidcom-greyscale.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute object-cover w-full h-full" />
        </div>
        <div class="swiper-slide relative">
            <img src="https://i.postimg.cc/fTk90qNh/opening-5-photoaidcom-greyscale.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute object-cover w-full h-full" />
        </div>
        <div class="swiper-slide relative">
            <img src="https://i.postimg.cc/tgdZHLhF/Screenshot-924-photoaidcom-greyscale.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute object-cover w-full h-full" />
        </div>
        <div class="swiper-slide relative">
            <img src="https://i.postimg.cc/VLTb99f0/Pengenalan-Mentor-photoaidcom-greyscale.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute object-cover w-full h-full" />
        </div>
        <div class="swiper-slide relative">
          <img src="https://i.postimg.cc/0ywKV6jW/Screenshot-37-photoaidcom-greyscale.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute object-cover w-full h-full" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>  
</section>
{{--============================= END OF SECTION 2: GET TO KNOW =============================--}}

<div class="stars-wrapper w-full -z-50 absolute">
  <div class="stars "></div>
</div>

{{--============================= SECTION 3: BENEFITS =============================--}}
<section class="flex flex-col items-center justify-start w-full mx-auto relative mt-20">
  <h2 class="text-[23px] md:text-[40px] font-bold text-white md:max-w-4xl mx-auto leading-[30px] mb-3 md:leading-[40px] font-gilroySemiBold text-center">What will you get by joining MagangUpdate Academy Vol. 9?</h2>

  <section class="text-gray-100 max-w-5xl mt-10">
    <div class="container flex flex-col-reverse mx-auto lg:flex-row">
      <div class="flex flex-col px-6 py-8 space-y-6 rounded-sm sm:p-8 lg:p-12 max-w-5xl text-gray-200">
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Free mentoring with professional mentors</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Top in-demand skill class</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Choosing your own class option</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Getting the opportunity for Exclusive Class</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Class based on real work cases</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Expand your relation with other mentees from various university</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Building some of Networking with top companies and mentor</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">Leveling up your soft and hard skills</p>
          </div>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
          </svg>
          <div class="space-y-2">
            <p class="leading-snug text-[15px] md:text-[16px]">E-Certificate*</p>
          </div>
        </div>
      </div>
      <div class="md:max-w-2xl">
        <div class="flex items-center justify-center p-4 md:p-8 lg:p-12">
          <img src="https://i.postimg.cc/DwN0sz6G/Buku-magic-5x-min-min.png" alt="" class="rounded-lg h-[35vh] md:h-[50vh]  -mt-[3rem] md:mt-0 aspect-video">
        </div>
      </div>
    </div>
  </section>
</section>
{{--============================= END OF SECTION 3: BENEFITS =============================--}}

{{--============================= SECTION 4: MUA's MENTORS =============================--}}
<section class="flex flex-col items-center justify-start w-full mx-auto relative mt-5 md:mt-20">
  <div class="faq-heading mx-auto text-center w-full">
      <h2 class="text-[23px] md:text-[40px] font-bold text-white md:max-w-4xl mx-auto leading-[30px] mb-3 md:leading-[40px] font-gilroySemiBold">Meet Our Mentors</h2>
      <p class="hero-description max-w-3xl mt-2 text-[#A0AABA] text-[15px] lg:text-[19px] w-5/6 mx-auto md:w-full font-gilroyRegular">
        We provide mentors with proven backgrounds in their respective fields. Professional, expert, and highly dedicated to industry and career.
      </p>
      
      <div class="swiper mentor mySwiperMentor">
        <div class="swiper-wrapper mentor">
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/rFMsTxdQ/Group-31-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/k4SGJyFh/Group-31-1-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/R0yqxYfH/Group-31-2-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/qMwRvqy0/Group-31-3-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/tRhJ82gs/Group-31-4-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/zv1BVRxD/Group-31-5-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/25V3JYqY/Group-31-6-min-min.png" class="img-mentor"/>
          </div>
          <div class="swiper-slide mentor">
            <img src="https://i.postimg.cc/zvSfWXQC/Group-31-7-min-min.png" class="img-mentor"/>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
  </div>
</section>
{{--============================= END OF SECTION 4: MUA's MENTORS =============================--}}

{{--============================= SECTION 5: MUA's CLASSES =============================--}}
<section class="flex flex-col items-center justify-start w-full mx-auto relative -mt-[4rem] md:mt-20">
  <div class="faq-heading mx-auto text-center w-full">
      <h2 class="text-[23px] md:text-[40px] font-bold text-white md:max-w-4xl mx-auto leading-[30px] mb-3 md:leading-[40px] font-gilroySemiBold">Join Our Clasess</h2>
      <p class="hero-description max-w-3xl mt-2 text-[#A0AABA] text-[15px] lg:text-[19px] w-5/6 mx-auto md:w-full font-gilroyRegular">
        We present this program with a high-demand learning path by today's jobs industry to create a generation ready to take part in global human resource challenges.
      </p>
      <div class="w-fit mx-auto">
        <a href="https://bit.ly/BookletMenteeMUAVol9" target="_blank" class="hover:animate-pulse hero-btn block max-w-3xl mx-auto rounded-full py-3 md:px-[1.25rem] px-9 mt-3 md:mt-6 border-white border text-white text-[15px] md:text-[16px] text-center">See Detail Class On Booklet Mentee</a>
      </div>
      
      <div class="swiper class mySwiperClass">
        <div class="swiper-wrapper class">
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/s2KTgpKy/Group-39-1-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/QtySphRy/Group-39-2-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/nzz0jCwm/Group-39-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/23pwKTjd/Group-40-1-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/RhJdd2mV/Group-40-3-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/28hR8KWD/Group-40-4-min-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/RC3x2FVq/Group-40-5-min-1-min.png" class="img-class"/>
          </div>
          <div class="swiper-slide class">
            <img src="https://i.postimg.cc/SQwb4hJd/Group-40-6-min-min.png" class="img-class"/>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>
{{--============================= END OF SECTION 5: MUA's CLASSES =============================--}}

<div class="stars-wrapper w-full -z-50 absolute">
  <div class="stars "></div>
</div>

{{--============================= SECTION 6: TESTIMONIALS =============================--}}
<section class="my-8 text-gray-100 mb-14">
	<div class="container flex flex-col items-center p-4 mx-auto space-y-6 md:p-8">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-16 h-16 text-violet-400">
			<polygon points="328.375 384 332.073 458.999 256.211 406.28 179.924 459.049 183.625 384 151.586 384 146.064 496 182.756 496 256.169 445.22 329.242 496 365.936 496 360.414 384 328.375 384"></polygon>
			<path d="M415.409,154.914l-2.194-48.054L372.7,80.933,346.768,40.414l-48.055-2.2L256,16.093,213.287,38.219l-48.055,2.2L139.3,80.933,98.785,106.86l-2.194,48.054L74.464,197.628l22.127,42.715,2.2,48.053L139.3,314.323l25.928,40.52,48.055,2.195L256,379.164l42.713-22.126,48.055-2.195,25.928-40.52L413.214,288.4l2.195-48.053,22.127-42.715Zm-31.646,76.949L382,270.377l-32.475,20.78-20.78,32.475-38.515,1.76L256,343.125l-34.234-17.733-38.515-1.76-20.78-32.475L130,270.377l-1.759-38.514L110.5,197.628,128.237,163.4,130,124.88,162.471,104.1l20.78-32.474,38.515-1.76L256,52.132l34.234,17.733,38.515,1.76,20.78,32.474L382,124.88l1.759,38.515L401.5,197.628Z"></path>
		</svg>
		<p class="px-6 py-2 text-2xl font-semibold text-center sm:font-bold sm:text-3xl md:text-4xl lg:max-w-2xl xl:max-w-4xl text-gray-300">“Being a part of MUA was an amazing experience. Meskipun kegiatannya singkat tapi ilmu dan skillnya bisa ke-upgrade!!“</p>
		<div class="flex justify-center flex-col items-center space-x-3">
			<img src="https://i.postimg.cc/Hn4PwPmH/Andini-Ayuningtyas-1-photoaidcom-greyscale.png" alt="" class="w-14 h-14 bg-center bg-cover rounded-[100%] dark:bg-gray-500 dark:bg-gray-700">
			<div class="text-center mt-1">
				<p class="leading-tight">Andini Ayuningtyas</p>
				<p class="text-sm leading-tight text-gray-300">MUA Vol. 8 mentees from Universitas Tidar</p>
			</div>
		</div>
	</div>
</section>
{{--============================= END OF SECTION 6: TESTIMONIALS =============================--}}

{{--============================= END OF SECTION 7: BANNER EXCLUSIVE CLASS =============================--}}
<section class="py-6 bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] text-gray-100 w-10/12 md:max-w-5xl h-[50vh] md:h-auto flex md:block mx-auto rounded-lg mt-25 relative overflow-hidden">
  <img src="https://i.postimg.cc/CM4FXf3T/image-10.png" class="absolute -right-[10rem]  md:-right-[15rem] -top-[5rem] w-fit h-[20rem] md:h-[30rem] opacity-40 md:opacity-80" style="width: 35rem; height: 35rem;">
	<div class="container mx-auto flex flex-col items-center justify-center p-4 space-y-3 md:p-10 md:px-24 xl:px-48">
		<h1 class="text-2xl md:text-5xl font-bold leading-none text-center">Register Yourself and Take the Chance to get a Free Pass to our Exclusive Class!</h1>
    <div class="flex flex-col md:flex-row items-center justify-center space-x-2">
      <div class="hero-btn block w-fit rounded-full py-3 px-5 mt-6 border-gray-100 border text-gray-100 text-[16px] font-bold">Personal Branding</div>
      <div class="hero-btn block w-fit rounded-full py-3 px-9 mt-2 md:mt-6 border-gray-100 border text-gray-100 text-[16px] font-bold">Design Thinking</div>
    </div>
	</div>
  <img src="https://i.postimg.cc/G3vB226q/image-4.png" class="absolute left-0 md:-left-[4rem] -bottom-[2rem] w-fit h-[10rem] md:h-[20rem] opacity-40 md:opacity-80" style="width: 20rem; height: 20rem;">
  {{-- <img src="" alt="absolute object-cover w-full h-full -z-50"> --}}
</section>
{{--============================= END OF SECTION 7: BANNER EXCLUSIVE CLASS =============================--}}

<div class="stars-wrapper w-full -z-50 absolute mt-[25vh]">
  <div class="stars "></div>
</div>

{{--============================= SECTION 8: TIMELINE =============================--}}
<section class="text-gray-100 -mt-[1rem] md:mt-14 relative">
  <div class="container max-w-5xl px-4 py-12 mx-auto">
        
    <div class="grid gap-4 mx-4 sm:grid-cols-12">
      <div class="col-span-12 sm:col-span-3">
        <div class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-violet-400">
          <h2 class="text-[23px] md:text-[40px] font-bold text-white leading-[30px] mb-3 md:leading-[40px] mx-3 md:mx-0 font-gilroySemiBold">Prepare Your Timeline!</h2>
          <span class="md:text-sm font-bold tracking-wider uppercase text-gray-400 text-[15px]">MagangUpdate Academy Vol. 9</span>
        </div>
      </div>
      <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
        <div class="col-span-12 space-y-7 relative px-4 sm:col-span-8 sm:space-y-6 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:dark:bg-gray-200">
          <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Phase 1: Open Registration </h3>
            <time class="text-xs tracking-wide uppercase text-gray-400">1 - 6 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Registration for mentee MagangUpdate Academy (MUA) Vol. 9. <a href="/RegistMUAVol9">Register Here.</a></p>
          </div>
          <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Mentee Announcement</h3>
            <time class="text-xs tracking-wide uppercase text-gray-400">12 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Announcement of applicants who have succeeded in becoming mentee MagangUpdate Academy (MUA) Vol. 9 and is entitled to attend the previously selected class.</p>
          </div>
          <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Opening MUA Vol. 9 </h3>
            <time class="text-xs tracking-wide uppercase text-gray-400">16 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Opening of the MagangUpdate Academy (MUA) Vol. 9 which was followed by all participants who passed.</p>
          </div>
                    <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Class Session 1</h3>
            <time class="text-xs tracking-wide uppercase text-gray-400">17 - 18 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Doing of First Class Session</p>
          </div>
                  <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Class Session 2</h3>
            <time class="text-xs tracking-wide uppercase text-gray-400">24 - 25 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Doing of Second Class Session</p>
          </div>
                    <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Awarding Night</h3>
            <time class="text-xs tracking-wide uppercase text-gray-600">26 June 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Announcement for those who have passed MagangUpdate Academy (MUA) Vol. 9</p>
          </div>
                    <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500">
            <h3 class="text-xl font-semibold tracking-wide">Exclusive Class</h3>
            <time class="text-xs tracking-wide uppercase text-gray-600">1 July 2023</time>
            <p class="mt-3 text-[15px] md:text-[16px]">Doing of an exclusive class for participants who get the title "best mentee" on the awarding night.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{--============================= END OF SECTION 8: TIMELINE =============================--}}

{{--============================= SECTION 9: CALL TO ACTION =============================--}}
<section class="py-6 bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] text-gray-100 w-10/12 md:max-w-5xl mx-auto rounded-lg relative h-[40vh] md:h-auto flex md:block">
	<div class="container mx-auto flex flex-col items-center justify-center p-4 space-y-2 md:p-10 md:px-24 xl:px-48">
		<h1 class="text-2xl md:text-5xl font-bold leading-none text-center">What Are You Waiting For? Join MUA Vol. 9 Right Now!</h1>
    <div class="flex flex-col md:flex-row items-center justify-center space-x-2">
      <a href="/RegistMUAVol9" class="hover:animate-pulse hero-btn block w-fit rounded-full py-3 px-5 mt-6 border-gray-100 border text-gray-100 text-[16px] font-bold">Register Now</a>
      <a href="https://bit.ly/BookletMenteeMUAVol9" target="_blank" class="hover:animate-pulse hero-btn block w-fit rounded-full py-3 px-9 mt-4 md:mt-6 border-gray-100 border text-gray-100 text-[16px] font-bold">Download Booklet</a>
    </div>
	</div>
</section>
{{--============================= END OF SECTION 9: CALL TO ACTION =============================--}}

<img src="https://i.postimg.cc/rs33jStx/Pusaran-sihir-min-1-1-min-1-1-min.png" alt="" class="md:hidden absolute block w-[700vh] h-[120vh] top-[50vh] opacity-80 -z-30 object-cover">
<!--<img src="https://i.postimg.cc/fL1WdkXf/awan4-2x.png" alt="" class="bottom-0 absolute -z-30 w-full">-->
<!--<img src="https://i.postimg.cc/QN25T06m/Naga-2x-min.png" alt="" class="bottom-0 absolute -z-30 w-full opacity-10 hidden md:block">-->
@endsection