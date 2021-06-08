@props(['key' => 0, 'content' => null])

<div class="row mr-0 ml-0 pt-1">
    <fieldset class="form-group col-md-8 col-8 image-input-container pl-0">
        <label for="input-file-{{$key}}" style="position: absolute; top: -1.3rem;">{{ __('Image') }}</label>
        <div class="custom-file">
            <input form="project-create-form" type="file"
                   class="custom-file-input image-input @if($errors->hasAny("content.$key.slide", "content.$key.slide.*")) is-invalid @endif"
                   name="content[{{ $key }}][slide][]" id="input-file-{{$key}}"
                   onchange="setPreview(this)" multiple>

            <label class="custom-file-label" for="input-file-{{$key}}"></label>
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
<fieldset class="form-group col-md-12 col-12 mb-0 p-0">
    <div class="slide-preview">
        @if(isset($content))
            @foreach($content->image as $img)
                <img src="{{ $img }}" alt="slide image {{ $loop->count }}">
            @endforeach
        @endif
    </div>
</fieldset>
