        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

        <script>
            AOS.init();

            $(function() {
                $('.preload').fadeOut(2000, function() {
                    $('.content').fadeIn(2500);
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
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
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
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            var swiperPricing = new Swiper(".mySwiperPricing", {
                slidesPerView: 3,
                spaceBetween: 30,
                grabCursor: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                loop: true,
                autoplay: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            const nav = document.querySelector('.header');
            const dropdownContainer = document.querySelector('.dropdown__container')

            window.onscroll = function () {
                var currentScrollPos = window.pageYOffset;
                // var navbar = document.querySelector('.nav')
                // var banner = document.querySelector('.banner')

                if (currentScrollPos > 30) {
                    nav.classList.add('navbar-bg');
                    // navbar.classList.add('nav-bg');
                    // banner.classList.add('banner-bg');

                    // dropdownContainer.add('dropdown-bg');
                } else {
                    nav.classList.remove('navbar-bg');
                    // navbar.classList.remove('nav-bg');
                    // banner.classList.remove('banner-bg')
                    // dropdownContainer.remove('dropdown-bg');
                }
            }

            const counterUp = window.counterUp.default

            const universities = document.querySelector( '.universities' )
            const startups = document.querySelector( '.startups' )
            const events = document.querySelector( '.events' )

            // Start counting, do this on DOM ready or with Waypoints.
            counterUp( universities, {
                duration: 1500,
                delay: 16,
            } )

            counterUp( startups, {
                duration: 1500,
                delay: 16,
            } )

            counterUp( events, {
                duration: 1500,
                delay: 16,
            } )

            /*===================== SHOW MENU ===================*/
            const showMenu = (toggleId, navId) => {
                const toggle = document.getElementById(toggleId),
                      nav    = document.getElementById(navId),
                      header = document.querySelector('.header')

                toggle.addEventListener('click', () => {
                    // Add show-menu class to nav menu
                    nav.classList.toggle('show-menu')
                    header.classList.toggle('show-bg')

                    // Add show-icon to show and hide the menu icon
                    toggle.classList.toggle('show-icon')
                })
            }

            showMenu('nav-toggle', 'nav-menu')

            /*===================== SHOW DROPDOWN MENU ===================*/
            const dropdownItems = document.querySelectorAll('.dropdown__item')
            
            // 1. Select each dropdown item
            dropdownItems.forEach((item) => {
                const dropdownButton = item.querySelector('.dropdown__button')

                // 2. Select each button click
                dropdownButton.addEventListener('click', () => {
                    const showDropdown = document.querySelector('.show-dropdown')

                    toggleItem(item)

                    if (showDropdown && showDropdown != item) {
                        toggleItem(showDropdown)
                    }
                })
            })

            // 3. create a function to display the dropdown
            const toggleItem = (item) => {
                const dropdownContainer = item.querySelector('.dropdown__container')

                if (item.classList.contains('show-dropdown')) {
                    dropdownContainer.removeAttribute('style')
                    item.classList.remove('show-dropdown')
                } else {
                    dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
                    item.classList.add('show-dropdown')
                }
                
            }

            const mediaQuery = matchMedia('(min-width: 1118px)')

            const removeStyle = () => {
                if (mediaQuery.matches) {
                    dropdownContainer.forEach((e) => {
                        e.removeAttribute('style')
                    })

                    dropdownItems.forEach((e) => {
                        e.classList.remove('show-dropdown')
                    })
                }
            }

            addEventListener('resize', removeStyle)

        </script>