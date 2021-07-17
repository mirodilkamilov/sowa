@props(['availableLangs', 'slide' => null])

<div class="form-body">
    <div class="row">
        <div class="tab-content pt-1 col-md-12 col-12">
            @foreach($availableLangs as $lang)
                <div class="tab-pane @if($loop->first) active @endif"
                     id="{{ $lang }}-just" role="tabpanel"
                     aria-labelledby="{{ $lang }}-tab-justified">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="title-{{ $lang }}"
                                       class="form-control @error("title.$lang") is-invalid @enderror"
                                       placeholder="{{ __('Title') . ' ('. $lang . ')' }}"
                                       name="title[{{ $lang }}]"
                                       value="{{ old("title.$lang") ?? $slide?->title[$lang] }}">
                                <label
                                    for="title-{{ $lang }}">{{ __('Title') . ' ('. $lang . ')' }}</label>
                                @error("title.{$lang}")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="sub-title-{{ $lang }}"
                                       class="form-control @error("sub_title.$lang") is-invalid @enderror"
                                       placeholder="{{ __('Sub-title') . ' ('. $lang . ')' }}"
                                       name="sub_title[{{ $lang }}]"
                                       value="{{ old("sub_title.$lang") ?? $slide?->sub_title[$lang] }}">
                                <label
                                    for="sub-title-{{ $lang }}">{{ __('Sub-title') . ' ('. $lang . ')' }}</label>
                                @error("sub_title.$lang")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <fieldset class="form-label-group">
                                <textarea
                                    id="description-{{ $lang }}"
                                    class="form-control @error("description.$lang") is-invalid @enderror"
                                    placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                                    spellcheck="false"
                                    name="description[{{ $lang }}]">{!! old("description.$lang") ?? $slide?->description[$lang] !!}</textarea>
                                <label
                                    for="description-{{ $lang }}">{{ __('Description') . ' ('. $lang . ')' }}</label>
                                @error("description.$lang")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
