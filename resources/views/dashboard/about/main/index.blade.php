@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            <div class="content-body @if(!isset($about)) fullheight-content @endif">
                @if(!isset($about))
                    <a href="{{ route('about.create') }}" class="btn btn-success mr-1 mb-2 " tabindex="0"
                       aria-controls="DataTables_Table_0">
                        <span>
                            <i class="feather icon-plus"></i>
                            {{ __('Add') }} {{ __('Main Information') }}
                        </span>
                    </a>
                @endif

                @if(isset($about))
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
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true"><i
                                                            class="feather icon-x-circle"></i></span>
                                                </button>
                                            </div>
                                            @enderror

                                            @php $inputs = [
                                              'main.*.image_title'
                                           ];
                                            @endphp
                                            <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                                       :inputs="$inputs"/>

                                            <form class="form" action="{{ route('about.update', $about->id) }}"
                                                  method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <x-dashboard.about-image-form :about="$about"
                                                                                  :availableLangs="$availableLangs"/>

                                                    <x-dashboard.about-company-form :about="$about"
                                                                                    :availableLangs="$availableLangs"/>

                                                    <x-dashboard.about-help-form :about="$about"
                                                                                 :availableLangs="$availableLangs"/>

                                                    <x-dashboard.about-list-container :availableLangs="$availableLangs"
                                                                                      :aboutLists="$about->aboutLists"/>

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
                @endif
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
