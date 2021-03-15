@extends('layouts.header')

@section('content')
    <!-- Hero -->
    <header class="hero">
        <div class="slider slider-horizontal">
            <div class="slider__caption swiper-container">
                <div class="swiper-wrapper">
                    <!-- Caption 1 -->
                    <div class="swiper-slide">
                        <div class="slider__item">
                            <h6 class="title title--overhead"><span class="down-up"><span>Web development</span></span>
                            </h6>
                            <h1 class="title title--display-1 js-text-wave">Веб-приложения</h1>
                            <p class="description"><span class="down-up"><span>В нашей компании все разработчики, дизайнеры и аналитики работают вместе. Именно это является важнейшим аспектом при создание отзывчивого и быстрого веб сайта с отличным дизайном.</span></span>
                            </p>
                            <a class="btn-link btn-link--circle-right" href="projects1.html"><span
                                    class="down-up"><span>{{ __('Learn more') }}<i
                                            class="circle circle--right icon-right-open"></i></span></span></a>
                        </div>
                    </div>
                    <!-- /Caption 1 -->

                    <!-- Caption 2 -->
                    <div class="swiper-slide">
                        <div class="slider__item">
                            <h6 class="title title--overhead"><span class="down-up"><span>Mobile apps</span></span></h6>
                            <h1 class="title title--display-1 js-text-wave mb-0 pb-0">Мобильные</h1>
                            <h1 class="title title--display-1 js-text-wave mt-0 pt-0">приложения</h1>
                            <p class="description"><span class="down-up"><span>Уникальная Решения для каждого клиента – вот наш девиз. До того как мы начинаем планирование каждого проекта, мы изучаем целевую аудитории нашего клиента чтобы клиент получал максимальную пользу от готового продукта.</span></span>
                            </p>
                            <a class="btn-link btn-link--circle-right" href="projects2.html"><span
                                    class="down-up"><span>{{ __('Learn more') }}<i
                                            class="circle circle--right icon-right-open"></i></span></span></a>
                        </div>
                    </div>
                    <!-- /Caption 2 -->

                    <!-- Caption 3 -->
                    <div class="swiper-slide">
                        <div class="slider__item">
                            <h6 class="title title--overhead"><span class="down-up"><span>Design</span></span></h6>
                            <h1 class="title title--display-1 js-text-wave">Дизайн</h1>
                            <p class="description"><span class="down-up"><span>Дизайн - Важнейший этап разработки любого проекта. Потому что именно хороший дизайн привлекает пользователей. Мы поможем вам создать уникальный дизайн для вашего продукта.</span></span>
                            </p>
                            <a class="btn-link btn-link--circle-right" href="projects3.html"><span
                                    class="down-up"><span>{{ __('Learn more') }}<i
                                            class="circle circle--right icon-right-open"></i></span></span></a>
                        </div>
                    </div>
                    <!-- /Caption 3 -->
                </div>
            </div>

            <div class="slider__image swiper-container reveal">
                <div class="swiper-wrapper">
                    <!-- Image 1 -->
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload overlay--45" data-bg="/assets/img/image_slider_1.jpg"><a
                                class="swiper-slide__link" href="projects1.html"></a></div>
                    </div>
                    <!-- /Image 1 -->

                    <!-- Image 2 -->
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload overlay--45" data-bg="/assets/img/image_slider_1_2.jpg"><a
                                class="swiper-slide__link" href="projects2.html"></a></div>
                    </div>
                    <!-- /Image 2 -->

                    <!-- Image 3 -->
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload overlay--45" data-bg="/assets/img/image_slider_1_3.jpg"><a
                                class="swiper-slide__link" href="projects3.html"></a></div>
                    </div>
                    <!-- /Image 3 -->
                </div>
            </div>

            <!-- Control -->
            <div class="control-slider control-slider--vertical swiper-control">
                <div></div>
                <div class="swiper-pagination"></div>
                <div>
                    <div class="swiper-button-next zoom-cursor">
                        <svg class="slider-nav slider-nav--progress" viewBox="0 0 46 46">
                            <g class="slider-nav__path-progress slider-nav__path-progress--gray">
                                <path d="M0.5,23a22.5,22.5 0 1,0 45,0a22.5,22.5 0 1,0 -45,0"/>
                            </g>
                        </svg>
                        <svg class="slider-nav slider-nav--gray" viewBox="0 0 46 46">
                            <circle class="slider-nav__path--gray" cx="23" cy="23" r="22.5"/>
                            <path class="slider-nav__arrow"
                                  d="M26.45 22.45l-4.91-4.91a.7707464.7707464 0 0 0-1.09 1.09L24.82 23l-4.36 4.36a.7707464.7707464 0 0 0 1.09 1.09l4.91-4.91a.77.77 0 0 0-.01-1.09z"/>
                        </svg>
                    </div>
                    <div class="swiper-button-prev zoom-cursor">
                        <svg class="slider-nav slider-nav--gray" viewBox="0 0 46 46">
                            <circle class="slider-nav__path--gray" cx="23" cy="23" r="22.5"/>
                            <path class="slider-nav__arrow"
                                  d="M18.5 23.55l4.91 4.91a.7707464.7707464 0 1 0 1.09-1.09L20.14 23l4.36-4.36a.7707464.7707464 0 0 0-1.09-1.09l-4.91 4.9a.77.77 0 0 0 0 1.1z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- /Control -->

            <div class="social social--floating">
                <a class="social__link">FB</a>
                <a class="social__link">TW</a>
                <a class="social__link">IG</a>
            </div>
        </div>
    </header>
    <!-- /Hero -->

@endsection
