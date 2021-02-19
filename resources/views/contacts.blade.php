<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sowa – Контакты</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="author" content="Sowa" />
    <meta name="description" content="Sowa - digital agency." />

    <!-- Twitter data -->
    <meta property="og:title" content="Sowa" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="sowa.uz" />
    <meta property="og:image" content="assets/images/social.jpg" />
    <meta property="og:description" content="Sowa -  digital agency." />
    <meta property="og:site_name" content="Sowa" />

    <!-- Open Graph data -->
    <meta property="og:title" content="Sowa" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="sowa.uz" />
    <meta property="og:image" content="assets/images/social.jpg" />
    <meta property="og:description" content="Sowa -  digital agency." />
    <meta property="og:site_name" content="Sowa" />

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
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />

    <!-- Mapbox-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />

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
        <a class="logo-link" href="index.html">
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

<!-- Contact -->
<div class="flex-conteiner-fluid h--100">
    <div class="row align-items-md-center">
        <div class="col-12 col-lg-6">
            <div class="contact-wrap">
                <h1 class="title title--h3 js-lines">Оставьте ваш номер телефона и мы вам обязательно позвоним!</h1>
                <form id="contact-form" data-toggle="validator">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="inputText" id="name" name="name" placeholder="ФИО"
                                       required="required" autocomplete="off"
                                       oninvalid="setCustomValidity('Fill in the field')"
                                       onkeyup="setCustomValidity('')">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="inputText" id="email" name="email"
                                       placeholder="email" autocomplete="off"
                                       oninvalid="setCustomValidity('Email is incorrect')"
                                       onkeyup="setCustomValidity('')">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
									<textarea class="textarea" id="message" name="message" placeholder="Сообщение"
                                              rows="1" required="required" oninvalid="setCustomValidity('Fill in the field')"
                                              onkeyup="setCustomValidity('')"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn">Отправить</button>
                        </div>
                    </div>
                    <div id="validator-contact" class="hidden">&nbsp;</div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <!-- <div class="map-block reveal" id="map"></div> -->
            <iframe style="height: 100vh;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.091271499539!2d69.3055387383421!3d41.329694802707515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef4c73708ffff%3A0xe52cd4bf2ce55aac!2z0KjQvtGDINCR0L7RgNGM0LHQsCDQo9C80L7Qsg!5e0!3m2!1sru!2s!4v1611902200724!5m2!1sru!2s"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
        </div>
    </div>
</div>
<!-- /Contact -->

<!-- Menu -->
<div class="menu">
    <div class="menu-inner">
        <ul class="menu-list">
            <li><a class="menu-list__item" href="projects.html"><span>Проекты</span></a></li>
            <li><a class="menu-list__item" href="about.html"><span>О нас</span></a></li>
            <!--<li><a class="menu-list__item" href="news.html"><span>news</span></a></li>-->
            <li><a class="menu-list__item" href="contacts.html"><span>Контакты</span></a></li>
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

<!-- Mapbox init -->
<script src="assets/js/mapbox.init.js"></script>

</body>

</html>
