<div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0 text-content">
    @foreach($availableLangs as $lang)
        <div class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}" role="tabpanel"
             aria-labelledby="{{ $lang }}-tab-justified">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <textarea
                            form="project-create-form" id="title-{{$lang}}-{{$key}}"
                            class="form-control @error("content.$key.title.$lang") is-invalid @enderror"
                            placeholder="{{ __('Title') . ' ('. $lang . ')' }}" rows="4"
                            name="content[{{ $key }}][title][{{ $lang }}]">{{ old("content.$key.title.$lang") ?? $content?->title[$lang] }}</textarea>
                        <label for="title-{{$lang}}-{{$key}}">{{ __('Title') . ' ('. $lang . ')' }}</label>
                        @error("content.$key.title.$lang")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <textarea
                            form="project-create-form" id="description-{{$lang}}-{{$key}}"
                            class="form-control @error("content.$key.description.$lang") is-invalid @enderror"
                            placeholder="{{ __('Description') . ' ('. $lang . ')' }}" rows="4"
                            name="content[{{ $key }}][description][{{ $lang }}]">{{ old("content.$key.description.$lang") ?? $content?->description[$lang] }}</textarea>
                        <label for="description-{{$lang}}-{{$key}}">{{ __('Description') . ' ('. $lang . ')' }}</label>
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
            <input form="project-create-form" type="number" id="position-{{$key}}"
                   class="form-control @error("content.$key.position") is-invalid @enderror"
                   name="content[{{ $key }}][position]"
                   placeholder="{{ __('Position') }}"
                   value="{{ old("content.$key.position") ?? $content?->position }}">
            <label for="position-{{$key}}">{{ __('Position') }}</label>
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
