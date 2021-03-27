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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Add slide') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                            @foreach($availableLangs as $lang)
                                                <li class="nav-item">
                                                    <a class="nav-link text-uppercase @if($loop->first) active @endif"
                                                       id="{{ $lang }}-tab-justified"
                                                       data-toggle="tab"
                                                       href="#{{ $lang }}-just" role="tab"
                                                       aria-controls="{{ $lang }}-just"
                                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="tab-content pt-1 col-md-12 col-12">
                                                        @foreach($availableLangs as $lang)
                                                            <div class="tab-pane @if($loop->first) active @endif"
                                                                 id="{{ $lang }}-just" role="tabpanel"
                                                                 aria-labelledby="{{ $lang }}-tab-justified">

                                                                <h6 class="card-text">{{ __($lang) }}</h6>
                                                                <div class="row mt-2">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="title"
                                                                                   class="form-control"
                                                                                   placeholder="{{ __('Title') . ' ('. $lang . ')' }}"
                                                                                   name="title">
                                                                            <label
                                                                                for="title">{{ __('Title') . ' ('. $lang . ')' }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-label-group">
                                                                            <input type="text" id="sub-title"
                                                                                   class="form-control"
                                                                                   placeholder="{{ __('Sub-title') . ' ('. $lang . ')' }}"
                                                                                   name="sub_title">
                                                                            <label
                                                                                for="sub-title">{{ __('Sub-title') . ' ('. $lang . ')' }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <fieldset class="form-label-group">
                                                                            <textarea class="form-control" rows="4"
                                                                                      placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                                                                                      id="description"
                                                                                      spellcheck="false"
                                                                                      name="description"></textarea>
                                                                            <label
                                                                                for="description">{{ __('Description') . ' ('. $lang . ')' }}</label>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="col-md-6 col-12 mt-2">
                                                        <div class="form-label-group">
                                                            <input type="text" id="url" class="form-control"
                                                                   placeholder="{{ __('Url') }}" name="url">
                                                            <label for="url">{{ __('Url') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 mt-2">
                                                        <div class="form-label-group mb-0">
                                                            <input type="number" id="position"
                                                                   class="form-control"
                                                                   name="position"
                                                                   placeholder="{{ __('Position') }}">
                                                            <x-dashboard.available-positions :positions="$positions"/>
                                                            <label for="position">{{ __('Position') }}</label>
                                                        </div>
                                                    </div>

                                                    <fieldset class="form-group col-md-12 col-12">
                                                        <label for="basicInputFile">{{ __('Image') }}</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="basicInputFile">
                                                            <label class="custom-file-label"
                                                                   for="basicInputFile"></label>
                                                        </div>
                                                    </fieldset>
                                                    <div class="col-12 mt-1">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">
                                                            Submit
                                                        </button>
                                                        <button type="reset"
                                                                class="btn btn-outline-warning mr-1 mb-1">
                                                            Reset
                                                        </button>
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
@endsection
