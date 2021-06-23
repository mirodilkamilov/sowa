@props(['availableLangs', 'about' => null])

<div class="divider">
    <div class="divider-text">
        <h4 class="title text-primary">{{ __('What we do?') }}</h4>
    </div>
</div>
@php $inputs = [
      'main.*.help_title',
      'main.*.help_description',
   ];
@endphp
<x-dashboard.language-tabs :availableLangs="$availableLangs"
                           :inputs="$inputs"/>
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
                            <input type="text" id="help-title"
                                   class="form-control @error("main.*.help_title.$lang") is-invalid @enderror"
                                   placeholder="{{ __('Title') }} ({{ $lang }})"
                                   name="main[1][help_title][{{ $lang }}]"
                                   value="{{ old("main.1.help_title.$lang") ?? $about?->help_title[$lang] }}">
                            <label for="help-title">{{ __('Title') }}
                                ({{ $lang }})</label>
                            @error("main.*.help_title.$lang")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <fieldset class="form-label-group">
                            <textarea
                                class="form-control @error("main.*.help_description.$lang") is-invalid @enderror"
                                rows="5"
                                placeholder="{{ __('Description') . ' ('. $lang . ')' }}"
                                id="help-description"
                                spellcheck="false"
                                name="main[1][help_description][{{ $lang }}]">{{ old("main.1.help_description.$lang") ?? $about?->help_description[$lang] }}</textarea>
                            <label
                                for="help-description">{{ __('Description') . ' ('. $lang . ')' }}</label>
                            @error("main.*.help_description.$lang")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </fieldset>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
