@props(['contact', 'socialMedia'])

<form action="{{ route("social-media.store") }}" method="post" class="form">
    @csrf
    <div class="form-body">
        <div class="row">
            @php $i = 0; @endphp
            <div class="col-6">
                <div
                    class="form-label-group position-relative has-icon-left">
                    <input type="text" id="facebook"
                           class="form-control @error("social_media.$i.url") is-invalid @enderror"
                           name="social_media[{{ $i }}][url]"
                           value="{{ old("social_media.$i.url") ?? ($socialMedia[$i]->url ?? '') }}"
                           placeholder="Facebook">
                    <input type="hidden" name="social_media[{{ $i }}][name]"
                           value="Facebook">
                    <input type="hidden" name="social_media[{{ $i }}][company_contact_id]"
                           value="{{ $contact->id }}">
                    <input type="hidden" name="social_media[{{ $i }}][logo]"
                           value="about/logo/facebook.svg">
                    <div class="form-control-position">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <label for="facebook">Facebook</label>
                    @error("social_media.$i.url")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                    @error("social_media.$i.name")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @php ++$i; @endphp
            <div class="col-6">
                <div
                    class="form-label-group position-relative has-icon-left">
                    <input type="text" id="instagram"
                           class="form-control @error("social_media.$i.url") is-invalid @enderror"
                           name="social_media[{{ $i }}][url]"
                           value="{{ old("social_media.$i.url") ?? ($socialMedia[$i]->url ?? '') }}"
                           placeholder="Instagram">
                    <input type="hidden" name="social_media[{{ $i }}][name]"
                           value="Instagram">
                    <input type="hidden" name="social_media[{{ $i }}][company_contact_id]"
                           value="{{ $contact->id }}">
                    <input type="hidden" name="social_media[{{ $i }}][logo]"
                           value="about/logo/instagram.svg">
                    <div class="form-control-position">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <label for="instagram">Instagram</label>
                    @error("social_media.$i.url")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                    @error("social_media.$i.name")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @php ++$i; @endphp
            <div class="col-6">
                <div
                    class="form-label-group position-relative has-icon-left">
                    <input type="text" id="linkedin"
                           class="form-control @error("social_media.$i.url") is-invalid @enderror"
                           name="social_media[{{ $i }}][url]"
                           value="{{ old("social_media.$i.url") ?? ($socialMedia[$i]->url ?? '') }}"
                           placeholder="Linkedin">
                    <input type="hidden" name="social_media[{{ $i }}][name]"
                           value="Linkedin">
                    <input type="hidden" name="social_media[{{ $i }}][company_contact_id]"
                           value="{{ $contact->id }}">
                    <input type="hidden" name="social_media[{{ $i }}][logo]"
                           value="about/logo/linkedin.svg">
                    <div class="form-control-position">
                        <i class="fa fa-linkedin"></i>
                    </div>
                    <label for="linkedin">Linkedin</label>
                    @error("social_media.$i.url")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                    @error("social_media.$i.name")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @php ++$i; @endphp
            <div class="col-6">
                <div
                    class="form-label-group position-relative has-icon-left">
                    <input type="text" id="telegram"
                           class="form-control @error("social_media.$i.url") is-invalid @enderror"
                           name="social_media[{{ $i }}][url]"
                           value="{{ old("social_media.$i.url") ?? ($socialMedia[$i]->url ?? '') }}"
                           placeholder="Telegram">
                    <input type="hidden" name="social_media[{{ $i }}][company_contact_id]"
                           value="{{ $contact->id }}">
                    <input type="hidden" name="social_media[{{ $i }}][name]"
                           value="Telegram">
                    <input type="hidden" name="social_media[{{ $i }}][logo]"
                           value="about/logo/telegram.svg">
                    <div class="form-control-position">
                        <i class="fa fa-telegram"></i>
                    </div>
                    <label for="telegram">Telegram</label>
                    @error("social_media.$i.url")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                    @error("social_media.$i.name")
                    <p class="text-danger mb-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <button type="submit"
                        class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                    Save
                </button>
                <button type="reset"
                        class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">
                    Reset
                </button>
            </div>
        </div>
    </div>
</form>
