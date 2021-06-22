<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 footer__left">
                <div>
                    <h6 class="title title--h6 weight--300 mb--2">{{ __('Leave your phone number and we will definitely call you!') }}</h6>
                    <!-- Newsletter -->
                    <div class="form-group">
                        <form action="{{ route('user-phone.store', $locale) }}" method="post" id="user-phone-form">
                            @csrf
                            <div
                                class="form-inline newsletter-form__row @error('phone') has-error has-danger @enderror">
                                <input name="phone" value="{{ old('phone') }}"
                                       type="text"
                                       class="inputText inputText--fill"
                                       placeholder="{{ __('Phone number...') }}"
                                       autocomplete="off">
                                <button type="submit" class="btn btn__icon btn--white ">
                                    <i class="icon-arrow-right"></i>
                                </button>
                                @error('phone')
                                <div class="help-block with-errors">
                                    <ul class="list-unstyled">
                                        <li>{{ $message }}</li>
                                    </ul>
                                </div>
                                @enderror
                            </div>
                            <div id="validator-newsletter" class="form-result text-center"></div>
                        </form>
                    </div>
                    <!-- /Newsletter -->
                </div>
            </div>

            <div class="col-12 col-md-6 footer__right">
                <ul class="listContact list-unstyled">
                    <li><h6 class="title title--h6">{{ __('Address') }}</h6></li>
                    <li>{{ $companyContact?->address }}</li>
                </ul>
                <ul class="listContact list-unstyled">
                    <li><h6 class="title title--h6">{{ __('Contacts') }}</h6></li>
                    @if(isset($companyContact))
                        @foreach($companyContact->email as $email)
                            <li>{{ $email }}</li>
                        @endforeach
                        @foreach($companyContact->phone as $phone)
                            <li>{{ $phone }}</li>
                        @endforeach
                    @endif
                </ul>
                <ul class="listContact list-unstyled">
                    <li><h6 class="title title--h6">{{ __('Social networks') }}</h6></li>
                    @if(isset($companyContact->socialMedia))
                        @foreach($companyContact->socialMedia as $socialMedia)
                            <li>
                                <a class="link_decoration" href="{{ $socialMedia->url }}">{{ $socialMedia->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

@if($errors->hasAny('phone'))
    @push('scroll-down')
        <script>
            $(document).ready(function () {
                $('html, body').animate({
                    scrollTop: $('#user-phone-form').offset().top,
                }, {
                    delay: 4000,
                    duration: 4000
                });
            });
        </script>
    @endpush
@endif
