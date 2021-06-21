<!DOCTYPE html>

<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <title>Sowa - {{ __('Dashboard') }}</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <meta name="author" content="Sowa"/>
    <meta name="description" content="Sowa - digital agency."/>

    <!-- Twitter data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Sowa">
    <meta name="twitter:title" content="Sowa">
    <meta name="twitter:description" content="Sowa -  digital agency.">
    <meta name="twitter:image" content="/assets/images/social.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Sowa"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="sowa.uz"/>
    <meta property="og:image" content="/assets/images/social.jpg"/>
    <meta property="og:description" content="Sowa -  digital agency."/>
    <meta property="og:site_name" content="Sowa"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/favicons/site.webmanifest">
    <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#3a3a3a">
    <link rel="shortcut icon" href="/assets/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="/assets/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-todo.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/data-list-view.css">
    <!-- END: Page CSS-->

    <link rel="stylesheet" href="/assets/styles/custom.css">
    {{--    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns navbar-sticky fixed-footer todo-application"
      data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">

                    <x-dashboard.language-dropdown :availableLangs="$availableLangs" :locale="$locale"/>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <i class="ficon feather icon-maximize"></i>
                        </a>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ $name }}</span>
                                <span class="user-status">Admin</span>
                            </div>
                            <div class="avatar">
                                <span class="avatar-content">{{ Str::substr($name, 0, 1) }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}">
                                <i class="feather icon-user"></i>
                                Edit Profile
                            </a>
                            <div class="dropdown-divider"></div>

                            <!-- Log out -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="feather icon-power"></i>{{ __('Log out') }}
                                </a>
                            </form>
                            <!-- /Log out -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home.index', $locale) }}">
                    <img src="/assets/images/logo-black.svg" alt="Sowa logo" width="35px">
                    <h2 class="brand-text mb-0">Sowa</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary"
                       data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @if($currentRoute === 'account settings') active @endif">
                <a href="{{ route('dashboard.index') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="nav-item @if($currentRoute === 'slides') active @endif">
                <a
                    href="{{ route('slides.index') }}">
                    <i class="feather icon-monitor"></i>
                    <span class="menu-title">{{ __('Slides') }}</span>
                </a>
            </li>
            <li class="nav-item @if($currentRoute === 'categories') active @endif">
                <a href="{{ route('categories.index') }}">
                    <i class="feather icon-list"></i>
                    <span class="menu-title">{{ __('Categories') }}</span>
                </a>
            </li>
            <li class="nav-item @if($currentRoute === 'projects') active @endif">
                <a href="{{ route('projects.index') }}">
                    <i class="feather icon-briefcase"></i>
                    <span class="menu-title">{{ __('Projects') }}</span>
                </a>
            </li>
            <li class="nav-item @if($currentRoute === 'contacts') active @endif">
                <a href="{{ route('contacts.index') }}">
                    <i class="feather icon-message-square"></i>
                    <span class="menu-title">{{ __('Messages') }}</span>
                    @if($numNewMessages > 0)
                        <span class="badge badge badge-info badge-pill float-right">{{$numNewMessages}}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item @if($currentRoute === 'about') sidebar-group-active open @endif">
                <a href="#">
                    <i class="feather icon-info"></i>
                    <span class="menu-title">{{ __('About us') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="@if($currentRoute === 'about') active @endif">
                        <a href="{{ route('about.index') }}">
                            <i></i>
                            <span class="menu-item">{{ __('Main information') }}</span>
                        </a>
                    </li>
                    <li class="@if($currentRoute === 'customers') active @endif">
                        <a href="{{ route('customers.index') }}">
                            <i></i>
                            <span class="menu-item">{{ __('Customers') }}</span>
                        </a>
                    </li>
                    <li class="@if($currentRoute === 'company-contacts') active @endif">
                        <a href="{{ route('company-contacts.index') }}">
                            <i></i>
                            <span class="menu-item">{{ __('Contacts') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if($currentRoute === 'trash') active @endif">
                <a href="{{ route('trash.index') }}">
                    <i class="feather icon-trash-2"></i>
                    <span class="menu-title">{{ __('Deleted elements') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Vendor JS-->
<script src="/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/ui/prism.min.js"></script>

<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.js"></script>
<script src="/app-assets/js/core/app.js"></script>
<script src="/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/app-assets/js/scripts/ui/data-list-view.js"></script>
<script src="/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="/app-assets/js/scripts/pages/app-todo.js"></script>
<script src="/app-assets/js/scripts/pages/app-user.js"></script>
<script src="/app-assets/js/scripts/modal/components-modal.js"></script>

<script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>

{{--<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
<!-- END: Page JS-->

@stack('modal-show')
@stack('category-modal-show')
@stack('customer-modal-manipulation')
@stack('category-modal-show-select-change')
@stack('image-preview')
@stack('edit-user-message')
@stack('project-content-manipulation')
@stack('change-language-tabs')
@stack('about-list-manipulation')
@stack('company-contacts-list-manipulation')

</body>
<!-- END: Body-->

</html>
