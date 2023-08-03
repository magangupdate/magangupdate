@if ($active !== 'Detail' && $active !== 'MUA')
<section class="hero-section flex flex-col @if ($active === 'Coming Soon') h-[50vh] overflow-y-hidden @endif  items-center justify-center text-center w-full mx-auto mt-[10rem] ">
    @if ($active === 'MUAP')
            <img src="{{ asset('assets/images/muap15.webp') }}" alt="Circle Decoration" title="Circle Decoration" class="top-[15vh] @if ($heroTitle === 'Coming Soon') h-full w-full object-cover @endif w-auto mx-auto mb-10 -mt-6 hidden md:block" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="1500">
            <img src="{{ asset('assets/images/muap15-mobile.webp') }}" alt="Circle Decoration" title="Circle Decoration" class="top-[15vh] @if ($heroTitle === 'Coming Soon') h-full w-full object-cover @endif w-auto mx-auto -mt-8 block md:hidden mb-20" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="1500">
    @endif

    <div class="hero-text max-w-7xl -mt-[3rem] md:-mt-[1rem]" data-aos="zoom-in" data-aos-duration="1500">
        <h1 class="hero-title text-[45px] lg:text-[80px] font-gilroySemiBold text-white leading-[45px] lg:leading-[80px]">
            {!! $heroTitle !!}
        </h1>
        <p class="hero-description font-gilroyRegular mt-4 max-w-3xl @if($active === 'MUAP') max-w-6xl @endif mx-6 md:mx-auto text-[#A0AABA] text-[16px] lg:text-[19px]">
            {{ $heroDescription }}
        </p>
        @if ($active !== 'Coming Soon' && $active != 'Jobs' && $active !== 'Articles' && $active !== 'MUAP')
        <a href="/jobs" class="hero-btn block mx-auto w-fit rounded-full bg-gradient-to-tr py-3 px-9 mt-6 border-white border text-white text-[16px]">{{ $heroButton }}</a>
        @endif

        @if ($active === 'Jobs')
        <form class="mt-5 w-fit md:max-w-xl md:w-[32rem] mx-auto">
				<div class="sm:flex items-center bg-gradient-to-tr mt-6 border-white border text-white rounded-full overflow-hidden px-2 md:pl-2 md:px-0 md:py-1 py-2 justify-between">
					<input class="text-base text-gray-400 flex-grow outline-none px-2 bg-transparent w-[15rem] md:w-auto" type="text" placeholder="Search your opportunities here" />
					<div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto md:block hidden">
						<select id="Com" class="text-base text-gray-800 outline-none border-2 pl-4 py-2 rounded-full -mr-4">
                            <option value="com" selected>Intenrship</option>
                            <option value="net">Fulltime Job</option>
                            <option value="org">Partime Job</option>
                            <option value="io">Freelance</option>
                        </select>
                        <button class="bg-[#8195de] text-white text-base rounded-full px-4 py-2 font-thin">Search</button>
					</div>
                    <button class="bg-[#8195de] text-white text-base rounded-full px-3 h-10 w-10 py-2 font-thin md:hidden"><i class='bx bx-search mt-1'></i></button>
				</div>
		</form>
        @endif

        @if ($active === 'Articles')
        <form class="mt-5 w-fit md:max-w-xl md:w-[32rem] mx-auto">
				<div class="sm:flex items-center bg-gradient-to-tr mt-6 border-white border text-white rounded-full overflow-hidden px-2 md:pl-2 md:px-0 md:py-1 py-2 justify-between">
					<input class="text-base text-gray-400 flex-grow outline-none px-2 bg-transparent w-[15rem] md:w-auto" type="text" placeholder="Explore interesting articles" />
					<div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto md:block hidden">
                        <button class="bg-[#540032] text-white text-base rounded-full px-4 py-2 font-thin">Search</button>
					</div>
                    <button class="bg-[#540032] text-white text-base rounded-full px-3 h-10 w-10 py-2 font-thin md:hidden"><i class='bx bx-search mt-1'></i></button>
				</div>
		</form>
        @endif

        @if ($active === 'MUAP')
        {{-- <div class="flex flex-col md:flex-row items-center justify-center space-x-2">
            <a href="/jobs" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-5 mt-6 border-white border text-white text-[16px]">Join MUAP #16</a>
            <a href="/jobs" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-7 mt-2 md:mt-6 border-white border text-white text-[16px]">Download Handbook</a>
        </div> --}}
        <div class="flex flex-col md:flex-row items-center justify-center space-x-2">
            <a href="/jobs" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-5 mt-6 border-white border text-white text-[16px]">Coming Soon MUAP #16</a>
            {{-- <a href="/jobs" class="hero-btn block w-fit rounded-full bg-gradient-to-tr py-3 px-7 mt-2 md:mt-6 border-white border text-white text-[16px]">Download Handbook</a> --}}
        </div>
        @endif
    </div>

    @if ($active === 'Home')
        <div class="swiper mySwiper mt-8">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative">
                    <img src="https://i.postimg.cc/7PdwN495/hero-1.webp" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    <div class="description absolute top-0 flex flex-col items-start px-[3.5rem] py-[2rem] md:py-[4.5rem] gap-40">
                        <div>
                            <h2 class="header-description px-2 py-2 bg-[#ec8624] text-white font-bold rounded-lg w-fit">Internships and Jobs Info</h2>
                            <h1 class="mt-[1.3rem] text-[30px] md:text-[35px] font-bold text-white font-gilroySemiBold text-left leading-[2.1rem] md:leading-[2.5rem]">Looking for opportunity for internships and<br> full time jobs!</h1>
                        </div>
                    </div>
                    <a href="" class="text-white flex items-center justify-center absolute bottom-5 md:bottom-14 px-[3.5rem] font-gilroySemiBold text-[17px]">Find Jobs <i class='bx bx-right-arrow-alt'></i></a>
                </div>
                <div class="swiper-slide relative">
                    <img src="https://i.postimg.cc/2y9Q1wBK/hero-2.webp" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    <div class="description absolute top-0 flex flex-col items-start px-[3.5rem] py-[2rem] md:py-[4.5rem] gap-40">
                        <div>
                            <h2 class="header-description px-2 py-2 bg-[#AD2FBD] text-white font-bold rounded-lg w-fit">MagangUpdate Academy</h2>
                            <h1 class="mt-[1.3rem] text-[30px] md:text-[35px] font-bold text-white font-gilroySemiBold text-left max-w-2xl leading-[2.1rem] md:leading-[2.5rem]">Find Your Potential and Unlock Future Career Opportunities</h1>
                        </div>
                    </div>
                    <a href="{{ route('mua') }}" class="text-white flex items-center justify-center absolute bottom-5 md:bottom-14 px-[3.5rem] font-gilroySemiBold text-[17px]">Join MUA Vol. 9 <i class='bx bx-right-arrow-alt'></i></a>
                </div>
                <div class="swiper-slide relative">
                    <img src="https://i.postimg.cc/wBqpBjqG/hero-3.webp" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    <div class="description absolute top-0 flex flex-col items-start px-[3.5rem] py-[2rem] md:py-[4.5rem] gap-40">
                        <div>
                            <h2 class="header-description px-2 py-2 bg-[#309847] text-white font-bold rounded-lg w-fit">MagangUpdate Acceleration Program</h2>
                            <h1 class="mt-[1.3rem] text-[30px] md:text-[35px] font-bold text-white font-gilroySemiBold text-left leading-[2.1rem] md:leading-[2.5rem]">Giving you the opportunity to be<br> a part of MagangUpdate</h1>
                        </div>
                    </div>
                    <a href="{{ route('muap') }}" class="text-white flex items-center justify-center absolute bottom-5 md:bottom-14 px-[3.5rem] font-gilroySemiBold text-[17px]">Register MUAP #16 <i class='bx bx-right-arrow-alt'></i></a>
                </div>
                <div class="swiper-slide relative">
                    <img src="https://i.postimg.cc/pLYvxFHj/hero-4.webp" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    <div class="description absolute top-0 flex flex-col items-start px-[3.5rem] py-[2rem] md:py-[4.5rem] gap-40">
                        <div>
                            <h2 class="header-description px-2 py-2 bg-[#6D6B6B] text-white font-bold rounded-lg w-fit">CV Clinic</h2>
                            <h1 class="mt-[1.3rem] text-[30px] md:text-[35px] font-bold text-white font-gilroySemiBold text-left leading-[2.1rem] md:leading-[2.5rem]">Review your CV with<br>our best reviewer</h1>
                        </div>
                    </div>
                    <a href="{{ route('cv-clinic') }}" class="text-white flex items-center justify-center absolute bottom-5 md:bottom-14 px-[3.5rem] font-gilroySemiBold text-[17px]">Review Your CV <i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    @endif
</section>
@endif