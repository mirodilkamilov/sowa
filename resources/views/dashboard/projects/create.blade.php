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
                            <!--= Template copy content                            -->
                                <div class="card mb-1 template-copy-content">
                                    <div class="card-header">
                                        <label for="content-type">{{ __('Content type') }}</label>
                                        <select id="content-type"
                                                class="custom-select"
                                                name="content[][type]"
                                                onchange="changeContentType(this)">
                                            <option disabled selected value> -- select a type --</option>
                                            <option value="text">{{ __('Text') }}</option>
                                            <option value="image-small">{{ __('Small Image') }}</option>
                                            <option value="image-big">{{ __('Wide Image') }}</option>
                                            <option value="slide">{{ __('Slide') }}</option>
                                        </select>
                                    </div>
                                    <div class="card-content pb-1"></div>
                                    <div class="card-footer">
                                        <i class="feather icon-trash-2 text-danger pr-1 remove-content"
                                           onclick="removeContent(this)"></i>
                                    </div>
                                </div>
                                <!--= Text copy content -->
                                <div class="card-body pb-0 text-copy-content">
                                    <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                               :hasMultiValuedInput="true"/>
                                    <x-dashboard.project-text-content :availableLangs="$availableLangs"/>
                                </div>
                                <!--= Image copy content -->
                                <div class="card-body pb-0 image-copy-content">
                                    <x-dashboard.project-image-content/>
                                </div>
                                <!--= Slide copy content -->
                                <div class="card-body pb-0 slide-copy-content">
                                    <x-dashboard.project-slide-content/>
                                </div>

                                <form class="form" action="{{ route('project-contents.store') }}"
                                      method="post"
                                      enctype="multipart/form-data"
                                      id="project-content-create-form">
                                    @csrf

                                    <div class="content-container">
                                        @if($errors->any())
                                            <x-old-contents :oldValues="old()" :availableLangs="$availableLangs"/>
                                        @endif
                                    </div>

                                    <div class="content-buttons mt-3"
                                         style="display: flex; justify-content: space-between;">
                                        <div class="add-btn-container">
                                            <button type="button" class="btn btn-success add-content-btn">
                                                {{ __('Add content') }}
                                            </button>
                                        </div>
                                        <div class="form-btn-container">
                                            <button type="submit" class="btn btn-primary mr-1">
                                                {{ __('Save') }}
                                            </button>
                                            <button type="reset" class="btn btn-outline-warning">
                                                {{ __('Reset') }}
                                            </button>
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

    @push('wizard-steps-manipulation')
        <script>
            $('.actions').remove();
            @if(session('hasCompletedFirstPart'))
            $('#wizard').find('.first').addClass('done').addClass('disabled').removeClass('current');
            $('#wizard').find('.last').removeClass('disabled').addClass('current');

            $('#wizard-p-0').removeClass('current').css('display', 'none');
            $('#wizard-p-1').addClass('current').css('display', 'block');
            @endif
        </script>
    @endpush

    @push('image-preview')
        <script>
            var preview = $('.preview');
            preview.css('display', 'none');

            function readURL(input, preview, width = '300px') {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.attr('src', e.target.result);
                        preview.css('width', width);
                        preview.css('display', 'block');
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            // * Multiple images preview in browser
            function imagesPreview(input, placeToInsertImagePreview) {
                placeToInsertImagePreview.find('img').remove();
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (var i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }

            function setPreview(obj) {
                var imageType = $(obj).parents('.card').find('.custom-select').children('option:selected').val();
                var previewClassName = $(obj).closest('.card-body').find('.preview').hasClass('preview') ? 'preview' : 'slide-preview';
                var preview = $(obj).closest('.card-body').find('.' + previewClassName);

                switch (imageType) {
                    case 'image-small':
                        readURL(obj, preview);
                        break;
                    case 'image-big':
                        readURL(obj, preview, '100%');
                        break;
                    case 'slide':
                        imagesPreview(obj, preview);
                        break;
                }
            }
        </script>
    @endpush

    @push('project-content-manipulation')
        <script>
            var avilableLangs = ['ru', 'en', 'uz'];
            var templateContent = $('.template-copy-content').css('display', 'none');
            var textContent = $('.text-copy-content').css('display', 'none');
            var imageContent = $('.image-copy-content').css('display', 'none');
            var slideContent = $('.slide-copy-content').css('display', 'none');

            var lastOldContentId = $('.old-content').last().attr('id');
            var contentCounter = lastOldContentId ?? 0;

            function changeContentType(select) {
                // * remove existing content if any
                var changedContent = $(select).parents('.card');
                changedContent.find('.card-body').remove();

                switch (select.value) {
                    case 'text':
                        var textCopyContent = textContent.clone().css('display', 'block');
                        changeTextInputNames();
                        textCopyContent.appendTo(changedContent.find('.card-content'));
                        break;

                    case 'image-small':
                        var imageSmallCopyContent = imageContent.clone().css('display', 'block');
                        changeImageInputNames(imageSmallCopyContent);
                        imageSmallCopyContent.appendTo(changedContent.find('.card-content'));
                        break;

                    case 'image-big':
                        var imageBigCopyContent = imageContent.clone().css('display', 'block');
                        changeImageInputNames(imageBigCopyContent);
                        imageBigCopyContent.appendTo(changedContent.find('.card-content'));
                        break;

                    case 'slide':
                        var slideCopyContent = slideContent.clone().css('display', 'block');
                        changeImageInputNames(slideCopyContent, true);
                        var appendedSlide = slideCopyContent.appendTo(changedContent.find('.card-content'));
                        appendedSlide.find('.slide-preview img').remove();
                        break;
                }

                function changeTextInputNames() {
                    var id = changedContent[0].id;
                    for (let lang of avilableLangs) {
                        textCopyContent.find('#title-' + lang).attr('name', 'content[' + id + '][title][' + lang + ']');
                        textCopyContent.find('#description-' + lang).attr('name', 'content[' + id + '][description][' + lang + ']');
                    }
                    changePositionInputName(textCopyContent, id);
                }

                function changeImageInputNames(imageCopyContent, isSlideType = false) {
                    var id = changedContent[0].id
                    imageCopyContent.find('.image-input').attr('name', 'content[' + id + '][image]');
                    if (isSlideType)
                        imageCopyContent.find('.image-input').attr('name', 'content[' + id + '][slide][]');
                    changePositionInputName(imageCopyContent, id);
                }

                function changePositionInputName(copyContent, id) {
                    copyContent.find('#position').attr('name', 'content[' + id + '][position]');
                }
            }

            $('.add-content-btn').on('click', function () {
                var templateCopyContent = templateContent.clone().css('display', 'block');
                var appendedTemplate = templateCopyContent.appendTo('.content-container');
                ++contentCounter;
                appendedTemplate.attr('id', contentCounter);
                appendedTemplate.find('select').attr('name', 'content[' + contentCounter + '][type]');
            });

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

            function removeContent(obj) {
                $(obj).parents('.card').remove();
            }
        </script>
    @endpush

@endsection
