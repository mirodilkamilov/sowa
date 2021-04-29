@props(['key' => 0])

<div class="row mr-0 ml-0 pt-1">
    <fieldset class="form-group col-md-8 col-8 image-input-container pl-0">
        <label for="basicInputFile" style="position: absolute; top: -1.3rem;">{{ __('Image') }}</label>
        <div class="custom-file">
            <input type="file"
                   class="custom-file-input image-input @if($errors->hasAny("content.$key.slide", "content.$key.slide.*")) is-invalid @endif"
                   name="content[{{ $key }}][slide][]" id="basicInputFile"
                   onchange="setPreview(this)" multiple>

            <label class="custom-file-label" for="basicInputFile"></label>
            @error("content.$key.slide")
            <p class="text-danger">{{ $message }}</p>
            @enderror
            @error("content.$key.slide.*")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    <div class="col-md-4 col-4 pr-0">
        <div class="form-label-group mb-0">
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
<fieldset class="form-group col-md-12 col-12 mb-0 p-0">
    <div class="slide-preview"></div>
</fieldset>
