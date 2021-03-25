@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>NAME</th>
                                <th>CATEGORY</th>
                                <th>POPULARITY</th>
                                <th>ORDER STATUS</th>
                                <th>PRICE</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/apple-watch.png"
                                                             alt="Img placeholder">
                                </td>
                                <td class="product-name">Apple Watch series 4 GPS</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-success">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40"
                                             aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$69.99</td>
                                <td class="product-action">
                                    <a class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
                                        <i class="feather icon-edit text-primary"></i>
                                    </a>
                                    <a class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">
                                        <i class="feather icon-trash-2 text-danger"></i>
                                    </a>
                                </td>
                            </tr>
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
