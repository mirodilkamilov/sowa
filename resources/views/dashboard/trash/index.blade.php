@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.alerts/>

            <div class="content-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Collapse start -->
                    <section id="collapsible">
                        @foreach($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="empty-trash-container">
                            <button type="button" class="btn btn-danger waves-effect waves-light mb-2 p-1"
                                    data-toggle="modal" data-target="#confirm-modal">
                                <span><i class="feather icon-trash"></i> {{ __('Empty trash') }}</span>
                            </button>
                        </div>

                        <x-dashboard.trash.confirm-modal/>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Deleted elements') }}</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="default-collapse collapse-bordered collapse-border">

                                                @php $numOfDeletedProjects = count($projects); @endphp
                                                @php $numOfDeletedSlides = count($slides); @endphp
                                                @php $numOfDeletedUserContacts = count($userContacts); @endphp
                                                <div class="card collapse-header">
                                                    <div id="projects" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#projects" aria-expanded="false"
                                                         aria-controls="projects">
                                                        <span class="lead collapse-title">{{ __('Projects') }}</span>
                                                        <span
                                                            class="badge badge badge-warning badge-pill float-right mr-3">{{ $numOfDeletedProjects }}</span>
                                                    </div>
                                                    <div id="projects" role="tabpanel"
                                                         aria-labelledby="headingCollapse1"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if($numOfDeletedProjects > 0)
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>{{ __('Image') }}</th>
                                                                                <th>{{ __('Slug') }}</th>
                                                                                <th>{{ __('Title') }}</th>
                                                                                <th>{{__('Category')}}</th>
                                                                                <th>{{ __('Restore') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table table-striped">
                                                                            @foreach($projects as $project)
                                                                                <tr>
                                                                                    <td>
                                                                                        <img
                                                                                            src="{{ $project->main_image }}"
                                                                                            alt="{{ $project->name }}"
                                                                                            style="height: 7.857rem;">
                                                                                    </td>
                                                                                    <td>{{ $project->slug }}</td>
                                                                                    <td>{{ $project->main_title }}</td>
                                                                                    <td class="text-center">
                                                                                        @foreach($project->categories as $category)
                                                                                            <x-dashboard.projects.category-colors
                                                                                                :category="$category->category"
                                                                                                :index="$category->id"/>
                                                                                        @endforeach
                                                                                    </td>
                                                                                    <td class="product-action">
                                                                                        <form
                                                                                            action="{{ route('trash.store') }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                   name="trash[type]"
                                                                                                   value="project">
                                                                                            <input type="hidden"
                                                                                                   name="trash[id]"
                                                                                                   value="{{ $project->id }}">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-success waves-effect waves-light">
                                                                                                <i class="feather icon-upload text-success"></i>
                                                                                                Restore
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <h3 class="card-title">{{ __('No deleted project') }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card collapse-header">
                                                    <div id="slides" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#slides" aria-expanded="false"
                                                         aria-controls="slides">
                                                    <span class="lead collapse-title">
                                                        {{ __('Slides') }}
                                                    </span>
                                                        <span
                                                            class="badge badge badge-warning badge-pill float-right mr-3">{{ $numOfDeletedSlides }}</span>
                                                    </div>
                                                    <div id="slides" role="tabpanel"
                                                         aria-labelledby="slides"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if($numOfDeletedSlides > 0)
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="text-uppercase">{{ __('Image') }}</th>
                                                                                <th class="text-uppercase">{{ __('Title') }}</th>
                                                                                <th class="text-uppercase">{{ __('Sub-title') }}</th>
                                                                                <th class="text-uppercase">{{ __('Restore') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table table-striped">
                                                                            @foreach($slides as $slide)
                                                                                <tr>
                                                                                    <td>
                                                                                        <img src="{{ $slide->image }}"
                                                                                             alt="Img placeholder"
                                                                                             style="max-width: 200px; height: auto;">
                                                                                    </td>
                                                                                    <td>{{ $slide->title }}</td>
                                                                                    <td>{{ $slide->sub_title }}</td>
                                                                                    <td class="product-action">
                                                                                        <form
                                                                                            action="{{ route('trash.store') }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                   name="trash[type]"
                                                                                                   value="slide">
                                                                                            <input type="hidden"
                                                                                                   name="trash[id]"
                                                                                                   value="{{ $slide->id }}">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-success waves-effect waves-light">
                                                                                                <i class="feather icon-upload text-success"></i> {{ __('Restore') }}
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <h3 class="card-title">{{ __('No deleted slides') }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card collapse-header">
                                                    <div id="messages" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#messages" aria-expanded="false"
                                                         aria-controls="messages">
                                                    <span class="lead collapse-title">
                                                        {{ __('Messages') }}
                                                    </span>
                                                        <span
                                                            class="badge badge badge-warning badge-pill float-right mr-3">{{ $numOfDeletedUserContacts }}</span>
                                                    </div>
                                                    <div id="messages" role="tabpanel"
                                                         aria-labelledby="messages"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if($numOfDeletedUserContacts > 0)
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="text-uppercase">{{ __('User name') }}</th>
                                                                                <th class="text-uppercase">{{ __('Phone') }}</th>
                                                                                <th class="text-uppercase">{{ __('Message') }}</th>
                                                                                <th class="text-uppercase">{{ __('Comment') }}</th>
                                                                                <th class="text-uppercase">{{ __('Restore') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table table-striped">
                                                                            @foreach($userContacts as $userContact)
                                                                                <tr>
                                                                                    <td>{{ $userContact->name }}</td>
                                                                                    <td>{{ $userContact->phone }}</td>
                                                                                    <td>{{ $userContact->message }}</td>
                                                                                    <td>{{ $userContact->comment }}</td>
                                                                                    <td class="product-action">
                                                                                        <form
                                                                                            action="{{ route('trash.store') }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                   name="trash[type]"
                                                                                                   value="message">
                                                                                            <input type="hidden"
                                                                                                   name="trash[id]"
                                                                                                   value="{{ $userContact->id }}">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-success waves-effect waves-light">
                                                                                                <i class="feather icon-upload text-success"></i> {{ __('Restore') }}
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <h3 class="card-title">{{ __('No deleted messages') }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Collapse end -->
                </div>
            </div>
        </div>
    </div>
@endsection
