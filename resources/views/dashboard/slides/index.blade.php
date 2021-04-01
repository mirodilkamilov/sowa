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
                <section id="data-thumb-view" class="data-thumb-view-header slides">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <a href="{{ route('slides.create') }}" class="btn btn-outline-primary" tabindex="0"
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
                                             style="width: 100%; max-width: 200px; height: auto;">
                                    </td>
                                    <td class="product-price">{{ $slide->position }}</td>
                                    <td class="product-name slide-title">{{ $slide->title }}</td>
                                    <td class="product-name">{{ $slide->sub_title }}</td>
                                    <td class="product-action">
                                        <a href="{{ route('slides.edit', $slide->id) }}"
                                           class="btn btn-outline-primary mr-1 waves-effect waves-light">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <button type="button" value="{{ $slide->id }}"
                                                class="confirm-btn btn btn-outline-danger waves-effect waves-light"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->
                </section>
                <!-- Data list view end -->

                <!-- Confirm Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                         role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center">{{ __('Are you sure you want to delete?') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="slide-title"></p>
                            </div>
                            <div class="modal-footer">
                                <form action="" method="post" id="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger mr-1 waves-effect waves-light"
                                            type="submit">
                                        Yes, delete it!
                                    </button>
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"
                                            aria-label="Close">
                                        Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Confirm Modal -->

                <script>
                    $(".confirm-btn").click(function () {
                        var slideId = $(this).val();
                        var currentUrl = window.location.href;
                        currentUrl = currentUrl.replace(/\/$/, '');
                        var actionUrl = currentUrl + '/' + slideId;
                        var slideTitle = $(this).closest('.product-action').siblings('.slide-title').text();

                        $("#delete-form").attr("action", actionUrl);
                        var modalMessage = 'Slide with title of ' + slideTitle + ' is going to be deleted.';
                        $("#slide-title").text(modalMessage);
                    });
                </script>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
