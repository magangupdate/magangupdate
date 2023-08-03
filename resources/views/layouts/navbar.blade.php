
<header class="header">
    <nav class="nav">
        <div class="nav__data">
            <a href="{{ route('home') }}" title="Home" class="nav__logo">
                <img src="{{ asset('assets/images/logos/logo-transparent.webp') }}" alt="Magang Update's Logo" title="Magang Update's Logo" class="w-12 h-12">
            </a>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__toggle-menu"></i>
                <i class="ri-close-line nav__toggle-close"></i>
            </div>
        </div>
        <div class="nav__menu text-[15px]" id="nav-menu">
            <ul class="nav__list">
                <li>
                    <a href="/" class="nav__link">Home</a>
                </li>

                <li>
                    <a href="/jobs" class="nav__link">Jobs</a>
                </li>

                <li>
                    <a href="/articles" class="nav__link">Articles</a>
                </li>

                <li class="dropdown__item">
                    <div class="nav__link dropdown__button">
                        Our Programs <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-flashlight-line"></i>
                                </div>

                                <span class="dropdown__title">MagangUpdate Acceleration Program</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">About MUAP #16 </a>
                                    </li>
                                    
                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">Register MUAP #16</a>
                                    </li>

                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">Download Guidebook</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-heart-3-line"></i>
                                </div>

                                <span class="dropdown__title">MagangUpdate Academy</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="/MUAVol9" class="dropdown__link">About MUA Vol. 9</a>
                                    </li>
                                    
                                    <li>
                                        <a href="/RegistMUAVol9" class="dropdown__link">Register MUA Vol. 9</a>
                                    </li>

                                    <li>
                                        <a href="https://bit.ly/BookletMenteeMUAVol9" class="dropdown__link">Download Booklet</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-book-mark-line"></i>
                                </div>

                                <span class="dropdown__title">CV Clinic</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">CV Clinic</a>
                                    </li>
                                    
                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">Review Your CV</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-file-paper-2-line"></i>
                                </div>

                                <span class="dropdown__title">Webinars</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="/coming-soon" class="dropdown__link">Coming Soon</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>