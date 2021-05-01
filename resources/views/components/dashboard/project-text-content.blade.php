<div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0 text-content">
    @foreach($availableLangs as $lang)
        <div class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
             id="{{ $lang }}-just" role="tabpanel"
             aria-labelledby="{{ $lang }}-tab-justified">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <textarea
                            id="title-{{$lang}}"
                            class="form-control @error("content.$key.title.$lang") is-invalid @enderror"
                            placeholder="{{ __('Title') . ' ('. $lang . ')' }}" rows="4"
                            name="content[{{ $key }}][title][{{ $lang }}]">{{ old("content.$key.title.$lang") }}</textarea>
                        <label for="title-{{$lang}}">{{ __('Title') . ' ('. $lang . ')' }}</label>
                        @error("content.$key.title.$lang")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <textarea
                            id="description-{{$lang}}"
                            class="form-control @error("content.$key.description.$lang") is-invalid @enderror"
                            placeholder="{{ __('Description') . ' ('. $lang . ')' }}" rows="4"
                            name="content[{{ $key }}][description][{{ $lang }}]">{{ old("content.$key.description.$lang") }}</textarea>
                        <label for="description-{{$lang}}">{{ __('Description') . ' ('. $lang . ')' }}</label>
                        @error("content.$key.description.$lang")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="wrapper pt-1"
         style="display: flex; justify-content: center;">
        <div class="form-label-group mb-1">
            <input type="number" id="position"
                   class="form-control @error("content.$key.position") is-invalid @enderror"
                   name="content[{{ $key }}][position]"
                   placeholder="{{ __('Position') }}"
                   value="{{ old("content.$key.position") }}">
            <label for="position">{{ __('Position') }}</label>
            @error("content.$key.position")
            <p class="text-danger mb-0">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

{{--<!-- Create the editor container -->--}}
{{--<div id="editor" class="editor">--}}
{{--    <p>Hello World!</p>--}}
{{--    <p>Some initial <strong>bold</strong> text</p>--}}
{{--    <p><br></p>--}}
{{--</div>--}}
