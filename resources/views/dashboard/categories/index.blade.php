@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#category-add">
                <span><i class="feather icon-plus"></i> Add New</span>
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
                                                data-toggle="modal" data-target="#exampleModalCenter">
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

    <!-- Add Modal -->
    <div class="modal fade" id="category-add" tabindex="-1"
         role="dialog"
         aria-labelledby="category-addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h5 class="modal-title" id="category-addTitle">{{ __('Create a category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="{{ route('categories.store') }}" method="post" id="category-create">
                        @csrf
                        @foreach($availableLangs as $lang)
                            <div class="col-sm-12 data-field-col pt-2 p-1 mb-0 form-label-group">
                                <input type="text" class="form-control category-edit-input" id="category_{{$lang}}"
                                       name="category[{{ $lang }}]"
                                       placeholder="{{ __('Category') . " ({$lang})" }}"
                                       value="{{ old("category.{$lang}") }}">
                                <label
                                    for="category_{{$lang}}"
                                    style="padding-left: 0.6rem; top: 0;">{{ __('Category') . " ({$lang})" }}</label>
                                @error("category.{$lang}")
                                <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="add-data-btn">
                        <button class="btn btn-outline-success mr-1" type="submit" form="category-create">
                            Add category
                        </button>
                    </div>
                    <div class="cancel-data-btn">
                        <button class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
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
                    <p id="category-title"></p>
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
    <!-- /Delete Modal -->

    <script>
        $(".confirm-btn").click(function () {
            var categoryId = $(this).val();
            var actionUrl = window.location.href + '/' + categoryId;
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

            $("#delete-form").attr("action", actionUrl);
            var modalMessage = 'These categories is going to be deleted: ' + categories;
            $("#category-title").text(modalMessage);
        });
    </script>

    @if($errors->any())
        @push('modal-script')
            <script>
                $('#category-add').modal('show');
            </script>
        @endpush
    @endif


@endsection
