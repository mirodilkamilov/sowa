@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-body @if(!isset($about)) fullheight-content @endif">
                @if(isset($about))
                    <div class="content-body">
                        <button class="btn btn-success mr-1 mb-2" tabindex="0"
                                aria-controls="DataTables_Table_0">
                        <span>
                            <i class="feather icon-plus"></i>
                            Add List
                        </span>
                        </button>
                        <button class="btn btn-outline-primary mb-2" tabindex="0" aria-controls="DataTables_Table_0">
                        <span>
                            <i class="feather icon-edit"></i>
                            Edit
                        </span>
                        </button>

                        <section id="description" class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ $about->image }}"
                                     alt="Card image cap">
                                <div class="card-img-overlay overflow-hidden">
                                    <p class="card-title position-absolute"
                                       style="bottom: 20%;">{{ $about->image_title }}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $about->about_title }}</h4>
                                    <div class="card-text">
                                        <p>{{ $about->about_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="description" class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $about->help_title }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="card-text">
                                        <p>{{ $about->help_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider">
                            <h4 class="card-title pl-2 mb-0">Lists</h4>
                            <div class="card-body row">
                                @foreach($about->aboutLists as $list)
                                    <div class="col-lg-6 col-md-12 mb-1">
                                        <h4 class="card-title">{{ $list->title }}</h4>
                                        <ul class="card-text list-style-circle pl-1">
                                            @foreach($list->list as $list)
                                                <li class="card-text">{{ $list }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>

{{--                    <button class="btn btn-outline-primary mb-2" tabindex="0" aria-controls="DataTables_Table_0">--}}
{{--                        <span>--}}
{{--                            <i class="feather icon-edit"></i>--}}
{{--                            Edit--}}
{{--                        </span>--}}
{{--                    </button>--}}
                @endif
                <a href="{{ route('about.create') }}" class="btn btn-success mr-1 mb-2 " tabindex="0"
                        aria-controls="DataTables_Table_0">
                        <span>
                            <i class="feather icon-plus"></i>
                            Add Main Information
                        </span>
                </a>
            </div>
        </div>
    </div>
@endsection
