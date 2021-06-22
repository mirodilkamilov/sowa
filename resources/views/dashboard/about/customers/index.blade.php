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
                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                        data-target="#customer-add">
                    <span><i class="feather icon-plus"></i> {{ __('Add New') }}</span>
                </button>
                <div class="row custom-row">
                    @foreach($customers as $customer)
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="content-container">
                                    <div class="logo-container">
                                        <img class="customer-logo card-img img-fluid mb-1"
                                             src="{{ $customer->logo }}"
                                             alt="{{ $customer->name }}">
                                    </div>
                                    <div class="input-container">
                                        <input class="customer-id" value="{{ $customer->id }}" type="hidden">
                                        <input class="customer-position" value="{{ $customer->position }}"
                                               type="hidden">
                                        <h5 class="customer-name mt-1">{{ $customer->name }}</h5>
                                        <hr class="my-1">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="float-left">
                                        <button type="button"
                                                class="customer-edit-btn btn btn-outline-primary waves-effect waves-light"
                                                data-toggle="modal"
                                                data-target="#customer-modal">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <div class="float-right">
                                        <button type="button"
                                                class="confirm-btn btn btn-outline-danger waves-effect waves-light"
                                                data-toggle="modal" data-target="#confirm-modal">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-dashboard.add-customer-modal :positions="$positions"/>
    <x-dashboard.update-customer-modal :positions="$positions"/>
    <!-- Delete modal -->
    <x-dashboard.confirm-modal/>


    @push('image-preview')
        <script src="{{ asset('assets/js/image-preview.js') }}"></script>
    @endpush

    @push('customer-modal-manipulation')
        <script>
            var currentUrl = window.location.href.replace(/\/*$/gm, '');

            $('.customer-edit-btn').on('click', function () {
                var id = $(this).parents('.card-body').find('.customer-id').val();
                var position = $(this).parents('.card-body').find('.customer-position').val();
                var name = $(this).parents('.card-body').find('.customer-name').html();
                var logo = $(this).parents('.card-body').find('.customer-logo').attr('src');

                var modalCustomer = $('#customer-update');
                modalCustomer.modal('show');
                var form = modalCustomer.find('.form');

                var action = currentUrl + '/' + id;
                form.attr('action', action);

                modalCustomer.find('#customer-id').val(id);
                modalCustomer.find('#customer-position').val(position);
                modalCustomer.find('#customer-name').val(name);
                modalCustomer.find('#customer-logo').html('<img class="preview" src="' + logo + '"/>');
            });

            $('.confirm-btn').on('click', function () {
                var id = $(this).parents('.card-body').find('.customer-id').val();
                var name = $(this).parents('.card-body').find('.customer-name').html();
                var logo = $(this).parents('.card-body').find('.customer-logo').attr('src');

                var modalConfirm = $('#confirm-modal');
                modalConfirm.modal('show');
                var form = modalConfirm.find('.form');

                var action = currentUrl + '/' + id;
                form.attr('action', action);

                modalConfirm.find('.modal-body').empty().append('<h4 class="modal-title text-danger">' + name + '<h5/>');
                modalConfirm.find('.modal-body').append('<img class="preview" src="' + logo + '"/>');
            });
        </script>
    @endpush
@endsection
