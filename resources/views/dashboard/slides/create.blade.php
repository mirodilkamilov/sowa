@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-dashboard.alerts/>

            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card mb-1">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Add') }} {{ __('slide') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        @php $inputs = [
                                              'title',
                                              'sub_title',
                                              'description',
                                           ];
                                        @endphp
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                        <form class="form" action="{{ route('slides.store') }}" method="post"
                                              enctype="multipart/form-data" id="slide-form">
                                            @csrf

                                            <x-dashboard.slides.text-form :availableLangs="$availableLangs"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <x-dashboard.slides.common-fields :availableLangs="$availableLangs" :positions="$positions"
                                                  :categories="$categories"/>
            </div>
        </div>
    </div>

    @push('image-preview')
        <script src="{{ asset('assets/js/image-preview.js') }}"></script>
    @endpush
@endsection
