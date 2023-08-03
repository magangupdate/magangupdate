<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $description }}">
        <meta name="keywords" content="{{ $keywords }}">
        <meta name="author" content="MagangUpdate">
        <meta http-equiv="refresh" content="3600">

        <title>{{ $title }}</title>

        <link rel="canonical" href="{{ $canonical }}">
        <link rel="icon" href="{{ asset('assets/images/logos/logo-transparent.webp') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

         <!--=============== REMIXICONS ===============-->
         <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

         <!--=============== AOS ===============-->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!--=============== BOXICONS ===============-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
        />

        @if ($active === "Home")
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
                box-shadow: 0 15px 50px rgba(0,0,0,0.2);
                border-radius: 2rem;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 500px;
                border-radius: 2rem;
                object-fit: cover;
            }

            .swiper-slide.job img {
                display: block;
                width: 500px;
                height: 500px;
                border-radius: 2rem;
                object-fit: cover;
            }
            
            @media screen and (max-width: 1118px) {
                .mySwiper .swiper-slide {
                    width: 75%;
                    height: 348px;
                    object-contain: fit;
                    margin-top: -2rem;
                }
            }
        </style>
        @endif

        <style>
            body {
                -webkit-font-family: 'Poppins', 'sans-serif' !important;
            }

            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiperMUA {
                width: 100%;
                height: 100%;
            }

            .swiperJob {
                width: 25rem;
                height: 25rem;
            }

             .testimonial-contents .testimonial-col-2 {
                animation: move-down 15s ease-in infinite;
                bottom: 50px
            }

            .testimonial-contents .testimonial-col:first-child {
                animation: move 15s ease-in infinite;
                top: 50px
            }

            .swiper-pagination-bullet {
                background: rgba(255,255,255,0.6);
            }

            .swiper-pagination-bullet.swiper-pagination-bullet-active {
                background: white;
            }

            @keyframes move {
                0% {
                    top: 70px;
                }
                50% {
                    top: -55px;
                }
                100% {
                    top: 70px;
                }
            }

            @keyframes move-down {
                0% {
                    bottom: 70px;
                }
                50% {
                    bottom: -55px;
                }
                100% {
                    bottom: 70px;
                }
            }

            .preload {
                display: flex;
                position: absolute;
                justify-content: center;
                background: #111;
                height: 100%;
                width: 100%;
                z-index: 150;
                overflow: hidden;
            }

            .preload img {
                margin-top: 25vh;
            }
        </style>

        @if ($active === 'MUA')
            <link rel="stylesheet" href="{{ asset('assets/css/mua.css') }}">
        @endif

        <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js">	</script>

        @vite('resources/css/app.css')
    </head>

    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-WF4147GRZL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-WF4147GRZL');
    </script> --}}

    <body class="antialiased font-gilroyRegular bg-[#111] w-full h-full relative overflow-x-hidden">

        <div class="preload">
            <img src="{{ asset('assets/images/logos/logo-transparent.webp') }}" alt="" class="w-16 h-16">
        </div>

        @if ($active !== 'MUA')
            <img src="https://i.postimg.cc/gjbJN6b2/circle-decoration.webp" alt="Circle Decoration" title="Circle Decoration" class="top-[15vh] @if ($active === 'Coming Soon') h-screen w-fit object-cover -top-[10vh] @endif w-full h-auto mx-auto absolute -z-30">
        @endif

        @if ($active === 'Home')

            <div class="gradient-05 overflow-hidden -left-[2vh] md:left-[10rem]"></div>
            <div class="gradient-051 overflow-hidden -left-[15vh] md:left-0"></div>
            <div class="gradient-052 overflow-hidden -left-[16vh] md:left-0"></div>
            
            <div class="gradient-06 overflow-hidden right-[25rem]"></div>
            <div class="gradient-061 overflow-hidden right-[19rem]"></div>
            <div class="gradient-062 overflow-hidden right-[21rem]"></div>
            
        @endif

        @if ($active === 'Articles')
            <img src="{{ asset('assets/images/gradient-decoration-2.webp') }}" alt="Gradient's Decoration" title="Gradient's Decoration" class="gradient-decoration absolute top-0 right-0 -z-20 overflow-hidden">
        @endif

        @if ($active !== 'MUA')
            @include('layouts.navbar')
        @endif

        @if ($active === 'MUA')
        {{-- <audio autoplay loop>
            <source src="{{ asset('assets/audio/mua.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> --}}
        <div class="w-full mx-auto absolute top-[250vh]">
            <img src="https://i.postimg.cc/d1P1RySX/pusaran-1.webp" class="h-[100vh] w-[130vh] opacity-25 mx-auto -z-20" alt="">
        </div>
        @endif

        @include('layouts.hero')

        @yield('content')

        @if ($active !== 'MUA')
            @include('layouts.footer')
        @endif

        @include('layouts.scripts')

    </body>
</html>
