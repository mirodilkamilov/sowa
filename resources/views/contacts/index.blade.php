@extends('layouts.header')

@section('content')
    <!-- Contact -->
    <div class="flex-conteiner-fluid h--100">
        <div class="row align-items-md-center">
            <div class="col-12 col-lg-6">
                <div class="contact-wrap">
                    <h1 class="title title--h3 js-lines">{{ __('Leave your phone number and we will definitely call you!') }}</h1>
                    <form id="contact-form" data-toggle="validator">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="inputText" id="name" name="name"
                                           placeholder="{{ __('Full name') }}"
                                           required="required" autocomplete="off"
                                           oninvalid="setCustomValidity('Fill in the field')"
                                           onkeyup="setCustomValidity('')">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" class="inputText" id="email" name="email"
                                           placeholder="Email" autocomplete="off"
                                           oninvalid="setCustomValidity('Email is incorrect')"
                                           onkeyup="setCustomValidity('')">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
									<textarea class="textarea" id="message" name="message"
                                              placeholder="{{ __('Message') }}"
                                              rows="1" required="required"
                                              oninvalid="setCustomValidity('Fill in the field')"
                                              onkeyup="setCustomValidity('')"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn">{{ __('Send') }}</button>
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
@endsection
