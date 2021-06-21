@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card mb-1">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="divider">
                                            <div class="divider-text">
                                                <h4 class="title text-primary">{{ __('Image') }}</h4>
                                            </div>
                                        </div>

                                        @error('main')
                                        <div class="alert alert-danger alert-dismissible mb-1" role="alert">
                                            <p>{{ $message }}</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                            </button>
                                        </div>
                                        @enderror

                                        @php $inputs = [
                                              'main.*.image_title'
                                           ];
                                        @endphp
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                        <form class="form" action="{{ route('about.store') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <x-dashboard.about-image-form :availableLangs="$availableLangs"/>

                                                <x-dashboard.about-company-form :availableLangs="$availableLangs"/>

                                                <x-dashboard.about-help-form :availableLangs="$availableLangs"/>

                                                <x-dashboard.about-list-container :availableLangs="$availableLangs"/>

                                                <div class="col-12 mt-3"
                                                     style="display: flex; justify-content: flex-end;">
                                                    <button type="submit"
                                                            class="btn btn-success mr-1 mb-1 waves-effect waves-light">
                                                        {{ __('Save') . ' ' . __('Main Information') }}
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">
                                                        {{ __('Reset') }}
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @push('image-preview')
        <script src="{{ asset('assets/js/image-preview.js') }}"></script>
    @endpush

    @push('change-language-tabs')
        <script src="{{ asset('assets/js/change-language-tabs.js') }}"></script>
    @endpush

    @push('about-list-manipulation')
        <script src="{{ asset('assets/js/about-list-manipulation.js') }}"></script>
    @endpush
@endsection
