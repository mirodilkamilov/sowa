@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"
                                :slicedSegment="$slicedSegment ?? null"/>

            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card mb-1">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Edit') }} {{ __('category') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('categories.update', $category->id) }}"
                                              method="post"
                                              enctype="multipart/form-data" id="slide-form">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <p class="warning">
                                                    <i class="feather icon-alert-triangle"></i>
                                                    {{ __('Edited category will change in all projects with this category, as well') }}
                                                </p>
                                                <div class="form-row">
                                                    @foreach($availableLangs as $lang)
                                                        <div class="col-md-4 col-12 mt-1 mb-1">
                                                            <div class="form-label-group">
                                                                <input type="text"
                                                                       name="{{ "category[$lang]" }}"
                                                                       class="form-control @error("category.$lang") is-invalid @enderror"
                                                                       id="validationTooltip01"
                                                                       placeholder="{{ __('Category') . ' ('. $lang . ')' }}"
                                                                       value="{{ old("category.$lang") ?? $category->category[$lang] }}">
                                                                <label
                                                                    for="validationTooltip01">{{ __('Category') . ' ('. $lang . ')' }}</label>
                                                                @error("category.$lang")
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                                form="slide-form">
                                                            {{ __('Edit') }} {{ __('slide') }}
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1"
                                                                form="slide-form">
                                                            {{ __('Reset') }}
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
