@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            <div class="content-body">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ session('hasCompletedFirstPart') ? __('Create a project\'s content part') : __('Create project\'s main part') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="number-tab-steps wizard-circle form" id="wizard">
                                            <!-- Step 1 -->
                                            <h6>Step 1</h6>
                                            <fieldset>
                                                @unless(session('hasCompletedFirstPart'))
                                                    <form class="form" action="{{ route('projects.store') }}"
                                                          method="post"
                                                          enctype="multipart/form-data" id="project-create-form">
                                                        @csrf
                                                        <x-dashboard.language-tabs :availableLangs="$availableLangs"/>

                                                        <div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0">
                                                            @foreach($availableLangs as $lang)
                                                                <div class="tab-pane @if($loop->first) active @endif"
                                                                     id="{{ $lang }}-just" role="tabpanel"
                                                                     aria-labelledby="{{ $lang }}-tab-justified">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-label-group">
                                                                                <input type="text" id="main_title"
                                                                                       class="form-control @error("main_title.{$lang}") is-invalid @enderror"
                                                                                       placeholder="{{ __('Main title') . ' ('. $lang . ')' }}"
                                                                                       name="main_title[{{ $lang }}]"
                                                                                       value="{{ old("main_title.{$lang}") }}">
                                                                                <label
                                                                                    for="main_title">{{ __('Main title') . ' ('. $lang . ')' }}</label>
                                                                                @error("main_title.{$lang}")
                                                                                <p class="text-danger">{{ $message }}</p>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-label-group">
                                                                                <input type="text" id="slug"
                                                                                       class="form-control @error("slug.{$lang}") is-invalid @enderror"
                                                                                       placeholder="{{ __('Slug') . ' ('. $lang . ')' }}"
                                                                                       name="slug[{{ $lang }}]"
                                                                                       value="{{ old("slug.{$lang}") }}">
                                                                                <label
                                                                                    for="slug">{{ __('Slug') . ' ('. $lang . ')' }}</label>
                                                                                @error("slug.{$lang}")
                                                                                <p class="text-danger">{{ $message }}</p>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </form>

                                                    @push('divider-custom-style')
                                                        <style>
                                                            .divider .divider-text:before,
                                                            .divider .divider-text:after {
                                                                border-top: 1px solid #7367F0 !important;
                                                            }
                                                        </style>
                                                    @endpush
                                                    <div class="divider">
                                                        <div class="divider-text">
                                                            <h4 class="title text-primary">Common form fields</h4>
                                                        </div>
                                                    </div>

                                                    <div class="row pt-1">
                                                        <div class="col-md-4 col-6">
                                                            <div class="form-label-group mb-0">
                                                                <input type="text" id="client"
                                                                       class="form-control @error('client') is-invalid @enderror"
                                                                       name="client"
                                                                       placeholder="{{ __('Client') }}"
                                                                       form="project-create-form"
                                                                       value="{{ old('client') }}">
                                                                <label
                                                                    for="client">{{ __('Client') }}</label>
                                                                @error('client')
                                                                <p class="text-danger mb-0">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-6">
                                                            <div class="form-label-group mb-0">
                                                                <input type="number" id="year"
                                                                       class="form-control @error('year') is-invalid @enderror"
                                                                       name="year"
                                                                       placeholder="{{ __('Year') }}"
                                                                       form="project-create-form"
                                                                       value="{{ old('year') }}">
                                                                <label
                                                                    for="year">{{ __('Year') }}</label>
                                                                @error('year')
                                                                <p class="text-danger mb-0">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="url"
                                                                       class="form-control @error('url') is-invalid @enderror"
                                                                       placeholder="{{ __('Url') }}"
                                                                       name="url"
                                                                       form="project-create-form"
                                                                       value="{{ old('url') }}">
                                                                <label
                                                                    for="url">{{ __('Url') }}</label>
                                                                @error('url')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <fieldset
                                                            class="form-group col-md-12 col-12">
                                                            <label
                                                                for="basicInputFile">{{ __('Image') }}</label>
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                       class="custom-file-input image-input @error('main_image') is-invalid @enderror"
                                                                       name="main_image"
                                                                       id="basicInputFile"
                                                                       form="project-create-form">
                                                                <label class="custom-file-label"
                                                                       for="basicInputFile"></label>
                                                                @error('main_image')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                        <fieldset
                                                            class="form-group col-md-12 col-12"
                                                            style="display: flex; justify-content: center; align-items: center;">
                                                            <img id="preview" class="preview" src="#"
                                                                 alt="preview"/>
                                                        </fieldset>

                                                        <div class="col-12 mt-1">
                                                            <button type="submit"
                                                                    class="btn btn-primary mr-1 mb-1"
                                                                    form="project-create-form">
                                                                {{ __('Save') }}
                                                            </button>
                                                            <button type="reset"
                                                                    class="btn btn-outline-warning mr-1 mb-1"
                                                                    form="project-create-form">
                                                                {{ __('Reset') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endunless
                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>Step 2</h6>
                                            <fieldset></fieldset>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(session('hasCompletedFirstPart'))
                                <form class="form" action="{{ route('project-contents.store') }}"
                                      method="post"
                                      enctype="multipart/form-data"
                                      id="project-content-create-form">
                                @csrf
                                <!--= text type                                                  -->
                                    <div class="card">
                                        <div class="card-header">
                                            <p class="card-title">{{ __('Content type') . ': ' }}<span
                                                    class="text-primary">{{ __('Text') }}</span></p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0" id="text-content-card">
                                                <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                                           :hasMultiValuedInput="true"/>

                                                <x-dashboard.project-text-content :availableLangs="$availableLangs"/>
                                            </div>

                                            <div class="row p-2">
                                                <div class="col-12 text-center">
                                                    <button type="button" class="btn btn-success mr-1 mb-1"
                                                            id="add-text-content">
                                                        {{ __('Add text type content') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--= image type                                                  -->
                                    <div class="card">
                                        <div class="card-header">
                                            <p class="card-title">{{ __('Content type') . ': ' }}<span
                                                    class="text-primary">{{ __('Image') }}</span></p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0" id="image-content-card"
                                                 style="display: grid; grid-template-columns: 1fr 1fr;">

                                                <x-project-image-content/>

                                            </div>
                                            <div class="row p-2">
                                                <div class="col-12 text-center">
                                                    <button type="button" class="btn btn-success mr-1 mb-1"
                                                            id="add-image-content">
                                                        {{ __('Add image type content') }}
                                                    </button>
                                                </div>
                                                <div class="col-3 float-right">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">
                                                        {{ __('Save') }}
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-outline-warning mb-1">
                                                        {{ __('Reset') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>

    @push('file-preview')
        <script>
            $('.actions').remove();
            var preview = $('.preview');
            preview.css('display', 'none');

            function readURL(input, preview) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.attr('src', e.target.result);
                        preview.css('width', '300px');
                        preview.css('display', 'block');
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $('.image-input').change(function () {
                var preview = $(this).closest('.custom-file').closest('.form-group').siblings('.form-group').find('.preview')
                readURL(this, preview);
            });

            @if(session('hasCompletedFirstPart'))
            $('#wizard').find('.first').addClass('done').addClass('disabled').removeClass('current');
            $('#wizard').find('.last').removeClass('disabled').addClass('current');

            $('#wizard-p-0').removeClass('current').css('display', 'none');
            $('#wizard-p-1').addClass('current').css('display', 'block');
            @endif
        </script>
    @endpush

    @push('project-text-content')
        <script>
            var avilableLangs = ['ru', 'en', 'uz'];

            let i_text = $('.text-content').length;
            $('#add-text-content').click(function () {
                var textContent = $('.text-content:last').clone();
                var numOfTextContents = ++$('.text-content').length;

                for (i_text; i_text < numOfTextContents; i_text++) {
                    for (let j = 0; j < avilableLangs.length; j++) {
                        textContent.find('textarea#title-' + avilableLangs[j]).val('').removeClass('is-invalid').attr('name', 'content[text][' + i_text + '][title][' + avilableLangs[j] + ']');
                        textContent.find('textarea#description-' + avilableLangs[j]).val('').removeClass('is-invalid').attr('name', 'content[text][' + i_text + '][description][' + avilableLangs[j] + ']');
                    }
                    textContent.find('input').val('').removeClass('is-invalid').attr('name', 'content[text][' + i_text + '][position]');
                }
                textContent.find('p.text-danger').remove();

                textContent.appendTo('#text-content-card');
                $('.text-content:last .wrapper').append('<i class="feather icon-trash-2 text-danger remove-text-content"></i>');
                $('.remove-text-content').click(function () {
                    $(this).closest('.text-content').remove();
                });
            });

            $('.remove-text-content').click(function () {
                $(this).closest('.text-content').remove();
            });


            $('#ru-tab-justified').click(function () {
                $('.tab-pane-en').removeClass('active');
                $('.tab-pane-uz').removeClass('active');
                $('.tab-pane-ru').addClass('active');
            });
            $('#en-tab-justified').click(function () {
                $('.tab-pane-ru').removeClass('active');
                $('.tab-pane-uz').removeClass('active');
                $('.tab-pane-en').addClass('active');
            });
            $('#uz-tab-justified').click(function () {
                $('.tab-pane-ru').removeClass('active');
                $('.tab-pane-en').removeClass('active');
                $('.tab-pane-uz').addClass('active');
            });
        </script>
    @endpush

    @push('project-image-content')
        <script>
            let i_image = $('.image-copy-content').length;
            console.log('#add-image-content clicked');
            $('#add-image-content').click(function () {

                var imageContent = $('.image-copy-content:last').clone();
                var numOfImageContents = ++$('.image-copy-content').length;

                for (i_image; i_image < numOfImageContents; i_image++) {
                    imageContent.find('select').val('').removeClass('is-invalid').attr('name', 'content[image][' + i_image + '][image-type]');
                    imageContent.find('#position').val('').removeClass('is-invalid').attr('name', 'content[image][' + i_image + '][position]');
                    imageContent.find('.image-input').val('').removeClass('is-invalid').attr('name', 'content[image][' + i_image + '][image]');
                }
                imageContent.find('p.text-danger').remove();

                var appendedImageContent = imageContent.appendTo('#image-content-card');
                appendedImageContent.find('#preview').attr('src', '').css('display', 'none');
                appendedImageContent.find('.custom-file-label').html('');

                $('.image-copy-content:last .image-input-container').append('<i class="feather icon-trash-2 text-danger remove-image-content"></i>');
                $('.remove-image-content').click(function () {
                    $(this).closest('.image-copy-content').remove();
                });

                $('.image-input').change(function () {
                    var preview = $(this).closest('.custom-file').closest('.form-group').siblings('.form-group').find('.preview')
                    readURL(this, preview);
                });
            });

            $('.remove-text-content').click(function () {
                $(this).closest('.text-content').remove();
            });
        </script>
    @endpush

@endsection
