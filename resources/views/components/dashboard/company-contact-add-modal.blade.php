@props(['id' => 'add-company-contacts'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog"
     aria-labelledby="edit-contacts" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document"
         style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Company contacts add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('company-contacts.store') }}" method="post" class="form pt-1">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="phone-list-container col-12">
                                @php
                                    $i = 0;
                                    $numOfPhoneLists = old('contacts.phone') === null ? 0 : count(old('contacts.phone'));

                                    do {
                                @endphp
                                <div class="list-item-container mt-0 mb-2">
                                    @error('contacts.phone')
                                    <p class="text-danger mb-1">{{ $message }}</p>
                                    @enderror
                                    <div class="form-label-group list-item mb-0">
                                        <input name="contacts[phone][]" value="{{ old("contacts.phone.$i") }}"
                                               id="phone"
                                               class="form-control @error("contacts.phone.$i") is-invalid @enderror"
                                               placeholder="{{ __('Phone') }}" type="text" autofocus>
                                        <i class="feather icon-plus-circle text-primary pl-1 add-list-item"
                                           onclick="addListItem(this)"></i>
                                        <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
                                           onclick="removeListItem(this)"></i>
                                        <label for="phone">{{ __('Phone') }}</label>
                                    </div>
                                    @error("contacts.phone.$i")
                                    <p class="text-danger mb-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @php
                                    ++$i;
                                    } while ($i < $numOfPhoneLists);
                                @endphp
                            </div>

                            <div class="email-list-container col-12">
                                @error('contacts.email')
                                <p class="text-danger mb-1">{{ $message }}</p>
                                @enderror
                                @php
                                    $i = 0;
                                    $numOfEmailLists = old('contacts.email') === null ? 0 : count(old('contacts.email'));

                                    do {
                                @endphp
                                <div class="list-item-container mt-0 mb-2">
                                    <div class="form-label-group list-item mb-0">
                                        <input name="contacts[email][]" value="{{ old("contacts.email.$i") }}"
                                               id="email"
                                               class="form-control @error("contacts.email.$i") is-invalid @enderror"
                                               placeholder="{{ __('Email') }}" type="email">
                                        <i class="feather icon-plus-circle text-primary pl-1 add-list-item"
                                           onclick="addListItem(this)"></i>
                                        <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
                                           onclick="removeListItem(this)"></i>
                                        <label for="email">{{ __('Email') }}</label>
                                    </div>
                                    @error("contacts.email.$i")
                                    <p class="text-danger mb-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @php
                                    ++$i;
                                    } while ($i < $numOfEmailLists);
                                @endphp
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input name="contacts[address]" value="{{ old('contacts.address') }}"
                                           id="address"
                                           class="form-control @error('contacts.address') is-invalid @enderror"
                                           placeholder="{{ __('Address') }}" type="text">
                                    <label for="address">{{ __('Address') }}</label>
                                    @error('contacts.address')
                                    <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <fieldset class="form-label-group">
                                    <textarea name="contacts[google_map]"
                                              class="form-control @error('contacts.google_map') is-invalid @enderror"
                                              id="google-map" rows="5"
                                              placeholder="Google Map"
                                              spellcheck="false">{{ old('contacts.google_map') }}</textarea>
                                    <label for="google-map">Google Map</label>
                                    @error('contacts.google_map')
                                    <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if($errors->hasAny(['contacts.*', 'contacts.*.*']))
    @push('modal-show')
        <script>
            $('#add-company-contacts').modal('show');
        </script>
    @endpush
@endif
