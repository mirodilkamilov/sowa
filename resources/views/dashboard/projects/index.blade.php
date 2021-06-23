@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-dashboard.alerts/>

            <div class="content-body">
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <div class="table-responsive">
                        <a href="{{ route('projects.create')  }}" class="btn btn-outline-primary" tabindex="0"
                           aria-controls="DataTables_Table_0">
                            <span><i class="feather icon-plus"></i> {{ __('Add New') }}</span>
                        </a>
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="product-img">
                                        <img src="{{ $project->main_image }}" alt="Img placeholder">
                                    </td>
                                    <td class="product-category slug">{{ $project->slug }}</td>
                                    <td class="product-name">{{ $project->main_title }}</td>
                                    <td class="text-center">
                                        @foreach($project->categories as $category)
                                            <x-dashboard.projects.category-colors :category="$category->category"
                                                                                  :index="$category->id"/>
                                        @endforeach
                                    </td>
                                    <td class="product-action text-center">
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                           class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <button type="button" value="{{ $project->id }}"
                                                class="confirm-btn btn btn-outline-danger waves-effect waves-light mr-1 mb-1"
                                                data-toggle="modal" data-target="#confirm-modal">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <x-dashboard.confirm-modal/>

    @push('modal-show')
        <script>
            var currentUrl = window.location.href.replace(/\/*$/gm, '');

            $('.confirm-btn').on('click', function () {
                var id = $(this).attr('value');
                var image = $(this).parent().siblings('.product-img').find('img').attr('src');
                var slug = $(this).parent().siblings('.slug').html();
                var title = $(this).parent().siblings('.product-name').html();

                var modal = $('#confirm-modal');
                var modalBody = modal.find('.modal-body');
                modalBody.empty().append('<h4 class="modal-title text-danger">' + slug + '<h5/>');
                modalBody.append('<img class="preview" src="' + image + '" width="200px" />');
                modalBody.append('<p class="mt-1">' + title + '</p>');

                var form = modal.find('form');
                var action = currentUrl + '/' + id;
                form.attr('action', action);
            });

        </script>
    @endpush
@endsection
