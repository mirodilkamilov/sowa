@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="mb-0"><i class="feather icon-check"></i>
                        {{ session('success') }}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <a href="{{ route('projects.create')  }}" class="btn btn-outline-primary" tabindex="0"
                           aria-controls="DataTables_Table_0">
                            <span><i class="feather icon-plus"></i> Add New</span>
                        </a>
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="product-img">
                                        <img src="{{ $project->main_image }}" alt="Img placeholder">
                                    </td>
                                    <td class="product-category">{{ $project->slug }}</td>
                                    <td class="product-name">{{ $project->main_title }}</td>
                                    <td class="text-center">
                                        @foreach($project->categories as $category)
                                            <x-dashboard.category-component :category="$category->category"
                                                                            :index="$category->id"/>
                                        @endforeach
                                    </td>
                                    <td class="product-action text-center">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
