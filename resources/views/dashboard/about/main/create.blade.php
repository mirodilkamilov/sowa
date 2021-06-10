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

                                        @php $inputs = [
                                              'image_title'
                                           ];
                                        @endphp
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                        <form class="form" action="{{ route('slides.store') }}" method="post"
                                              enctype="multipart/form-data" id="slide-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="tab-content pt-1 col-md-12 col-12">
                                                        @foreach($availableLangs as $lang)
                                                            <div
                                                                class="tab-pane-{{ $lang }} tab-pane @if($loop->first) active @endif"
                                                                id="{{ $lang }}-just" role="tabpanel"
                                                                aria-labelledby="{{ $lang }}-tab-justified">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="image-title"
                                                                                   class="form-control "
                                                                                   placeholder="{{ __('Image title') }} ({{ $lang }})"
                                                                                   name="image_title[{{ $lang }}]"
                                                                                   value="">
                                                                            <label
                                                                                for="image-title">{{ __('Image title') }}
                                                                                ({{ $lang }})</label>
                                                                        </div>
                                                                    </div>

                                                                    <fieldset class="form-group col-md-12 col-12">
                                                                        <label
                                                                            for="image">{{ __('Image') }}</label>
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                                                   name="image"
                                                                                   id="image" form="slide-form"
                                                                                   onchange="readURL(this)">
                                                                            <label class="custom-file-label"
                                                                                   for="image"></label>
                                                                            @error('image')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="row">
                                                                    <fieldset
                                                                        class="form-group col-md-12 col-12"
                                                                        style="display: flex; justify-content: center; align-items: center;">
                                                                        <img src="#" class="preview" alt="preview"/>
                                                                        @if(isset($project->main_image))
                                                                            <img src="{{ $project->main_image }}"
                                                                                 class="placeholder"
                                                                                 alt="placeholder"
                                                                                 style="width: 300px;">
                                                                        @endif
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="divider">
                                                    <div class="divider-text">
                                                        <h4 class="title text-primary">{{ __('Company') }}</h4>
                                                    </div>
                                                </div>
                                                @php $inputs = [
                                                      'about_title',
                                                      'about_description',
                                                   ];
                                                @endphp
                                                <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                                           :inputs="$inputs"/>
                                                <div class="row">
                                                    <div class="tab-content pt-1 col-md-12 col-12">
                                                        @foreach($availableLangs as $lang)
                                                            <div
                                                                class="tab-pane-{{ $lang }} tab-pane @if($loop->first) active @endif"
                                                                id="{{ $lang }}-just" role="tabpanel"
                                                                aria-labelledby="{{ $lang }}-tab-justified">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-label-group">
                                                                            <input name="about_title[{{ $lang }}]"
                                                                                   type="text" id="about-title"
                                                                                   class="form-control "
                                                                                   placeholder="{{ __('Company title') }} ({{ $lang }})"
                                                                                   value="">
                                                                            <label
                                                                                for="about-title">{{ __('Company title') }}
                                                                                ({{ $lang }})</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea
                                                                                class="form-control @error("about_description.$lang") is-invalid @enderror"
                                                                                rows="5"
                                                                                placeholder="{{ __('Company description') . ' ('. $lang . ')' }}"
                                                                                id="about-description"
                                                                                spellcheck="false"
                                                                                name="about_description[{{ $lang }}]">{{ old("about_description.$lang") }}</textarea>
                                                                            <label
                                                                                for="about-description">{{ __('Company description') . ' ('. $lang . ')' }}</label>
                                                                            @error("about_description.$lang")
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="divider">
                                                    <div class="divider-text">
                                                        <h4 class="title text-primary">{{ __('What we do?') }}</h4>
                                                    </div>
                                                </div>
                                                <x-dashboard.language-tabs :availableLangs="$availableLangs"/>
                                                <div class="row">
                                                    <div class="tab-content pt-1 col-md-12 col-12">
                                                        @foreach($availableLangs as $lang)
                                                            <div
                                                                class="tab-pane-{{ $lang }} tab-pane @if($loop->first) active @endif"
                                                                id="{{ $lang }}-just" role="tabpanel"
                                                                aria-labelledby="{{ $lang }}-tab-justified">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="help-title"
                                                                                   class="form-control "
                                                                                   placeholder="{{ __('Title') }} ({{ $lang }})"
                                                                                   name="help_title[{{ $lang }}]" value="">
                                                                            <label for="help-title">{{ __('Title') }} ({{ $lang }})</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea
                                                                                class="form-control @error("help_description.$lang") is-invalid @enderror"
                                                                                rows="5"
                                                                                placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                                                                                id="help-description"
                                                                                spellcheck="false"
                                                                                name="help_description[{{ $lang }}]">{{ old("help_description.$lang") }}</textarea>
                                                                            <label
                                                                                for="help-description">{{ __('Description') . ' ('. $lang . ')' }}</label>
                                                                            @error("help_description.$lang")
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
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

    @push('project-content-manipulation')
        <script>
            var avilableLangs = ['ru', 'en', 'uz'];

            function changeLangTabs(obj) {
                var allClassNames = obj.className;
                var currentLang = allClassNames.substring(allClassNames.length - 16, allClassNames.length - 14);

                if (!avilableLangs.includes(currentLang))
                    return;

                for (let lang of avilableLangs) {
                    if (currentLang === lang) {
                        $('.' + currentLang + '-tab-justified').addClass('active');
                        $('.tab-pane-' + currentLang).addClass('active');
                        continue;
                    }
                    $('.' + lang + '-tab-justified').removeClass('active');
                    $('.tab-pane-' + lang).removeClass('active');
                }
            }
        </script>
    @endpush
@endsection
