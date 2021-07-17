@props(['availableLangs', 'about' => null])

<div class="row">
    <div class="tab-content pt-1 col-md-12 col-12">
        @foreach($availableLangs as $lang)
            <div
                class="tab-pane-{{ $lang }} tab-pane @if($loop->first) active @endif"
                id="{{ $lang }}-just" role="tabpanel"
                aria-labelledby="{{ $lang }}-tab-justified">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-label-group">
                            <input type="text" id="image-title-{{ $lang }}"
                                   class="form-control @error("main.*.image_title.$lang") is-invalid @enderror"
                                   placeholder="{{ __('Image title') }} ({{ $lang }})"
                                   name="main[1][image_title][{{ $lang }}]"
                                   value="{{ old("main.1.image_title.$lang") ?? $about?->image_title[$lang] }}">
                            <label for="image-title-{{ $lang }}">{{ __('Image title') }} ({{ $lang }})</label>
                            @error("main.*.image_title.$lang")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <fieldset class="form-group col-md-12 col-12">
                <label
                    for="image">{{ __('Image') }}</label>
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input @error('main.*.image') is-invalid @enderror"
                           name="main[1][image]"
                           id="image" onchange="readURL(this)">
                    <label class="custom-file-label"
                           for="image"></label>
                    @error('main.*.image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </fieldset>
            <fieldset
                class="form-group col-md-12 col-12"
                style="display: flex; justify-content: center; align-items: center;">
                <img src="#" class="preview" alt="preview"/>
                @if(isset($about?->image))
                    <img src="{{ $about->image }}"
                         class="placeholder"
                         alt="placeholder"
                         style="width: 300px;">
                @endif
            </fieldset>
        </div>
    </div>
</div>
