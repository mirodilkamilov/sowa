@extends('layouts.header')
@section('content')

    {{--    TODO: Top Navbar is different from main one (back icon instead of logo)--}}
    <section class="project-single">
        <!-- Intro -->
        <header class="header-page header-page--half js-opacity">
            <div class="container">
                <!-- Title -->
                <h6 class="title title--overhead title--tail">{{ $project->category }}</h6>
                <h1 class="title title--display-1 js-lines">{{ $project->title }}</h1>
                <!-- /Title -->

                {{--TODO: slug links working--}}
                {{--<a href="{{ $project->path() }}">link to project</a>--}}


            </div>
        </header>
        <!-- /Intro -->

        <!-- Image -->
        <figure class="image-container jarallax reveal">
            <img class="jarallax-img cover lazyload" src="/assets/img/projects/yuridik/yuridik-1.png" alt=""/>
        </figure>
        <!-- /Image -->

        <div class="container">
            <!-- Details -->
            <div class="case-details">
                <div class="item-details">
                    <span class="item-details__title title--overhead">Клиент</span>
                    <span class="item-details__text">Yuridik Xizmat</span>
                </div>
                <div class="item-details">
                    <span class="item-details__title title--overhead">Год</span>
                    <span class="item-details__text">2019</span>
                </div>
                <div class="item-details">
                    <span class="item-details__title title--overhead">Тип проекта</span>
                    <span class="item-details__text">Веб-сайт</span>
                </div>
                <div class="item-details item-details--end">
                    <a class="btn-link" target="_blank" href="https://yuridik.uz/">Посмотреть сайт<i
                            class="circle circle--right icon-right-open"></i></a>
                </div>
            </div>
            <!-- /Details -->
        </div>

        <article class="caption-single container">
            <div class="row">
                <div class="col-12 col-lg-2"><span class="num-article">01 —</span></div>
                <div class="col-12 col-lg-9">
                    <h2 class="title title--h4 js-lines">Yuridik – онлайн платформа для оказания юридической помощи
                        гражданам Узбекистана.</h2>
                    <div class="description js-block">
                        <p>Yuridik.uz - это платформа для онлайн-юридических услуг, которая служит средством общения
                            между юристами и клиентами.Возвращают деньги, если качество обслуживания вас не
                            удовлетворит</p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Image -->
        <figure class="image-container image-container--gutters reveal">
            <img class="cover lazyload" src="/assets/img/projects/yuridik/yuridik-2.png" alt=""/>
        </figure>
        <!-- /Image -->

        <article class="caption-single container">
            <div class="row">
                <div class="col-12 col-lg-2"><span class="num-article">02 —</span></div>
                <div class="col-12 col-lg-9">
                    <h2 class="title title--h4 js-lines">Задача</h2>
                    <div class="description js-block">
                        <p>Создать удобный портал, где каждый гражданин РУз мог получить профессиональную
                            консультацию
                            на бесплатной основе.</p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Slider -->
        <div class="slider slider-simply image-container--half reveal">
            <div class="slider-article swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload"
                             data-bg="/assets/img/projects/yuridik/yuridik-3.png"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload"
                             data-bg="/assets/img/projects/yuridik/yuridik-4.png"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cover-slider lazyload"
                             data-bg="/assets/img/projects/yuridik/yuridik-5.png"></div>
                    </div>
                </div>
            </div>

            <div class="control-slider control-slider--bottom swiper-control">
                <div class="swiper-button-next swiper-button-next--square zoom-cursor">
                    <i class="icon-up-open"></i>
                </div>
                <div class="swiper-button-prev swiper-button-prev--square zoom-cursor">
                    <i class="icon-down-open"></i>
                </div>
            </div>
        </div>
        <!-- /Slider -->

        <article class="caption-single container">
            <div class="row">
                <div class="col-12 col-lg-2"><span class="num-article">03 —</span></div>
                <div class="col-12 col-lg-9">
                    <h2 class="title title--h4 js-lines">Сделано</h2>
                    <div class="description js-block">
                        <p>Портал был разработан с учетом максимального удобства для людей любых возрастов. Это
                            стало
                            возможным благодаря понятному и простому интерфейсу.
                            Платформа действует на узбекском и русском языках.</p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Image -->
        <x-project.image :image="$project->main_image"/>
        <!-- /Image -->

        <!--
            <div class="caption-single container">
            <div class="row">
                <div class="col-12 col-md-6 award-item">
                    <h4 class="title title--h6 js-lines">AWWWARDS</h4>
                    <div class="js-lines">Site of the Day — Dec 2017</div>
                </div>
                <div class="col-12 col-md-6 award-item">
                    <h4 class="title title--h6 js-lines">CSSDesignAwards</h4>
                    <div class="js-lines">Site of the Day — Dec 2017</div>
                </div>
            </div>
        </div>
        -->

        <!-- Page nav -->
        <nav class="page-nav">
            <a class="btn-link" href="project-alistore.html"><i
                    class="circle circle--left icon-left-open"></i><span>Предыдущий проект</span></a>
            <a class="btn-link" href="project-cleanice.html"><span>Следующий проект</span><i
                    class="circle circle--right icon-right-open"></i></a>
        </nav>
        <!-- /Page nav -->
    </section>
    <!-- /Intro -->

@endsection
