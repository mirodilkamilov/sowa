@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            <section id="number-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">{{ __('Create project\'s main part') }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <form class="form" action="{{ route('projects.store') }}"
                                          method="post"
                                          enctype="multipart/form-data" id="project-create-form">
                                        @csrf

                                        @php $inputs = [
                                              'main.*.main_title',
                                              'main.*.slug',
                                           ];
                                        @endphp
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                        <x-dashboard.project-main-part :categories="$categories"
                                                                       :availableLangs="$availableLangs"/>
                                    </form>

                                    <x-dashboard.create-category-modal :availableLangs="$availableLangs"/>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title text-center">{{ __('Create project\'s content part') }}</h4>
                        <div class="content-container">
                            @if($errors->any())
                                <x-old-contents :oldValues="old()" :availableLangs="$availableLangs"/>
                            @endif
                        </div>

                        <x-dashboard.project-buttons/>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @push('image-preview')
        <script src="{{ asset('assets/js/image-preview.js') }}"></script>
    @endpush

    @push('project-content-manipulation')
        <script src="{{ asset('assets/js/project-content-manipulation.js') }}"></script>
    @endpush

@endsection
