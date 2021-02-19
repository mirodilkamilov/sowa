<!-- TODO: Change every page's title -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>Sowa – Digital агентство</title>

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
    <meta name="twitter:image" content="assets/images/social.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Sowa"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="sowa.uz"/>
    <meta property="og:image" content="assets/images/social.jpg"/>
    <meta property="og:description" content="Sowa -  digital agency."/>
    <meta property="og:site_name" content="Sowa"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <link rel="mask-icon" href="assets/images/favicons/safari-pinned-tab.svg" color="#3a3a3a">
    <link rel="shortcut icon" href="assets/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="assets/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}"/>

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="preloader__wrap">
        <img class="preloader__logo" src="assets/images/logo-white.svg" alt="Sowa">
        <div class="preloader__progress"><span></span></div>
    </div>
</div>

<!-- Top -->
<nav class="navbar">
    <div class="mr-auto logo-container">
        <a class="logo-link" href="/">
            <img class="logotype logotype__front" src="assets/images/logo-black.svg" alt="Sowa.">
            <img class="logotype logotype__back" src="assets/images/logo-white.svg" alt="Sowa.">
        </a>
    </div>
    <div class="ml-sm-auto">
        <button class="hamburger zoom-cursor" type="button">
            <span class="hamburger__inner"></span>
        </button>
    </div>
</nav>
<!-- /Top -->

@yield('content')

<!-- Menu -->
<div class="menu">
    <div class="menu-inner">
        <ul class="menu-list">
            <li><a class="menu-list__item" href="{{ asset('projects') }}"><span>проекты</span></a></li>
            <li><a class="menu-list__item" href="{{ asset('about') }}"><span>О нас</span></a></li>
            <!--<li><a class="menu-list__item" href="news.html"><span>news</span></a></li>-->
            <li><a class="menu-list__item" href="{{ asset('contacts') }}"><span>контакты</span></a></li>
        </ul>
    </div>
    <div class="social social--white">
        <a class="social__link">FB</a>
        <a class="social__link">TW</a>
        <a class="social__link">IG</a>
    </div>
</div>
<div class="ef-background"></div>
<!-- /Menu -->

<div class="cursor"></div>

<!-- JavaScripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/common.js"></script>

</body>
</html>
