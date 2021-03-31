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

            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#exampleModalScrollable">
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
                                        <td>{{ $category->category[$lang] }}</td>
                                    @endforeach
                                    <td class="product-action text-center">
                                        <a class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
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
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">{{ __('Create a category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="{{ route('categories.store') }}" method="post" id="category-create">
                        @csrf
                        @foreach($availableLangs as $lang)
                            <div class="col-sm-12 data-field-col pt-2 p-1 mb-0 form-label-group">
                                <input type="text" class="form-control" id="data-name" name="category[{{ $lang }}]"
                                       placeholder="{{ __('Category') . " ({$lang})" }}"
                                       value="{{ old("category.{$lang}") }}">
                                <label
                                    for="data-name"
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

    @if($errors->any())
        @push('modal-script')
            <script>
                $('#exampleModalScrollable').modal('show');
            </script>
        @endpush
    @endif


@endsection
