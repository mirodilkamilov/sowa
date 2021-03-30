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
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Add slide') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <x-dashboard.language-tabs :availableLangs="$availableLangs"/>

                                        <form class="form" action="{{ route('slides.store') }}" method="post"
                                              enctype="multipart/form-data" id="slide-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="tab-content pt-1 col-md-12 col-12">
                                                        @foreach($availableLangs as $lang)
                                                            <div class="tab-pane @if($loop->first) active @endif"
                                                                 id="{{ $lang }}-just" role="tabpanel"
                                                                 aria-labelledby="{{ $lang }}-tab-justified">

                                                                <div class="row">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="title"
                                                                                   class="form-control @error("title.{$lang}") is-invalid @enderror"
                                                                                   placeholder="{{ __('Title') . ' ('. $lang . ')' }}"
                                                                                   name="title[{{ $lang }}]"
                                                                                   value="{{ old("title.{$lang}") }}">
                                                                            <label
                                                                                for="title">{{ __('Title') . ' ('. $lang . ')' }}</label>
                                                                            @error("title.{$lang}")
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="sub-title"
                                                                                   class="form-control @error("sub_title.{$lang}") is-invalid @enderror"
                                                                                   placeholder="{{ __('Sub-title') . ' ('. $lang . ')' }}"
                                                                                   name="sub_title[{{ $lang }}]"
                                                                                   value="{{ old("sub_title.{$lang}") }}">
                                                                            <label
                                                                                for="sub-title">{{ __('Sub-title') . ' ('. $lang . ')' }}</label>
                                                                            @error("sub_title.{$lang}")
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea
                                                                                class="form-control @error("description.{$lang}") is-invalid @enderror"
                                                                                rows="4"
                                                                                placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                                                                                id="description"
                                                                                spellcheck="false"
                                                                                name="description[{{ $lang }}]">{{ old("description.{$lang}") }}</textarea>
                                                                            <label
                                                                                for="description">{{ __('Description') . ' ('. $lang . ')' }}</label>
                                                                            @error("description.{$lang}")
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

                <section id="basic-divider">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Common form fields</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="url"
                                                           class="form-control @error('url') is-invalid @enderror"
                                                           placeholder="{{ __('Url') }}" name="url" form="slide-form"
                                                           value="{{ old('url') }}">
                                                    <label for="url">{{ __('Url') }}</label>
                                                    @error('url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group mb-0">
                                                    <input type="number" id="position"
                                                           class="form-control @error('position') is-invalid @enderror"
                                                           name="position"
                                                           placeholder="{{ __('Position') }}" form="slide-form"
                                                           value="{{ old('position') }}">
                                                    <label for="position">{{ __('Position') }}</label>
                                                    @error('position')
                                                    <p class="text-danger mb-0">{{ $message }}</p>
                                                    @enderror
                                                    <x-dashboard.available-positions :positions="$positions"/>
                                                </div>
                                            </div>

                                            <fieldset class="form-group col-md-12 col-12">
                                                <label for="basicInputFile">{{ __('Image') }}</label>
                                                <div class="custom-file">
                                                    <input type="file"
                                                           class="custom-file-input @error('image') is-invalid @enderror"
                                                           name="image"
                                                           id="basicInputFile" form="slide-form">
                                                    <label class="custom-file-label"
                                                           for="basicInputFile"></label>
                                                    @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group col-md-12 col-12"
                                                      style="display: flex; justify-content: center; align-items: center;">
                                                <img id="preview" src="#" alt="preview"/>
                                            </fieldset>

                                            <div class="col-12 mt-1">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                        form="slide-form">
                                                    {{ __('Add slide') }}
                                                </button>
                                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1"
                                                        form="slide-form">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @push('file-preview')
        <script>
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
