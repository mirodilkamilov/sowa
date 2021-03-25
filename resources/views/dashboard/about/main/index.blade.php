@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-body">
                <div class="content-body">
                    <!-- Description -->
                    <section id="description" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-text">
                                    <p>The fixed layout has a fixed navbar, navigation menu and footer only content
                                        section
                                        is
                                        scrollable to user. In this page you can experience it. Fixed layout provide
                                        seamless UI
                                        on different screens.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--/ Description -->
                </div>

            </div>
        </div>
    </div>
@endsection
