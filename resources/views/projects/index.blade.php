@extends('layouts.header')

@section('content')
    <!-- Projects -->
    <div class="container">
        <header class="header-page">
            <h1 class="title title--h1 js-lines">{{ __('Projects') }}.</h1>
            <div class="select js-down">
                <span class="placeholder">{{ __('Category of projects') }}</span>
                <ul class="filters">
                    <li class="filters__item"><h6 class="title title--overhead filters-title">{{ __('Category') }}</h6>
                    </li>
                    <li class="filters__item active" data-filter="*"><a class="filters__link active"
                                                                        href="#filter">{{ __('All') }}</a></li>
                    @foreach($categories as $categoryForFilter)
                        <li class="filters__item" data-filter=".category-{{ Str::slug($categoryForFilter->category) }}">
                            <a class="filters__link" href="#filter">{{ $categoryForFilter->category }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </header>

        <!-- Project -->
        <div class="flex-grid js-masonry-project js-sort">
            @foreach($projects as $project)
                <figure
                    class="item-project item-masonry js-block @foreach($project->categories as $category) category-{{ Str::slug($category->category) }} @endforeach">
                    <a href="{{ route('user.projects.show', [$locale, $project->id, $project->slug]) }}" class="onHover">
                        <img class="item-news__image lazyload" src="{{ $project->main_image }}"
                             alt="{{ $project->main_title }}">
                        <figcaption class="onHover__details">
                            <h3 class="title title--h5">{{ $project->slug }}</h3>
                        </figcaption>
                    </a>
                </figure>
            @endforeach
        </div>
        <!-- /Project -->
    </div>
    <!-- Projects -->

    @include('partials.footer')

@endsection
