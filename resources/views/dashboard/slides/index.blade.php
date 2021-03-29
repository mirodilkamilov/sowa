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
                        <a href="{{ URL::current() . '/create' }}" class="btn btn-outline-primary" tabindex="0"
                           aria-controls="DataTables_Table_0">
                            <span><i class="feather icon-plus"></i> Add New</span>
                        </a>
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th class="text-uppercase">{{ __('Image') }}</th>
                                <th class="text-uppercase">{{ __('Position') }}</th>
                                <th class="text-uppercase">{{ __('Title') }}</th>
                                <th class="text-uppercase">{{ __('Sub-title') }}</th>
                                <th class="text-uppercase">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $slide)
                                <tr>
                                    <td class="product-img">
                                        <img src="{{ $slide->image }}" alt="Img placeholder"
                                             style="min-width: 100%; height: calc(10rem / 0.6667);">
                                    </td>
                                    <td class="product-price">{{ $slide->position }}</td>
                                    <td class="product-name">{{ $slide->title }}</td>
                                    <td class="product-name">{{ $slide->sub_title }}</td>
                                    <td class="product-action">
                                        <a href="{{ route('slides.edit', $slide->id) }}"
                                           class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <form action="{{ route('slides.destroy', $slide->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light"
                                                    type="submit">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </form>
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
