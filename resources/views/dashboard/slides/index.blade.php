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
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header slides">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <a href="{{ route('slides.create') }}" class="btn btn-outline-primary" tabindex="0"
                           aria-controls="DataTables_Table_0">
                            <span><i class="feather icon-plus"></i> {{ __('Add New') }}</span>
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
                                                data-toggle="modal" data-target="#confirm-modal">
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

                <x-dashboard.confirm-modal/>

                <script>
                    var currentUrl = window.location.href.replace(/\/*$/gm, '');

                    $('.confirm-btn').click(function () {
                        var slideId = $(this).val();
                        var actionUrl = currentUrl + '/' + slideId;
                        var slideTitle = $(this).closest('.product-action').siblings('.slide-title').text();

                        $('#delete-form').attr('action', actionUrl);
                        var modalMessage = 'Слайд с заголовком ' + `<strong>` + slideTitle + `</strong>` + ' будет удален.';
                        $('.modal-body').empty().append(`<p>` + modalMessage + `</p>`);
                    });
                </script>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
