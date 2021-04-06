<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 footer__left">
                <div>
                    <h6 class="title title--h6 weight--300 mb--2">{{ __('Leave your phone number and we will definitely call you!') }}</h6>
                    <!-- Newsletter -->
                    <div class="form-group">
                        <form class="newsletter-form" data-toggle="validator">
                            <div class="form-inline newsletter-form__row">
                                <input type="tel" class="inputText inputText--fill"
                                       placeholder="{{ __('Phone number...') }}"
                                       required autocomplete="off">
                                <button type="submit" class="btn btn__icon btn--white "><i class="icon-arrow-right"></i>
                                </button>
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
                    <li>{{ $companyContact?->email }}</li>
                    <li>{{ $companyContact?->phone }}</li>
                </ul>
                <ul class="listContact list-unstyled">
                    <li><h6 class="title title--h6">{{ __('Social networks') }}</h6></li>
                    @if(isset($companyContact->socialMedia))
                        @foreach($companyContact?->socialMedia as $socialMedia)
                            <li><a class="link_decoration" href="{{ $socialMedia->url }}">{{ $socialMedia->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->
