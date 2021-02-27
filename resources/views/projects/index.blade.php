@extends('layouts.header')

@section('content')
    {{--    TODO: get language from cookie--}}
    @foreach($projects as $project)
        <p>{{ $project->title['ru'] }}</p>
    @endforeach

    <!-- Projects -->
    <div class="container">
        <header class="header-page">
            <h1 class="title title--h1 js-lines">Проекты.</h1>
            <div class="select js-down">
                <span class="placeholder">Категория проектов</span>
                <ul class="filters">
                    <li class="filters__item"><h6 class="title title--overhead filters-title">Категория</h6></li>
                    <li class="filters__item active" data-filter="*"><a class="filters__link active"
                                                                        href="#filter">Все</a></li>
                    <li class="filters__item" data-filter=".category-design"><a class="filters__link" href="#filter">Веб-приложения</a>
                    </li>
                    <li class="filters__item" data-filter=".category-branding"><a class="filters__link" href="#filter">Мобильные
                            приложения</a></li>
                    <li class="filters__item" data-filter=".category-app"><a class="filters__link"
                                                                             href="#filter">Дизайн</a></li>
                </ul>
                <input type="hidden" name="changemetoo"/>
            </div>
        </header>

        <div class="flex-grid js-masonry-project js-sort">
            <!-- Project -->
            <figure class="item-project item-masonry js-block category-design">
                <a href="projects/1-yuridik" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/yuridik_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client"></div>-->
                        <h3 class="title title--h5">YURIDIK.UZ</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->

            <!-- Project -->
            <figure class="item-project item-masonry js-block category-branding">
                <a href="project-soomi.html" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/somi_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client">Soomi</div>-->
                        <h3 class="title title--h5">SOOMI</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->

            <!-- Project -->
            <figure class="item-project item-masonry js-block category-app">
                <a href="project-kidya.html" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/kidya_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client">Doodle Club</div>-->
                        <h3 class="title title--h5">KIDYA</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->

            <!-- Project -->
            <figure class="item-project item-masonry js-block category-design">
                <a href="project-cleanice.html" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/ice_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client">KIDYA APP</div>-->
                        <h3 class="title title--h5">CLEAN ICE</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->

            <!-- Project -->
            <figure class="item-project item-masonry js-block category-branding">
                <a href="project-waio.html" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/wisdom_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client">Clean Ice</div>-->
                        <h3 class="title title--h5">WISDOM DICTIONARY</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->

            <!-- Project -->
            <figure class="item-project item-masonry js-block category-app">
                <a href="project-alistore.html" class="onHover">
                    <img class="item-news__image lazyload" src="/assets/img/projects/ali_cover.png" alt="Project">
                    <figcaption class="onHover__details">
                        <!--<div class="client">Digital Agancy</div>-->
                        <h3 class="title title--h5">ALISTORE</h3>
                    </figcaption>
                </a>
            </figure>
            <!-- /Project -->
        </div>
    </div>
    <!-- /News -->

    @include('partials.footer')

@endsection
