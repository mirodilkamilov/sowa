@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
{{--    TODO: Make component project's main part--}}
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            @error("main")
            <div class="alert alert-danger alert-dismissible mb-1" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                </button>
            </div>
            @enderror

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
                                        <x-dashboard.language-tabs :availableLangs="$availableLangs"/>

                                        <div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0">
                                            @foreach($availableLangs as $lang)
                                                <div
                                                    class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
                                                    id="{{ $lang }}-just" role="tabpanel"
                                                    aria-labelledby="{{ $lang }}-tab-justified">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="main_title-{{ $loop->iteration }}"
                                                                       class="form-control @error("main.*.main_title.$lang") is-invalid @enderror"
                                                                       placeholder="{{ __('Main title') . ' ('. $lang . ')' }}"
                                                                       name="main[1][main_title][{{ $lang }}]"
                                                                       value="{{ old("main.1.main_title.$lang") }}">
                                                                <label
                                                                    for="main_title-{{ $loop->iteration }}">{{ __('Main title') . ' ('. $lang . ')' }}</label>
                                                                @error("main.*.main_title.$lang")
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="slug-{{ $loop->iteration }}"
                                                                       class="form-control @error("main.*.slug.$lang") is-invalid @enderror"
                                                                       placeholder="{{ __('Slug') . ' ('. $lang . ')' }}"
                                                                       name="main[1][slug][{{ $lang }}]"
                                                                       value="{{ old("main.1.slug.$lang") }}">
                                                                <label
                                                                    for="slug-{{ $loop->iteration }}">{{ __('Slug') . ' ('. $lang . ')' }}</label>
                                                                @error("main.*.slug.$lang")
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

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
                                                           class="form-control @error('main.*.client') is-invalid @enderror"
                                                           name="main[1][client]"
                                                           placeholder="{{ __('Client') }}"
                                                           form="project-create-form"
                                                           value="{{ old('main.1.client') }}">
                                                    <label
                                                        for="client">{{ __('Client') }}</label>
                                                    @error('main.*.client')
                                                    <p class="text-danger mb-0">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                                <div class="form-label-group mb-0">
                                                    <input type="number" id="year"
                                                           class="form-control @error('main.*.year') is-invalid @enderror"
                                                           name="main[1][year]"
                                                           placeholder="{{ __('Year') }}"
                                                           form="project-create-form"
                                                           value="{{ old('main.1.year') }}">
                                                    <label
                                                        for="year">{{ __('Year') }}</label>
                                                    @error('main.*.year')
                                                    <p class="text-danger mb-0">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                                <div class="form-label-group">
                                                    <input type="text" id="url"
                                                           class="form-control @error('main.*.url') is-invalid @enderror"
                                                           placeholder="{{ __('Url') }}"
                                                           name="main[1][url]"
                                                           form="project-create-form"
                                                           value="{{ old('main.1.url') }}">
                                                    <label
                                                        for="url">{{ __('Url') }}</label>
                                                    @error('main.*.url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row col-12 col-md-12 mr-0 ml-0 p-0">
                                                <fieldset class="form-group col-md-6 col-6">
                                                    <label for="project-category">
                                                        {{ __('Project category') }}
                                                    </label>
                                                    <select id="project-category"
                                                            class="custom-select project-category @error('main.*.category') is-invalid @enderror"
                                                            name="main[1][category]"
                                                            form="project-create-form">
                                                        <option disabled selected value>
                                                            -- select a category --
                                                        </option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{ $category->id }}"
                                                                @if(old('main.1.category') == $category->id) selected @endif>
                                                                {{ $category->category }}
                                                            </option>
                                                        @endforeach
                                                        <option value="add-category">
                                                            -- {{ __('add new category') }} --
                                                        </option>
                                                    </select>
                                                    @error('main.*.category')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </fieldset>

                                                <fieldset class="form-group col-md-6 col-6">
                                                    <label for="basicInputFile">{{ __('Image') }}</label>
                                                    <div class="custom-file">
                                                        <input type="file"
                                                               class="custom-file-input image-input @error('main.*.main_image') is-invalid @enderror"
                                                               name="main[1][main_image]"
                                                               id="basicInputFile"
                                                               form="project-create-form"
                                                               onchange="setPreview(this)">
                                                        <label class="custom-file-label"
                                                               for="basicInputFile"></label>
                                                        @error('main.*.main_image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <fieldset class="form-group col-md-6 col-6"></fieldset>
                                            <fieldset
                                                class="form-group col-md-6 col-6"
                                                style="display: flex; justify-content: center; align-items: center;">
                                                <img id="preview" class="preview" src="#"
                                                     alt="preview"/>
                                            </fieldset>
                                        </div>
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

                        <div class="content-buttons mt-3" style="display: flex; justify-content: space-between;">
                            <div class="add-btn-container">
                                <button type="button" class="btn btn-success add-template-btn mr-1">
                                    {{ __('Create template') }}
                                </button>
                                <button type="button" class="btn btn-secondary add-content-btn">
                                    {{ __('Add custom content') }}
                                </button>
                            </div>
                            <div class="form-btn-container">
                                <button type="submit" form="project-create-form" class="btn btn-primary mr-1">
                                    {{ __('Save') }}
                                </button>
                                <button type="reset" form="project-create-form" class="btn btn-outline-warning">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    @push('category-modal-show-select-change')
        <script>
            $('.project-category').on('change', function () {
                if ($(this).val() === 'add-category') {
                    $(this).val($(".project-category option:first").val());
                    $('#category-add').modal('show');
                }
            });
        </script>
    @endpush

    @push('image-preview')
        <script src="{{ asset('assets/js/image-preview.js') }}"></script>
    @endpush

    @push('project-content-manipulation')
        <script>
            var avilableLangs = ['ru', 'en', 'uz'];

            function changeContentType(select) {
                // * remove existing content if any
                var changedContent = $(select).parents('.card');
                changedContent.find('.card-body').remove();
                var changedContentId = changedContent.attr('id');

                createContent(changedContentId, select.value);
            }

            $('.add-content-btn').on('click', function () {
                createSingleTemplate();
            });

            $('.add-template-btn').on('click', function () {
                var templateMessage = $('.content-container .template-message');
                let existingContent = $('.content-body').length;

                if (existingContent === 0) {
                    createFullTemplate();
                    return;
                }

                if (templateMessage.length > 0)
                    templateMessage.remove();

                templateMessage = `<div class="template-message alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="mb-0"><i class="feather icon-alert-circle"></i>
                        Cannot generate template. Content already exist
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('.content-container').append(templateMessage);
            });

            function createFullTemplate() {
                var contentType;

                for (let i = 1; i <= 6; i++) {
                    if (i % 2 === 1)
                        contentType = 'text';
                    else if (i === 2)
                        contentType = 'image-small';
                    else if (i === 4)
                        contentType = 'slide';
                    else if (i === 6)
                        contentType = 'image-big';

                    let contentId = createSingleTemplate(contentType);
                    createContent(contentId, contentType);
                }
            }

            function createSingleTemplate(contentType = 'none') {
                let lastContentId = $('.content-body').last().attr('id') ?? 0;
                ++lastContentId;

                var singleTemplate = `<div class="card mb-1 content-body" id="` + lastContentId + `">
               <div class="card-header">
                  <label for="content-type-` + lastContentId + `">Content type</label>
                  <select form="project-create-form" id="content-type-` + lastContentId + `" class="custom-select" name="content[` + lastContentId + `][type]" onchange="changeContentType(this)">
                     <option disabled="" selected="" value="">-- select a type --</option>
                     <option value="text" ` + (contentType === 'text' ? 'selected' : '') + `>Text</option>
                     <option value="image-small" ` + (contentType === 'image-small' ? 'selected' : '') + `>Small Image</option>
                     <option value="image-big" ` + (contentType === 'image-big' ? 'selected' : '') + `>Wide Image</option>
                     <option value="slide" ` + (contentType === 'slide' ? 'selected' : '') + `>Slide</option>
                  </select>
               </div>

               <div class="card-content pb-1"></div>

                <div class="card-footer">
                  <i class="feather icon-trash-2 text-danger pr-1 remove-content" onclick="removeContent(this)"></i>
               </div>
            </div>`;

                $('.content-container').append(singleTemplate);
                return lastContentId;
            }

            function createContent(contentId, contentType) {
                var content;

                switch (contentType) {
                    case 'text':
                        content = `<div class="card-body pb-0 text-copy-content">
                 <ul class="nav nav-tabs language-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                       <a class="nav-link text-uppercase active ru-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#ru-just" role="tab" aria-controls="ru-just"
                          aria-selected="true">
                          ru
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-uppercase en-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#en-just" role="tab" aria-controls="en-just" aria-selected="false">
                          en
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-uppercase uz-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#uz-just" role="tab" aria-controls="uz-just" aria-selected="false">
                          uz
                       </a>
                    </li>
                 </ul>
                 <div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0 text-content">
                    <div class="tab-pane active tab-pane-ru" role="tabpanel" aria-labelledby="ru-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-ru-` + contentId + `" class="form-control " placeholder="Title (ru)" rows="4"
                                   name="content[` + contentId + `][title][ru]">` + (contentId === 3 ? 'Задача' : '') + (contentId === 5 ? 'Сделано' : '') + `</textarea>
                                <label for="title-ru-` + contentId + `">Title (ru)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="description-ru-` + contentId + `" class="form-control " placeholder="Description (ru)" rows="4"
                                   name="content[` + contentId + `][description][ru]"></textarea>
                                <label for="description-ru-` + contentId + `">Description (ru)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane tab-pane-en" role="tabpanel" aria-labelledby="en-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-en-` + contentId + `" class="form-control " placeholder="Title (en)" rows="4"
                                   name="content[` + contentId + `][title][en]"></textarea>
                                <label for="title-en-` + contentId + `">Title (en)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="description-en-` + contentId + `" class="form-control " placeholder="Description (en)" rows="4"
                                   name="content[` + contentId + `][description][en]"></textarea>
                                <label for="description-en-` + contentId + `">Description (en)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane tab-pane-uz" role="tabpanel" aria-labelledby="uz-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-uz-` + contentId + `" class="form-control " placeholder="Title (uz)" rows="4"
                                   name="content[` + contentId + `][title][uz]"></textarea>
                                <label for="title-uz-` + contentId + `">Title (uz)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="description-uz-` + contentId + `" class="form-control " placeholder="Description (uz)" rows="4"
                                   name="content[` + contentId + `][description][uz]"></textarea>
                                <label for="description-uz-` + contentId + `">Description (uz)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="wrapper pt-1" style="display: flex; justify-content: center;">
                       <div class="form-label-group mb-1">
                          <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                             placeholder="Position" value="` + contentId + `">
                          <label for="position-` + contentId + `">Position</label>
                       </div>
                    </div>
                 </div>
              </div>
           </div>`;
                        break;

                    case 'slide':
                        content = `<div class="card-body pb-0 slide-copy-content">
                     <div class="row mr-0 ml-0 pt-1">
                        <fieldset class="form-group col-md-8 col-8 image-input-container pl-0">
                           <label for="basicInputFile" style="position: absolute; top: -1.3rem;">Image</label>
                           <div class="custom-file">
                              <input form="project-create-form" type="file" class="custom-file-input image-input " name="content[` + contentId + `][slide][]"
                                 id="input-file-` + contentId + `" onchange="setPreview(this)" multiple="">
                              <label class="custom-file-label" for="input-file-` + contentId + `"></label>
                           </div>
                        </fieldset>

                        <div class="col-md-4 col-4 pr-0">
                           <div class="form-label-group mb-0">
                              <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                                 placeholder="Position" value="` + contentId + `">
                              <label for="position-` + contentId + `">Position</label>
                           </div>
                        </div>
                     </div>
                     <fieldset class="form-group col-md-12 col-12 mb-0 p-0">
                        <div class="slide-preview"></div>
                     </fieldset>
                  </div>
               </div>`;
                        break;

                    case 'image-small':
                    case 'image-big':
                        content = `<div class="card-body pb-0 image-copy-content">
                     <div class="row mr-0 ml-0 pt-1">
                        <fieldset class="form-group col-md-6 col-6 image-input-container pl-0">
                           <label for="input-file-` + contentId + `" style="position: absolute; top: -1.3rem;">Image</label>
                           <div class="custom-file">
                              <input form="project-create-form" type="file" class="custom-file-input image-input " name="content[` + contentId + `][image]" id="input-file-` + contentId + `"
                                 onchange="setPreview(this)">
                              <label class="custom-file-label" for="input-file-` + contentId + `"></label>
                           </div>
                        </fieldset>

                        <div class="col-md-6 col-6 pr-0">
                           <div class="form-label-group mb-0">
                              <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                                 placeholder="Position" value="` + contentId + `">
                              <label for="position-` + contentId + `">Position</label>
                           </div>
                        </div>
                     </div>
                     <fieldset class="form-group col-md-6 col-6 mb-0 pl-0" style="display: flex; justify-content: center;">
                        <img class="preview" id="preview" src="#" alt="preview" style="display: none;">
                     </fieldset>
                  </div>
               </div>`;
                        break;
                }

                $('.content-body#' + contentId + ' .card-content').append(content);
            }

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
