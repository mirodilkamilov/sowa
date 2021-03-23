@extends('layouts.header')

@section('content')

    <!-- Intro -->
    <header class="header-page header-fullscreen header-page--gutterBottom overlay overlay--45 js-image jarallax"
            data-image="{{ $companyDetail->image }}">
        <div class="header-page__container-fluid align-items-end js-opacity">
            <div class="row no-gutters">
                <div class="col-md-12 col-lg-6">
                    <div class="tail header-page__description">{{ $companyDetail->image_title }}</div>
                </div>
                <div class="col-md-12 col-lg-6 text-lg-right">
                    <a class="btn-link btn-link--circle-right" href="!#start"><i
                            class="circle circle--white circle--right icon-down-open"></i></a>
                </div>
            </div>
        </div>
    </header>
    <!-- /Intro -->

    <!-- The Story -->
    <article id="start" class="caption-single container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="title title--overhead js-lines">{{ __('About company') }}</h4>
            </div>
            <div class="col-12 col-lg-9">
                <h2 class="title title--h4 js-lines">{{ $companyDetail->about_title }}</h2>
                <div class="description noGutters-Bottom js-block">
                    <p class="paragraph noGutters-Bottom">{{ $companyDetail->about_description }}</p>
                </div>
            </div>
        </div>
    </article>
    <!-- /The Story -->

    <!-- WeDo -->
    <article class="caption-single container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="title title--overhead js-lines">{{ __('What we do?') }}</h4>
            </div>
            <div class="col-12 col-lg-9">
                <h2 class="title title--h4 js-lines">{{ $companyDetail->help_title }}</h2>
                <div class="description js-block">
                    <p class="paragraph">{{ $companyDetail->help_description }}</p>
                </div>
            </div>
            @foreach($companyDetail->companyLists as $companyList)
                <x-list :title="$companyList->title" :lists="$companyList->list" :isOdd="$loop->odd"/>
            @endforeach
        </div>
    </article>
    <!-- /WeDo -->

    <!-- Partners -->
    <article class="caption-single container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <h2 class="title title--h4 js-lines">{{ __('Our customers:') }}</h2>
            </div>
        </div>
    </article>

    <div class="container mt-0 mt-sm-4">
        <div class="row brands-wrap">
            @foreach($customers as $customer)
                <div class="col-6 col-md-4 col-lg-3 my-2">
                    <div class="item-brand">
                        <img class="item-brand__logo" src="{{ $customer->logo }}" alt="{{ $customer->name }}"/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /Partners -->

    @include('partials.footer')

@endsection
