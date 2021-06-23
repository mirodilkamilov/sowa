@props(['key' => 0, 'content' => null])

<div class="row mr-0 ml-0 pt-1">
    <fieldset class="form-group col-md-6 col-6 image-input-container pl-0">
        <label for="input-file-{{$key}}" style="position: absolute; top: -1.3rem;">{{ __('Image') }}</label>
        <div class="custom-file">
            <input form="project-create-form" type="file"
                   class="custom-file-input image-input @error("content.$key.image") is-invalid @enderror"
                   name="content[{{ $key }}][image]" id="input-file-{{$key}}"
                   onchange="setPreview(this)">
            <label class="custom-file-label" for="input-file-{{$key}}"></label>
            @error("content.$key.image")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    <div class="col-md-6 col-6 pr-0">
        <div class="form-label-group mb-0">
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
<fieldset class="form-group col-md-6 col-6 mb-0 pl-0" style="display: flex; justify-content: center;">
    <img class="preview" src="#" alt="preview"/>
    @if(isset($content))
        <img class="placeholder" src="{{ $content->getImagePath() }}" alt="placeholder"
             style="width: {{ $content->type === 'image-small' ? '300px' : '100%' }};"/>
    @endif
</fieldset>
