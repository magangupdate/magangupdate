@extends('layouts.main', [
    'title' => 'Magang Update - Looking for Internship Opportunities',
    'active' => 'Home',
    'heroTitle' => "Sharing Awesome Internship <br>and Opportunities!",
    'heroDescription' => 'Each month, more than 10 million+ hunters turn to website or social media looking for opportunities for many internship, part time, volunteer, and full time job!',
    'heroButton' => 'Find Jobs',
    'description' => '
        Each month, more than 10 million+ hunters turn to website or social media looking for opportunities for many internship, part time, volunteer, and full time job!
    ',
    'keywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',
    'canonical' =>  'https://magangupdate.id/'
])

@section('content')

{{--======================== DIGITAL ASSETS SECTION  ========================--}}
<section class="digital-assets-section py-5 w-full flex flex-col mt-5 md:mt-12 items-center justify-center">
    {{-- HEADING DIGITAL ASSETS --}}
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Our<br>Digital Assets</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] font-gilroyRegular">
            We provide information across multiple platform and medias
        </p>
    </div>

    {{-- DIGITAL ASSETS COMPONENTS --}}
    <div class="our-company-contents flex flex-row mt-4 items-center justify-center">
        @foreach ($digitalAssets as $digitalAsset)
            <a href="{{ $digitalAsset["link"] }}" title="{{ $digitalAsset["link"] }}" class="group" target="_blank" data-aos="zoom-in">
                <img src="{{ $digitalAsset["logo"] }}" alt="{{ $digitalAsset["name"] }}" title="{{ $digitalAsset["name"] }}" class="h-18 md:h-24 w-fit md:w-52 hover:scale-105 transition-transform duration-300">
            </a>
        @endforeach
    </div> 
</section> 
{{--====================== END DIGITAL ASSETS SECTION  ======================--}}

{{--========================== TESTIMONIAL SECTION  =========================--}}
<section class="testimonials-section max-w-7xl mx-auto flex flex-col md:flex-row mt-14 space-x-5 space-y-9 md:space-y-0 z-50 items-center">
    {{-- HEADING TESTIMONIALS --}}
    <div class="flex flex-col flex-1 text-center md:text-left items-center justify-center md:items-start md:justify-start">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Start to Find<br>Your Opportunities</h2>
        <p class="hero-description font-gilroyRegular mt-2 text-[#A0AABA] text-[16px] lg:text-[19px]">
            We help students, freshgraduates, and job seekers to find opportunities for them to develop their potential and we also provide several articles that can expand their horizons
        </p>
        <div class="flex flex-row text-center md:text-left items-center justify-center md:items-start md:justify-start gap-3">
            <a href="/jobs" title="Jobs Link" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-6 mt-6 border-white border text-white text-[16px]">Find Jobs</a>
            <a href="/articles" title="Articles Link" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-6 mt-6 border-white border text-white text-[16px]">Read Articles</a>
        </div>
    </div>

    {{-- TESTIMONIALS --}}
    <div class="testimonial-contents w-full md:w-[55%] h-[600px] flex flex-row space-x-3 overflow-hidden">
        <div class="testimonial-col pl-2 md:pl-0 flex flex-1 flex-col space-y-4 overflow-y-scroll relative scrollbar-hide">
            @foreach ($testimonials[0]["testimonials"] as $testimonial)
                <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                    <div class="flex flex-row items-center space-x-4 text-white">
                        <img src="{{ $testimonial["profile"] }}" alt="{{ $testimonial["name"] }}" title="{{ $testimonial["name"] }}" class="rounded-full object-cover h-8 w-8" loading="lazy">
                        <div class="flex flex-col">
                            <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">{{ $testimonial["name"] }}</p>
                            <p class="leading-[150%] text-[12px] md:text-[16px]">{{ $testimonial["division"] }}</p>
                        </div>
                    </div>
                    <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">{{ $testimonial["testimonial"] }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="testimonial-col pr-5 md:pr-0 testimonial-col-2 flex-1 flex flex-col space-y-4 mt-15 overflow-y-scroll relative scrollbar-hide">
            @foreach ($testimonials[1]["testimonials"] as $testimonial)
                <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                    <div class="flex flex-row items-center space-x-4 text-white">
                        <img src="{{ $testimonial["profile"] }}" alt="{{ $testimonial["name"] }}" title="{{ $testimonial["name"] }}" class="rounded-full object-cover h-8 w-8" loading="lazy">
                        <div class="flex flex-col">
                            <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">{{ $testimonial["name"] }}</p>
                            <p class="leading-[150%] text-[12px] md:text-[16px]">{{ $testimonial["division"] }}</p>
                        </div>
                    </div>
                    <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">{{ $testimonial["testimonial"] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{--======================== END TESTIMONIAL SECTION  =======================--}}

