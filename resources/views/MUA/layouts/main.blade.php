<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--=============== META SEO ===============-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="keywords" content="{{ $metaKeywords }}">
        <meta name="author" content="MagangUpdate">
        <meta http-equiv="refresh" content="3600">

        <title>{{ $title }}</title>

        <link rel="canonical" href="{{ $metaCanonical }}">
        <link rel="icon" href="{{ asset('assets/images/logos/logo-transparent.webp') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase:wght@700&display=swap" rel="stylesheet">

        <!--=============== BOXICONS ===============-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('assets/css/mua.css') }}">
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
        />

        <!--=============== TAILWIND CSS ===============-->
        @vite('resources/css/app.css')

        <style>
            .swiper {
                width: 100%;
                padding-top: 50px;
                padding-bottom: 50px;
            }
        
            .swiper-slide {
                background-position: center;
                background-size: cover;
                width: 800px;
                height: 500px;
                /* box-shadow: 0 15px 50px rgba(0,0,0,0.2); */
                border-radius: 2rem;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 500px;
                border-radius: 2rem;
                object-fit: cover;
            }

            .swiperJob {
                width: 25rem;
                height: 25rem;
            }

            .swiper.mentor {
                width: 100%;
                padding-top: 50px;
                padding-bottom: 50px;
                background: transparent;
            }

            .swiper-slide.mentor {
                background-position: center;
                background-size: cover;
                width: 348.93px;
                height: 516.88px;
            }

            .swiper-slide.class img {
                display: block;
                width: 100%;
            }

            .swiper.class {
                width: 100%;
                padding-top: 50px;
                padding-bottom: 50px;
                background: transparent;
            }

            .swiper-slide.class {
                background-position: center;
                background-size: cover;
                width: 348.93px;
                height: 516.88px;
            }

            .swiper-slide.class img {
                display: block;
                width: 100%;
            }

            .swiper-3d .swiper-slide-shadow-left, .swiper-3d .swiper-slide-shadow-right {
                background-image: none;
            }

            .form-section {
                display: none;
            }

            .form-section.current {
                display: block;
            }

            .nav.current {
                background: #a78bfa;
            }

            .parsley-errors-list {

            }
            
            select option {
              margin: 40px;
              background: rgba(0, 0, 0, 0.5);
            }
            
            .text-caution-regist {
                font-size: 14px;
            }


            body {
                background-image: linear-gradient(to bottom, #111111, #131217, #14131c, #141421, #141526, #191a2f, #1e2039, #242543, #323155, #413d67, #504a79, #61578c, #61578c, #6c5a94, #795c9b, #865ea2, #9460a8, #ac63a5);
            }

            .swiper-pagination-bullet-active {
                background: #61578C;
            }

            @media screen and (max-width: 1118px) {
                .mySwiper .swiper-slide {
                    width: 75%;
                    height: 348px;
                    object-contain: fit;
                    margin-top: -2rem;
                }

                .mySwiperMentor .swiper-wrapper .swiper-slide.mentor .img-mentor{
                    display: block;
                    width: 100%;
                    height: 394px !important;
                    border-radius: 2rem;
                    object-fit: cover;
                }

                .mySwiperMentor .swiper-slide {
                    background-position: center;
                    background-size: cover;
                    width: 258.93px;
                    height: 480.88px;
                }

                .mySwiperMentor .swiper-wrapper {
                    margin-top: -5rem;
                }

                .mySwiperMentor .swiper-pagination {
                    position: absolute;
                    bottom: 7rem;
                }

                .mySwiperClass .swiper-wrapper .swiper-slide.class .img-class{
                    display: block;
                    width: 100%;
                    height: 381px !important;
                    border-radius: 2rem;
                    object-fit: cover;
                }

                .mySwiperClass .swiper-slide {
                    background-position: center;
                    background-size: cover;
                    width: 265.93px;
                    height: 378.88px;
                }
            }

            .container-chevron {
                position: relative;
                width: 24px;
                height: 24px;
                cursor: pointer;
            }

            .chevron {
                position: absolute;
                width: 28px;
                height: 8px;
                opacity: 0;
                transform: scale3d(0.5, 0.5, 0.5);
                animation: move 3s ease-out infinite;
            }

            .chevron:first-child {
                animation: move 3s ease-out 1s infinite;
            }

            .chevron:nth-child(2) {
                animation: move 3s ease-out 2s infinite;
            }

            .chevron:before,
            .chevron:after {
                content: ' ';
                position: absolute;
                top: 0;
                height: 100%;
                width: 51%;
                background: #fff;
            }

            .chevron:before {
                left: 0;
                transform: skew(0deg, 30deg);
            }

            .chevron:after {
                right: 0;
                width: 50%;
                transform: skew(0deg, -30deg);
            }

            @keyframes move {
                25% {
                    opacity: 1;

                }
                33% {
                    opacity: 1;
                    transform: translateY(30px);
                }
                67% {
                    opacity: 1;
                    transform: translateY(40px);
                }
                100% {
                    opacity: 0;
                    transform: translateY(55px) scale3d(0.5, 0.5, 0.5);
                }
            }

            .text {
                display: block;
                margin-top: 75px;
                margin-left: -30px;
                font-family: "Helvetica Neue", "Helvetica", Arial, sans-serif;
                font-size: 12px;
                color: #fff;
                text-transform: uppercase;
                white-space: nowrap;
                opacity: .25;
                animation: pulse 2s linear alternate infinite;
            }

            @keyframes pulse {
                to {
                    opacity: 1;
                }
            }

            :root {
            --color-text: navy;
            --color-bg: papayawhip;
            --color-bg-accent: #ecdcc0;
            --size: clamp(10rem, 1rem + 40vmin, 30rem);
            --gap: calc(var(--size) / 14);
            --duration: 60s;
            --scroll-start: 0;
            --scroll-end: calc(-100% - var(--gap));
            }

            @media (prefers-color-scheme: dark) {
            :root {
                --color-text: papayawhip;
                --color-bg: navy;
                --color-bg-accent: #2626a0;
            }
            }

            .marquee-wrapper {
                display: grid;
                align-content: center;
                overflow: hidden;
                gap: var(--gap);
                min-height: fit-content;
                font-family: system-ui, sans-serif;
                font-size: 1rem;
                line-height: 1.5;
                color: var(--color-text);
                background-color: transparent;
            }

            .marquee {
                display: flex;
                overflow: hidden;
                user-select: none;
                gap: var(--gap);
                mask-image: linear-gradient(
                    var(--mask-direction, to right),
                    hsl(0 0% 0% / 0),
                    hsl(0 0% 0% / 1) 20%,
                    hsl(0 0% 0% / 1) 80%,
                    hsl(0 0% 0% / 0)
                );
            }

            .marquee__group {
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: space-around;
                gap: var(--gap);
                min-width: 100%;
                animation: scroll-x var(--duration) linear infinite;
            }

            @media (prefers-reduced-motion: reduce) {
                .marquee__group {
                    animation-play-state: paused;
                }
            }

            .marquee--vertical {
                --mask-direction: to bottom;
            }

            .marquee--vertical,
            .marquee--vertical .marquee__group {
                flex-direction: column;
            }

            .marquee--vertical .marquee__group {
                animation-name: scroll-y;
            }

            .marquee--reverse .marquee__group {
                animation-direction: reverse;
                animation-delay: -3s;
            }

            @keyframes scroll-x {
                from {
                    transform: translateX(var(--scroll-start));
                }
                to {
                    transform: translateX(var(--scroll-end));
                }
            }

            @keyframes scroll-y {
                from {
                    transform: translateY(var(--scroll-start));
                }
                to {
                    transform: translateY(var(--scroll-end));
                }
            }

            /* Element styles */
            .marquee .svg {
                display: grid;
                place-items: center;
                width: var(--size);
                fill: var(--color-text);
                /* background: var(--color-bg-accent); */
                aspect-ratio: 16/9;
                padding: calc(var(--size) / 10);
                border-radius: 0.5rem;
            }

            .marquee--vertical .svg {
                aspect-ratio: 1;
                width: calc(var(--size) / 1.5);
                padding: calc(var(--size) / 6);
            }

            /* Parent wrapper */
            .wrapper {
                display: flex;
                flex-direction: column;
                gap: var(--gap);
                margin: auto;
                max-width: 100vw;
            }

            .wrapper--vertical {
                flex-direction: row;
                height: 100vh;
            }

            @keyframes fade {
                to {
                    opacity: 0;
                    visibility: hidden;
                }
            }

            /* Hide scrollbar for Chrome, Safari and Opera */
            .regist::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .regist {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }

            .regist::-webkit-scrollbar {
                background-color: white;
                opacity: 10;
            }

            ::-webkit-scrollbar-thumb {
                background-color: white;    /* color of the scroll thumb */
                border-radius: 20px;       /* roundness of the scroll thumb */
                opacity: 30; /* creates padding around scroll thumb */
            }
        </style>
    </head>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C24B1WQE2M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-C24B1WQE2M');
    </script>

    <body class="antialiased font-gilroyRegular w-full h-full relative overflow-x-hidden bg-[linear-gradient(to bottom, #111111, #131217, #14131c, #141421, #141526, #191a2f, #1e2039, #242543, #323155, #413d67, #504a79, #61578c);] @if($heroButton === "Regist") regist @endif">

        @include('sweetalert::alert')
        
        @if($heroButton != 'Regist')
        <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 top-0 left-0">
        <img style="left: -23rem; top: -15rem;" src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 -top-[30rem] right-[10rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 top-[30rem] -left-[10rem] md:-left-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 top-[60rem] right-0 md:-right-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 top-[90rem] -left-[10rem] md:-left-[30rem]">

            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-0 md:-left-[30rem]">
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-[30rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-[30rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-[30rem] md:-left-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-[60rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/LsZXVMQb/gradient-compressed-1-min-1-min-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-50 bottom-[90rem] md:-left-[30rem]">
        @endif

        @if($heroButton != 'Regist')
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[200vh] h-[100vh] hidden md:block md:h-[200vh] absolute -z-30 -top-[30rem] right-[10rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[800px] h-[800px] object-cover md:object-contain block md:hidden md:h-[200vh] absolute -z-30 top-[90rem] md:-left-[30rem]">

            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[900px] h-[900px] object-cover md:object-contain block md:hidden md:h-[200vh] absolute -z-30 top-[120rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[900px] h-[900px] object-cover md:object-contain block md:hidden md:h-[200vh] absolute -z-30 top-[150rem] md:-left-[30rem]">
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[900px] h-[900px] object-cover md:object-contain block md:hidden md:h-[200vh] absolute -z-30 top-[180rem] md:-right-[30rem]">
            <img src="https://i.postimg.cc/8c1bLs5D/gradient-compressed-2-min-1-min.png" alt="" class="w-[900px] h-[900px] object-cover md:object-contain block md:hidden md:h-[200vh] absolute -z-30 top-[210rem] md:-left-[30rem]">
        @endif

        @if($heroButton == 'Regist')
            <a href="/MUAVol9" class="flex space-x-2 items-center justify-center p-4 bg-white-200 bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-40 border-[rgba(299,299,299,0.5)] border-[1px] absolute w-fit rounded-[100%] left-[2rem] md:left-20 md:top-6" style="top: -.3rem; margin-bottom: 2rem;" title="MUA Vol. 9's Website">
                <i class='bx bx-home-alt-2 text-white animate:pulse' ></i>
            </a>
        @endif

        @yield('content')

        <audio autoplay loop>
            <source src="{{ asset('assets/audio/mua.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        @if($heroButton != 'Regist')
            @include('MUA.layouts.footer')
        @endif

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            $(function() {
                var $sections = $('.form-section');
                var $navs = $('.nav');

                function navigateTo(index) {
                    $sections.removeClass('current').eq(index).addClass('current');
                    $navs.removeClass('current').eq(index).addClass('current');

                    $('.form-navigation .previous').toggle(index>0);
                    var atTheEnd = index >= $sections.length - 1;
                    $('.form-navigation .next').toggle(!atTheEnd);
                    $('.form-navigation [Type=submit]').toggle(atTheEnd);
                }

                function curIndex() {
                    return $sections.index($sections.filter('.current'));
                }

                $('.form-navigation .previous').click(function() {
                    navigateTo(curIndex() - 1);
                });

                $('.form-navigation .next').click(function() {
                    $('.registration-form').parsley().whenValidate({
                        group: 'block-'+curIndex()
                    }).done(function() {
                        navigateTo(curIndex()+1);
                    });
                })

                $sections.each(function(index, section) {
                    $(section).find(':input').attr('data-parsley-group', 'block-'+index);
                })

                navigateTo(0);
            });

            $(function() {
                $('.container-chevron').on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({ scrollTop: $($(this)).offset().top}, 500, 'linear');
                });
            });

            var swiper = new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 2,
                    slideShadows: true,
                },
                loop: true,
                // autoplay: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            var swiper = new Swiper(".mySwiperMentor", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                autoplay: true,
                loop: true,
                });

                var swiper = new Swiper(".mySwiperClass", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                autoplay: true,
                loop: true,
                });

            var swiperJob = new Swiper(".mySwiperJob", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 2,
                    slideShadows: true,
                },
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            const control = document.getElementById("direction-toggle");
            const marquees = document.querySelectorAll(".marquee");
            const wrapper = document.querySelector(".wrapper");

            control.addEventListener("click", () => {
            control.classList.toggle("toggle--vertical");
            wrapper.classList.toggle("wrapper--vertical");
            [...marquees].forEach((marquee) =>
                marquee.classList.toggle("marquee--vertical")
            );
            });

        </script>

    </body>
</html>
