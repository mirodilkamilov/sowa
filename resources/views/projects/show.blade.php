@extends('layouts.header')

@section('content')
    <section class="project-single">
        <!-- Intro -->
        <header class="header-page header-page--half js-opacity">
            <div class="container">
                <!-- Title -->
                <h6 class="title title--overhead title--tail">
                    @foreach($project->categories as $category)
                        {{ $category->category }}
                    @endforeach
                </h6>
                <h1 class="title title--display-1 js-lines">{{ $project->main_title }}</h1>
                <!-- /Title -->
            </div>
        </header>
        <!-- /Intro -->

        <!-- Image -->
        <figure class="image-container jarallax reveal">
            <img class="jarallax-img cover lazyload" src="{{ $project->main_image }}" alt="{{ $project->main_title }}"/>
        </figure>
        <!-- /Image -->

        <div class="container">
            <!-- Details -->
            <div class="case-details">
                <div class="item-details">
                    <span class="item-details__title title--overhead">{{ __('Client') }}</span>
                    <span class="item-details__text">{{ $project->client }}</span>
                </div>
                <div class="item-details">
                    <span class="item-details__title title--overhead">{{ __('Year') }}</span>
                    <span class="item-details__text">{{ $project->year }}</span>
                </div>
                <div class="item-details">
                    <span class="item-details__title title--overhead">{{ __('Project category') }}</span>
                    <span class="item-details__text">
                        @foreach($project->categories as $category)
                            {{ $category->category }}
                            @unless($loop->last)
                                {{ ',' }}
                            @endunless
                        @endforeach
                    </span>
                </div>
                <div class="item-details item-details--end">
                    <a class="btn-link" target="_blank" href="{{ $project->url }}">
                        {{ __('View project') }}
                        <i class="circle circle--right icon-right-open"></i>
                    </a>
                </div>
            </div>
            <!-- /Details -->
        </div>

        @php $textSectionNum = 0; @endphp

        @php $isLastContentTypeText = false; @endphp
        @foreach($project->project_contents as $content)
            @switch($content->type)
                @case('text')
                @php $textSectionNum++ @endphp
                <x-project.text :textSectionNum="$textSectionNum" :content="$content"/>
                @php $isLastContentTypeText = true; @endphp
                @break

                @case('image-small')
                <x-project.image :image="$content->getImagePath()" class="image-container--gutters"
                                 :isLastContentTypeText="$isLastContentTypeText"/>
                @php $isLastContentTypeText = false; @endphp
                @break

                @case('image-big')
                <x-project.image :image="$content->getImagePath()" :isLastContentTypeText="$isLastContentTypeText"/>
                @php $isLastContentTypeText = false; @endphp
                @break

                @case('slide')
                <x-project.slider :images="$content->getImagePath()" :isLastContentTypeText="$isLastContentTypeText"/>
                @php $isLastContentTypeText = false; @endphp
                @break
            @endswitch
        @endforeach

        <!-- Page nav -->
        <nav class="page-nav">
            <a class="btn-link"
               href="{{ route('user.projects.show', [$locale, $prevProject->id, $prevProject->slug]) }}">
                <i class="circle circle--left icon-left-open"></i>
                <span>{{ __('Previous project') }}</span>
            </a>
            <a class="btn-link"
               href="{{ route('user.projects.show', [$locale, $nextProject->id, $prevProject->slug]) }}">
                <span>{{ __('Next project') }}</span>
                <i class="circle circle--right icon-right-open"></i>
            </a>
        </nav>
        <!-- /Page nav -->
    </section>
    <!-- /Intro -->
@endsection
