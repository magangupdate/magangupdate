 <footer class="pt-16 mt-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-[90rem] px-5 md:px-24 lg:px-8 text-white">
    <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
        {{-- DESCRIPTION --}}
        <div class="sm:col-span-2">
            <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                <img src="{{ asset('assets/images/logos/logo-full.webp') }}" alt="MagangUpdate's Logo" title="MagangUpdate's Logo" class="w-56">
            </a>
            <div class="mt-2 lg:max-w-sm">
                <p class="text-sm">
                    MagangUpdate Network is an informative and educative media about the world of internships. This media has been around since 2012 and has experience in collaborating with various event activities and companies.
                </p>
            </div>
        </div>

        {{-- CONTACT --}}
        <div class="space-y-2 text-sm">
            <p class="text-base font-bold tracking-wide">Contacts</p>
            <div class="flex">
                <p class="mr-1">Phone:</p>
                <a href="tel:6281387634196" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">+62 813-8763-4196</a>
            </div>
            <div class="flex">
                <p class="mr-1">Email:</p>
                <a href="mailto:marketing@seputarkampus.com" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">marketing@seputarkampus.com</a>
            </div>
            <div class="flex">
                <p class="mr-1">Address:</p>
                <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
                    Jakarta, Indonesia
                </a>
            </div>
        </div>

        {{-- SOCIALS LINK --}}
        <div>
            <span class="text-base font-bold tracking-wide">Socials</span>
            <div class="flex items-center mt-1 space-x-3">
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <i class='bx bxl-twitter text-[36px]'></i>
                </a>
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <i class='bx bxl-instagram text-[36px]' ></i>
                </a>
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <i class='bx bxl-linkedin-square text-[36px]' ></i>
                </a>
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <i class='bx bxl-youtube text-[36px]' ></i>
                </a>
            </div>
            <p class="mt-4 text-sm ">
                Follow our social media for more information.
            </p>
        </div>
    </div>

    {{-- COPYRIGHT --}}
    <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
        <p class="text-sm text-gray-200">
            © Copyright 2023 MagangUpdate. All rights reserved.
        </p>
        <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
            <li>
                <a href="/coming-soon" class="text-sm text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy Policy</a>
            </li>
            <li>
                <a href="/coming-soon" class="text-sm text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms &amp; Conditions</a>
            </li>
        </ul>
    </div>
</footer>