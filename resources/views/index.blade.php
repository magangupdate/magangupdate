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
    'canonical' =>  'http://localhost:8000/jobs'
])

@section('content')
<section class="digital-assets-section py-5 w-full flex flex-col mt-5 md:mt-12 items-center justify-center">
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Our<br>Digital Assets</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] font-gilroyRegular">
            We provide information across multiple platform and medias
        </p>
    </div>
    <div class="our-company-contents flex flex-row mt-4 items-center justify-center">
        <a href="http://instagram.com/magangjogja.id" title="Magang Jogja Link" class="group" target="_blank" data-aos="zoom-in">
            <img src="https://i.postimg.cc/T15FB4q1/logo-jogja.webp" alt="Magang Jojga's Logo" title="Magang Jojga's Logo" class="h-18 md:h-24 w-fit md:w-52 hover:scale-105 transition-transform duration-300">
        </a>
        <a href="https://www.instagram.com/magangsurabaya/" title="Magang Surabaya Link" class="group" target="_blank" data-aos="zoom-in">
            <img src="https://i.postimg.cc/BtWk3BMg/logo-surabaya.webp" alt="Magang Surabaya's Logo" title="Magang Surabaya's Logo" class="h-18 md:h-24 w-fit md:w-52 hover:scale-105 transition-transform duration-300">
        </a>
        <a href="http://instagram.com/magangbandung" class="group" title="Magang Bandung Link" target="_blank" data-aos="zoom-in">
            <img src="https://i.postimg.cc/Y99Jz9v1/logo-bandung.webp" alt="Magang Bandung's Logo" title="Magang Bandung's Logo" class="h-18 md:h-24 w-fit md:w-52 hover:scale-105 transition-transform duration-300">
        </a>
        <a href="https://www.instagram.com/magangjakarta.id/" class="group" title="Magang Jakarta Link" target="_blank" data-aos="zoom-in">
            <img src="https://i.postimg.cc/1tjbCQFb/logo-jakarta.webp" alt="Magang Jakarta's Logo" title="Magang Jakarta's Logo" class="h-18 md:h-24 w-fit md:w-52 hover:scale-105 transition-transform duration-300">
        </a>
    </div> 
</section> 

<section class="testimonials-section max-w-7xl mx-auto flex flex-col md:flex-row mt-14 space-x-5 space-y-9 md:space-y-0 z-50 items-center">
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

    <div class="testimonial-contents w-full md:w-[55%] h-[600px] flex flex-row space-x-3 overflow-hidden">
        <div class="testimonial-col pl-2 md:pl-0 flex flex-1 flex-col space-y-4 overflow-y-scroll relative scrollbar-hide">
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/2SkLGRxz/hanna.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Endina Hanna Putri</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Business & Partnership Development</p>
                    </div>
                 </div>
                 <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white"> MagangUpdate is so helpful in providing insight needed for hunters.
                 </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/9MR79dYZ/dipa.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Ahmad Dipa Khawarizmi</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Content Creator</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">Cukup informatif untuk memberikan info info magang saya
                </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/x8LNx97d/anna.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Agnes Gitana Yuni Rahmawati</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Social Media Manager</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">Informasi magang yang disajikan akurat dan kredibel
                </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/g05wGwbJ/isnaya.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Isnaya Rozanisa</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Business and Partnership Development</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">Platform yang sangat helpful, useful, informatif, trusted!!
                </p>
            </div>
        </div>

        <div class="testimonial-col pr-5 md:pr-0 testimonial-col-2 flex-1 flex flex-col space-y-4 mt-15 overflow-y-scroll relative scrollbar-hide">
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/tgm67SW9/aisyah.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Aisyah Putri Utami</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Business & Partnership Development</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">Selalu menebar kebermanfaatan melalui sharing awesome and trusted internship & opportunities.
                </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/1X040Jnn/nadira.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Nadira Zahra</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Business & Partnership Development</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">MagangUpdate bermanfaat bgt buat cari informasi magang!💘
                </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/9QLRN8xy/inayah.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Maulidya Nur Inayah</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Content Creator</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">Always give trust content lowongan magang dan tips & trick persiapan karir. 
                </p>
            </div>
            <div class="h-fit w-auto md:w-[330px] bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] rounded-[23px] border-[1px] px-3 md:px-6 py-6 flex flex-col space-y-3">
                <div class="flex flex-row items-center space-x-4 text-white">
                    <img src="https://i.postimg.cc/CLHfbLkP/fitriani.webp" alt="Testimoni's Picture" title="Testimoni's Picture" class="rounded-full object-cover h-8 w-8" loading="lazy">
                    <div class="flex flex-col">
                        <p class="leading-[150%] font-bold text-[13px] md:text-[15px]">Fitriani Ramadhanti Supena</p>
                        <p class="leading-[150%] text-[12px] md:text-[16px]">Creative Writer</p>
                    </div>
                </div>
                <p class="leading-[120%] md:leading-[150%] text-[12px] md:text-[16px] font-gilroyRegular text-white">MagangUpdate menjadi media informatif dan atraktif bagi para pencari kerja.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="counter-mitra-section py-5 w-full flex flex-col mt-16 items-center justify-center relative z-20 overflow-hidden">
    <img src="https://i.postimg.cc/MHHs3X7g/partners.webp" title="Partners Decoration" alt="Partner Images Decoration" class="absolute backdrop-filter -z-30 w-full scale-[1.7] ml-6 md:ml-0 md:scale-100 h-full object-cover md:w-11/12 mt-15 opacity-10">
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Our<br>Trusted Partners</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] font-gilroyRegular">
            We have had and maintained relationships with many partners
        </p>
    </div>
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

<section class="counter-mitra-section py-5 w-full flex flex-col mt-8 items-center justify-center relative z-20 overflow-hidden">
    <div class="faq-heading mx-auto text-center">
        <h2 class="text-[30px] md:text-[40px] font-bold text-white leading-[30px] md:leading-[40px] font-gilroySemiBold">Top 1<br>Platform Sharing</h2>
        <p class="hero-description mt-2 text-[#A0AABA] text-[16px] lg:text-[19px] w-5/6 mx-auto md:w-full font-gilroyRegular">
            Top 1 Platform Sharing Internships and Jobs Information in Indonesia
        </p>
    </div>
    <div class="our-company-contents flex md:space-y-0 flex-row mt-8 items-center justify-center space-x-2 md:space-x-6 text-white">
        <img src="https://i.postimg.cc/dQ9vzf8B/map.png" alt="Indonesian Map" title="Indonesian Map" class="w-full" data-aos="zoom-in-up" />
    </div> 
</section> 
@endsection