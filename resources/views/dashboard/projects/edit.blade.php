@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"
                                :slicedSegment="$slicedSegment"/>

            <x-dashboard.alerts/>

            <section id="number-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">{{ __('Edit') }} {{ __('project\'s main part') }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <form class="form" action="{{ route('projects.update', $project->id) }}"
                                          method="post"
                                          enctype="multipart/form-data" id="project-create-form">
                                        @csrf
                                        @method('PUT')

                                        @php $inputs = [
                                              'main.*.main_title',
                                              'main.*.slug',
                                           ];
                                        @endphp
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                        <x-dashboard.projects.main-part :categories="$categories"
                                                                       :availableLangs="$availableLangs"
                                                                       :project="$project"/>
                                    </form>

                                    <x-dashboard.categories.add-modal :availableLangs="$availableLangs"/>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title text-center">{{ __('Edit') }} {{ __('project\'s content part') }}</h4>
                        <div class="content-container">
                            @if($errors->any())
                                <x-dashboard.projects.old-contents :oldValues="old()['content']" :availableLangs="$availableLangs"/>
                            @else
                                <x-dashboard.projects.edit-content :contents="$project->project_contents"
                                                                  :availableLangs="$availableLangs"/>
                            @endif
                        </div>

                        <x-dashboard.projects.buttons/>
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

    @push('ckeditor-in-projects')
        <script src="{{ asset('assets/js/ckeditor-in-projects.js') }}"></script>
    @endpush
@endsection
