@extends('layouts.main', [
    'title' => 'Wings Internship Program - MagangUpdate Jobs',
    'active' => 'Detail',
    'heroTitle' => "Wings Internship Program",
    'heroDescription' => '',
    'heroButton' => '',
    'description' => 'Simak tips interview dengan menggunakan metode ala “kue cubit” yang dijamin bikin recruiter auto merapat!',
    'keywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media, kue cubit, interview, wawancara, magangupdate, metode, maksimalkan, potensi',
    'canonical' =>  'https://magangupdate.id/articles',
    'image' => 'https://i.postimg.cc/PfCFTDkB/Cover-Kue-Cubit.png',
])

@section('content')
<section class="flex flex-col mt-[15vh] md:mt-[20vh] text-white">
    <article class="max-w-5xl px-6 mx-auto space-y-12 dark:text-gray-50">
        <div class="w-full mx-auto space-y-4 text-center" data-aos="zoom-in">
            <p class="text-xs font-semibold tracking-wider uppercase">#Internship</p>
            <h1 class="text-4xl font-bold leading-tight md:text-5xl max-w-3xl mx-auto">Wings Internship Program</h1>
            <p class="text-sm dark:text-gray-400">by
                <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-400">
                    <span itemprop="name">PT Wings</span>
                </a>
                {{-- <time datetime="2021-02-12 15:34:18-0200">May 22nd 2023</time> --}}
            </p>
            <br/>

            <div class="swiperJob mySwiperJob mt-8 mx-auto">
                <div class="swiper-wrapper">
                    <div class="swiper-slide job relative">
                        <img src="https://i.postimg.cc/XJxmZTX2/Wings1.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    </div>
                    <div class="swiper-slide job relative">
                        <img src="https://i.postimg.cc/gjT7s8V8/Wings2.png" title="Slider's Image" alt="Slider's Image" class="-z-50 absolute" />
                    </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="dark:text-gray-100">
            <p class="text-justify">
                LOWONGAN MAGANG WINGS GROUP<br><br>

                Sukses ga mungkin bisa tercapai kalau kita ga belajar. Jadikan pengalamanmu sebagai pembelajaran terbaik dalam hidup.<br><br>

                PT Wings merupakan perusahaan yang bergerak di bidang makanan dan minuman yang sudah terkenal di Indonesia. Saat ini, PT Wings membuka kesempatan magang bagi mahasiswa yang ingin mendapatkan pengalaman kerja di perusahaan tersebut. Magang di PT Wings akan memberikan pengalaman yang sangat berharga bagi mahasiswa yang ingin memperluas pengetahuan dan keterampilan di bidang makanan dan minuman. Selain itu, magang di PT Wings juga akan memberikan kesempatan bagi mahasiswa untuk belajar dari para profesional di bidang makanan dan minuman yang sudah berpengalaman.<br><br>

                Selama magang, mahasiswa akan diberikan tugas-tugas yang sesuai dengan bidang studi mereka dan akan mendapatkan arahan dari supervisor yang sudah ditunjuk oleh PT Wings. Selain itu, mahasiswa juga akan diberikan kesempatan untuk berpartisipasi dalam kegiatan-kegiatan yang diadakan oleh PT Wings, seperti event dan penjualan. Magang di PT Wings juga akan memberikan kesempatan bagi mahasiswa untuk memperluas jaringan dan membangun hubungan yang baik dengan orang-orang di industri makanan dan minuman. Jika kamu tertarik untuk magang di PT Wings, jangan ragu untuk mengirimkan lamaranmu sekarang juga!<br><br>

                Let's go kita belajar bareng, dan bertumbuh bersama Wings Group.
                Scan barcode atau registrasi melalui <a class="text-[#8195DE]" href="https://lnkd.in/gHaKrnvB">Link Registrasi Berikut</a>
            </p><br/><br/>
        </div>
        <div class="pt-12 border-t dark:border-gray-700">
           
        </div>
    </article>
</section>
@endsection
