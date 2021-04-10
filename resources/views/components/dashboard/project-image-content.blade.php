<div class="row mr-0 ml-0 pt-1">
    <fieldset class="form-group col-md-6 col-6 image-input-container pl-0">
        <label for="basicInputFile" style="position: absolute; top: -1.3rem;">{{ __('Image') }}</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input image-input @error("content.1.image.") is-invalid @enderror"
                   name="content[image][image]" id="basicInputFile">
            <label class="custom-file-label" for="basicInputFile"></label>
            @error("content.1.image")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    <div class="col-md-6 col-6 pr-0">
        <div class="form-label-group mb-0">
            <input type="number" id="position"
                   class="form-control @error("content.1.position.") is-invalid @enderror"
                   name="content[image][position]"
                   placeholder="{{ __('Position') }}"
                   value="{{ old("content.1.position.") }}">
            <label for="position">{{ __('Position') }}</label>
            @error("content.1.position.")
            <p class="text-danger mb-0">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
<fieldset class="form-group col-md-6 col-6 mb-0" style="display: flex; justify-content: center;">
    <img class="preview" id="preview" src="#" alt="preview"/>
</fieldset>
