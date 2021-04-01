@extends('layouts.header')

@section('content')
    <!-- Contact -->
    <div class="flex-conteiner-fluid h--100">
        <div class="row align-items-md-center">
            <div class="col-12 col-lg-6">
                <div class="contact-wrap">
                    <h1 class="title title--h3 js-lines mb-3">{{ __('Leave your phone number and we will definitely call you!') }}</h1>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
                            <p class="mb-0"><i class="feather icon-check"></i>
                                {{ __(session('success')) }}
                            </p>
                        </div>
                    @endif

                    <form action="{{ route('contacts.store', $locale) }}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group @error('name') has-error has-danger @enderror">
                                    <input type="text" class="inputText" id="name" name="name"
                                           placeholder="{{ __('Full name') }}" autocomplete="off"
                                           value="{{ old('name') }}">
                                    <div class="help-block with-errors">
                                        @error('name')
                                        <ul class="list-unstyled">
                                            <li>{{ $message }}</li>
                                        </ul>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group @error('phone') has-error has-danger @enderror">
                                    <input type="tel" class="inputText" id="phone" name="phone"
                                           placeholder="{{ __('Phone') }}"
                                           autocomplete="off" value="{{ old('phone') }}">
                                    <div class="help-block with-errors phone-errors">
                                        @error('phone')
                                        <ul class="list-unstyled">
                                            <li>{{ $message }}</li>
                                        </ul>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group @error('message') has-error has-danger @enderror">
									<textarea class="textarea" id="message" name="message"
                                              placeholder="{{ __('Message') }}"
                                              rows="1">{{ old('message') }}</textarea>
                                    <div class="help-block with-errors">
                                        @error('message')
                                        <ul class="list-unstyled">
                                            <li>{{ $message }}</li>
                                        </ul>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn">{{ __('Send') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- <div class="map-block reveal" id="map"></div> -->
                <iframe style="height: 100vh;"
                        src="{{ $map }}"
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
