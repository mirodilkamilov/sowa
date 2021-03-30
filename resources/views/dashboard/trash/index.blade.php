@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Collapse start -->
                    <section id="collapsible">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Deleted elements') }}</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="default-collapse collapse-bordered collapse-border">

                                                @php $numOfDeletedProjects = count($projects); @endphp
                                                @php $numOfDeletedSlides = count($slides); @endphp
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse1" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#collapse1" aria-expanded="false"
                                                         aria-controls="collapse1">
                                                        <span class="lead collapse-title">{{ __('Projects') }}</span>
                                                        <span
                                                            class="badge badge badge-warning badge-pill float-right mr-3">{{ $numOfDeletedProjects }}</span>
                                                    </div>
                                                    <div id="collapse1" role="tabpanel"
                                                         aria-labelledby="headingCollapse1"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if($numOfDeletedProjects > 0)
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>{{ __('Image') }}</th>
                                                                                <th>{{ __('Slug') }}</th>
                                                                                <th>{{ __('Title') }}</th>
                                                                                <th>{{__('Category')}}</th>
                                                                                <th>{{ __('Restore') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table table-striped">
                                                                            @foreach($projects as $project)
                                                                                <tr>
                                                                                    <td>
                                                                                        <img
                                                                                            src="{{ $project->main_image }}"
                                                                                            alt="{{ $project->name }}"
                                                                                            style="height: 7.857rem;">
                                                                                    </td>
                                                                                    <td>{{ $project->slug }}</td>
                                                                                    <td>{{ $project->main_title }}</td>
                                                                                    <td class="text-center">
                                                                                        @foreach($project->categories as $category)
                                                                                            <x-dashboard.category-component
                                                                                                :category="$category->category"
                                                                                                :index="$category->id"/>
                                                                                        @endforeach
                                                                                    </td>
                                                                                    <td class="product-action">
                                                                                        <a type="button"
                                                                                           class="btn btn-outline-success mr-1 mb-1 waves-effect waves-light"
                                                                                           data-toggle="modal"
                                                                                           data-target="#edit-{{ $project->name }}">
                                                                                            <i class="feather icon-upload text-success"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <h3 class="card-title">{{ __('No deleted project') }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card collapse-header">
                                                    <div id="headingCollapse2" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#collapse2" aria-expanded="false"
                                                         aria-controls="collapse2">
                                                    <span class="lead collapse-title">
                                                        {{ __('Slides') }}
                                                    </span>
                                                        <span
                                                            class="badge badge badge-warning badge-pill float-right mr-3">{{ $numOfDeletedSlides }}</span>
                                                    </div>
                                                    <div id="collapse2" role="tabpanel"
                                                         aria-labelledby="headingCollapse2"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if($numOfDeletedSlides > 0)
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="text-uppercase">{{ __('Image') }}</th>
                                                                                <th class="text-uppercase">{{ __('Title') }}</th>
                                                                                <th class="text-uppercase">{{ __('Sub-title') }}</th>
                                                                                <th class="text-uppercase">{{ __('Actions') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table table-striped">
                                                                            @foreach($slides as $slide)
                                                                                <tr>
                                                                                    <td>
                                                                                        <img src="{{ $slide->image }}"
                                                                                             alt="Img placeholder"
                                                                                             style="max-width: 200px; height: auto;">
                                                                                    </td>
                                                                                    <td>{{ $slide->title }}</td>
                                                                                    <td>{{ $slide->sub_title }}</td>
                                                                                    <td class="product-action">
                                                                                        <a type="button"
                                                                                           class="btn btn-outline-success mr-1 mb-1 waves-effect waves-light"
                                                                                           data-toggle="modal">
                                                                                            <i class="feather icon-upload text-success"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <h3 class="card-title">{{ __('No deleted slides') }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Collapse end -->
                </div>
            </div>
        </div>
    </div>
@endsection
