@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-dashboard.alerts/>

            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#category-add">
                <span><i class="feather icon-plus"></i> {{ __('Add New') }}</span>
            </button>
            <div class="content-body">
                <section id="data-list-view" class="data-list-view-header">
                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                @foreach($availableLangs as $lang)
                                    <th>{{ __('Category') . " ({$lang})" }}</th>
                                @endforeach
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    @foreach($availableLangs as $lang)
                                        <td class="category">{{ $category->category[$lang] }}</td>
                                    @endforeach
                                    <td class="product-action text-center">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                           class="btn btn-outline-primary waves-effect waves-light category-edit-btn mr-1">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <button type="button" value="{{ $category->id }}"
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
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <x-dashboard.categories.add-modal :availableLangs="$availableLangs"/>

    <x-dashboard.confirm-modal/>

    <script>
        var currentUrl = window.location.href.replace(/\/*$/gm, '');

        $('.confirm-btn').click(function () {
            var categoryId = $(this).val();
            var actionUrl = currentUrl + '/' + categoryId;
            var categoryArray = $(this).closest('.product-action').siblings('.category').map(function () {
                return this.textContent;
            }).get();
            var categories = '';
            for (let i = 0; i < categoryArray.length; i++) {
                if (i === categoryArray.length - 1) {
                    categories = categories + categoryArray[i];
                    continue;
                }
                categories = categories + categoryArray[i] + ' | ';
            }

            $('#delete-form').attr('action', actionUrl);
            var modalMessage = 'Эти категории будут удалены: ' + `<strong>` + categories + `</strong>`;
            $('.modal-body').empty().append(`<p>` + modalMessage + `</p>`);
        });
    </script>

@endsection
