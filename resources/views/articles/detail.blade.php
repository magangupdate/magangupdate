@extends('layouts.main', [
    'title' => $article->title,
    'active' => 'Detail',
    'heroTitle' => $article->title,
    'heroDescription' => $article->description,
    'heroButton' => '',
    'description' => $article->description,
    'keywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media, kue cubit, interview, wawancara, magangupdate, metode, maksimalkan, potensi',
    'canonical' =>  'https://magangupdate.id/articles',
    'image' => 'https://i.postimg.cc/PfCFTDkB/Cover-Kue-Cubit.png',
])

@section('content')
<section class="flex flex-col mt-[15vh] md:mt-[20vh] text-white">
            <article class="max-w-5xl px-6 mx-auto space-y-12 dark:text-gray-50">
                <div class="w-full mx-auto space-y-4 text-center" data-aos="zoom-in">
                    <p class="text-xs font-semibold tracking-wider uppercase">#PengetahuanMU</p>
                    <h1 class="text-4xl font-bold leading-tight md:text-5xl max-w-3xl mx-auto">{{ $article->title }}</h1>
                    <p class="text-sm dark:text-gray-400">by
                        <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-400">
                            <span itemprop="name">{{ $article->author }}</span>
                        </a>on
                        <time datetime="2021-02-12 15:34:18-0200">May 22nd 2023</time>
                    </p>
                    <br/>

                    <img src='{{ asset("storage/storage/$article->thumbnail") }}' alt="{{ $article->title }}" title="{{ $article->title }}" class="mt-8 rounded-lg mx-auto w-full md:w-[450px]"  />
                </div>
                <div class="dark:text-gray-100">
                    {!! $article->body !!}
                </div>
                <div class="pt-12 border-t dark:border-gray-700">
                   
                </div>
            </article>
        </section>
@endsection