{{--============================ PARTNERS SECTION  ==========================--}}
<section class="counter-mitra-section py-5 w-full flex flex-col mt-16 items-center justify-center relative z-20 overflow-hidden">
    {{-- BACKGROUND --}}
    <img src="https://i.postimg.cc/MHHs3X7g/partners.webp" title="Partners Decoration" alt="Partner Images Decoration" class="absolute backdrop-filter -z-30 w-full scale-[1.7] ml-6 md:ml-0 md:scale-100 h-full object-cover md:w-11/12 mt-15 opacity-10" />

    {{-- HEADING PARTNERS --}}
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Our<br>Trusted Partners</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] font-gilroyRegular">
            We have had and maintained relationships with many partners
        </p>
    </div>

    {{-- PARTNERS --}}
    <div class="our-company-contents flex md:space-y-0 flex-row mt-8 items-center justify-center space-x-2 md:space-x-6 text-white">
        <div data-aos="zoom-out" class="h-[150px] md:h-[350px] w-[120px] md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter items-center justify-center backdrop-blur-sm bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-0 md:space-y-4">
            <h1 class="counter universities font-bold text-[30px] md:text-[80px]">
                10+
            </h1>
            <p class="text-[13px] md:text-[18px] text-center">Universities</p>
        </div>

        <div data-aos="zoom-out" data-aos-duration="1000" class="h-[190px] md:h-[390px] w-[140px] md:w-[330px] bg-white-200 bg-clip-padding items-center justify-center backdrop-filter backdrop-blur-sm bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-0 md:space-y-4">
            <h1 class="counter startups font-bold text-[30px] md:text-[80px]">
                40+
            </h1>
            <p class="text-[13px] md:text-[18px] text-center">Enterprise & Start-up</p>
        </div>

        <div data-aos="zoom-out" data-aos-duration="1500" class="h-[150px] md:h-[350px] w-[120px] md:w-[330px] bg-white-200 bg-clip-padding items-center justify-center backdrop-filter backdrop-blur-sm bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-0 md:space-y-4">
            <h1 class="counter events font-bold text-[30px] md:text-[80px]">
                1000+
            </h1>
            <p class="text-[13px] md:text-[18px] text-center">Event Partners</p>
        </div>
    </div> 
</section> 
{{--========================== END PARTNERS SECTION  ========================--}}

{{--========================= INDONESIA MAP SECTION  ========================--}}
<section class="counter-mitra-section py-5 w-full flex flex-col mt-8 items-center justify-center relative z-20 overflow-hidden">
    {{-- HEADING INDONESIA MAP --}}
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Top 1<br>Platform Sharing</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] w-5/6 mx-auto md:w-full font-gilroyRegular">
            Top 1 Platform Sharing Internships and Jobs Information in Indonesia
        </p>
    </div>

    {{-- INDONESIA MAP --}}
    <div class="our-company-contents flex md:space-y-0 flex-row mt-8 items-center justify-center space-x-2 md:space-x-6 text-white">
        <img src="https://i.postimg.cc/dQ9vzf8B/map.png" alt="Indonesian Map" title="Indonesian Map" class="w-full" data-aos="zoom-in-up" />
    </div> 
</section> 
{{--======================= END INDONESIA MAP SECTION  ======================--}}

@endsection