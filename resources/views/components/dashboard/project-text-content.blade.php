@for($i = 0; $i < $maxNumOfNotEmptyInputs; ++$i)
    <div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0 text-content">
        @foreach($availableLangs as $lang)
            <div class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
                 id="{{ $lang }}-just" role="tabpanel"
                 aria-labelledby="{{ $lang }}-tab-justified">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-label-group">
                        <textarea
                            id="title"
                            class="form-control @error("content.0.title.{$lang}.{$i}") is-invalid @enderror"
                            placeholder="{{ __('Title') . ' ('. $lang . ')' }}"
                            rows="4"
                            name="content[0][title][{{ $lang }}][]">{{ old("content.0.title.{$lang}.{$i}") }}</textarea>

                            <label
                                for="title">{{ __('Title') . ' ('. $lang . ')' }}</label>
                            @error("content.0.title.{$lang}.{$i}")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-label-group">
                        <textarea
                            id="description"
                            class="form-control @error("content.0.description.{$lang}.{$i}") is-invalid @enderror"
                            placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                            rows="4"
                            name="content[0][description][{{ $lang }}][]">{{ old("content.0.description.{$lang}.{$i}") }}</textarea>
                            <label
                                for="description">{{ __('Description') . ' ('. $lang . ')' }}</label>
                            @error("content.0.description.{$lang}.{$i}")
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
                       class="form-control @error("content.0.position.{$i}") is-invalid @enderror"
                       name="content[0][position][]"
                       placeholder="{{ __('Position') }}"
                       value="{{ old("content.0.position.{$i}") }}">
                <label
                    for="position">{{ __('Position') }}</label>
                @error("content.0.position.{$i}")
                <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
{{--            <i class="feather icon-trash-2 text-danger remove-text-content"></i>--}}
        </div>
        <hr class="divider">
    </div>
@endfor
