@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-body">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Create a project') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="number-tab-steps wizard-circle form">
                                            <!-- Step 1 -->
                                            <h6>Step 1</h6>
                                            <fieldset>
                                                <form class="form" action="{{ route('projects.store') }}" method="post"
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
                                                                   class="custom-file-input @error('main_image') is-invalid @enderror"
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
                                                        <img id="preview" src="#"
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

                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>Step 2</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="proposalTitle1">Proposal Title</label>
                                                            <input type="text" class="form-control" id="proposalTitle1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jobtitle">Job Title</label>
                                                            <input type="text" class="form-control" id="jobtitle">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="shortDescription1">Short Description :</label>
                                                            <textarea name="shortDescription" id="shortDescription1"
                                                                      rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $("#preview").css('display', 'none');

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                        $("#preview").css('width', '300px');
                        $("#preview").css('display', 'block');
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#basicInputFile").change(function () {
                readURL(this);
            });
        </script>
    @endpush
@endsection
