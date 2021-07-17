@extends('layouts.header')

@section('content')
    <!-- Hero -->
    <header class="hero">
        <div class="slider slider-horizontal">
            <div class="slider__caption swiper-container">
                <div class="swiper-wrapper">
                    @foreach($slides as $slide)
                        <div class="swiper-slide">
                            <div class="slider__item">
                                <h6 class="title title--overhead">
                                    <span class="down-up"><span>{{ $slide->sub_title }}</span></span>
                                </h6>
                                <h1 class="title title--display-1 js-text-wave">{{ $slide->title }}</h1>
                                <p class="description">
                                    <span class="down-up"><span>{!! $slide->description !!}</span></span>
                                </p>
                                <a class="btn-link btn-link--circle-right"
                                   href="{{ route('user.projects.index', [$locale, 'sort_by' => $slide->category_id]) }}">
                                    <span class="down-up">
                                        <span>{{ __('Learn more') }}<i class="circle circle--right icon-right-open"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="slider__image swiper-container reveal">
                <div class="swiper-wrapper">
                    @foreach($slides as $slide)
                        <div class="swiper-slide">
                            <div class="cover-slider lazyload overlay--45" data-bg="{{ $slide->image }}">
                                <a class="swiper-slide__link" href="{{ route('user.projects.index', [App::getLocale(), 'sort_by' => $slide->category_id]) }}"></a>
                            </div>
                        </div>
                    @endforeach
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

            @if(isset($companyContact->socialMedia))
                <div class="social social--floating">
                    @foreach($companyContact->socialMedia as $social_media)
                        <a class="social__link" href="{{ $social_media->url }}" target="_blank">
                            <img src="{{ $social_media->logo }}" alt="{{ $social_media->name }} icon"
                                 style="width: 30px;">
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="company">
                <div class="company-phone">
                    <a href="tel:{{ $companyContact?->phone[0] }}">{{ $companyContact?->phone[0] }}</a>
                </div>
                <div class="company-email">
                    <a href="mailto:{{ $companyContact?->email[0] }}">{{ $companyContact?->email[0] }}</a>
                </div>
            </div>

        </div>
    </header>
    <!-- /Hero -->

@endsection
