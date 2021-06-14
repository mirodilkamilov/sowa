@props(['availableLangs', 'about' => null])

<div class="divider">
    <div class="divider-text">
        <h4 class="title text-primary">{{ __('Company') }}</h4>
    </div>
</div>
@php $inputs = [
      'main.*.about_title',
      'main.*.about_description',
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
                            <input
                                name="main[1][about_title][{{ $lang }}]"
                                type="text" id="about-title"
                                class="form-control @error("main.*.about_title.$lang") is-invalid @enderror"
                                placeholder="{{ __('Company title') }} ({{ $lang }})"
                                value="{{ old("main.1.about_title.$lang") ?? $about?->about_title[$lang] }}">
                            <label
                                for="about-title">{{ __('Company title') }}
                                ({{ $lang }})</label>
                            @error("main.*.about_title.$lang")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <fieldset class="form-label-group">
                            <textarea
                                class="form-control @error("main.*.about_description.$lang") is-invalid @enderror"
                                rows="5"
                                placeholder="{{ __('Company description') . ' ('. $lang . ')' }}"
                                id="about-description"
                                spellcheck="false"
                                name="main[1][about_description][{{ $lang }}]">{{ old("main.1.about_description.$lang") ?? $about?->about_description[$lang] }}</textarea>
                            <label
                                for="about-description">{{ __('Company description') . ' ('. $lang . ')' }}</label>
                            @error("main.*.about_description.$lang")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </fieldset>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
