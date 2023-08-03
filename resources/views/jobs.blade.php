@extends('layouts.main', [
    'title' => 'Jobs - Find & Start your journey from here',
    'active' => 'Jobs',
    'heroTitle' => "Find & Start Your<br> Journey From Here!",
    'heroDescription' => "Search the information by company's name, type of working, and etc",
    'heroButton' => '',
    'description' => '
        
    ',
    'keywords' => 'hunters, magangupdate, opportunities, internship, job, part time, volunteer, magang update acceleration program, cv clinic, cv review, magang update academy, webinar, social media',
    'canonical' =>  'http://localhost:8000/jobs'
])

@section('content')
<div class="max-w-screen-xl p-5 mx-auto dark:text-gray-100 mt-10">
	<div class="grid grid-cols-1 place-items-center gap-5 lg:grid-cols-3 sm:grid-cols-2">
        <a href="/jobs/goers-internship" class="hover:animate-pulse relative flex items-end justify-start w-[380px] rounded-[20px] text-left bg-center bg-cover bg-no-repeat h-[400px] dark:bg-gray-500" style="background-image: url(&quot;https://i.postimg.cc/4dcwpXtP/konten-biru-27.png&quot;);">
			<div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900 rounded-[20px]"></div>
		</a>
		<a href="/jobs/wings-internship" class="hover:animate-pulse relative flex items-end justify-start w-[380px] rounded-[20px] text-left bg-center bg-cover bg-no-repeat h-[400px] dark:bg-gray-500" style="background-image: url(&quot;https://i.postimg.cc/XJxmZTX2/Wings1.png&quot;);">
			<div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900 rounded-[20px]"></div>
		</a>
        <a href="/jobs/malam-minggu-markeing-communication-and-graphic-designer-intern" class="hover:animate-pulse relative flex items-end justify-start w-[380px] rounded-[20px] text-left bg-center bg-cover bg-no-repeat h-[400px] dark:bg-gray-500" style="background-image: url(&quot;https://i.postimg.cc/FHVXmpwG/MALAM-MINGGU-1.png&quot;);">
			<div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900 rounded-[20px]"></div>
		</a>
        <a href="/jobs/mitrasasana-architect-intern" class="hover:animate-pulse relative flex items-end justify-start w-[380px] rounded-[20px] text-left bg-center bg-cover bg-no-repeat h-[400px] dark:bg-gray-500" style="background-image: url(&quot;https://i.postimg.cc/xTHSpnRw/MIX-1.png&quot;);">
			<div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900 rounded-[20px]"></div>
		</a>
        <a href="/jobs/asean-foundation-onsite-internship" class="hover:animate-pulse relative flex items-end justify-start w-[380px] rounded-[20px] text-left bg-center bg-cover bg-no-repeat h-[400px] dark:bg-gray-500" style="background-image: url(&quot;https://i.postimg.cc/MG7hwcwJ/ASEAN-1.png&quot;);">
			<div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900 rounded-[20px]"></div>
		</a>
	</div>
</div>
@endsection