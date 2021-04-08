@for($i = 0; $i < $maxNumOfNotEmptyInputs; ++$i)
    <div class="image-copy-content">
        <div class="row mr-0 ml-0">
            <div class="col-md-6 col-6">
                <div class="form-label-group mb-0">
                    <label for="image-type"
                           style="transform: translate(-5px, -25px); opacity: 1;">{{ __('Image type') }}</label>
                    <select id="image-type"
                            class="custom-select @error("content.1.image-type.{$i}") is-invalid @enderror"
                            name="content[image][{{$i}}][image-type]">
                        @php $isSelected  = old("content.1.image-type.{$i}") == 'image-big'; @endphp
                        <option
                            value="image-small">
                            {{ __('Small Image') }}
                        </option>
                        <option
                            value="image-big" @if($isSelected) selected @endif>
                            {{ __('Wide Image') }}
                        </option>
                    </select>
                    @error("content.1.image-type.{$i}")
                    <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="form-label-group mb-0">
                    <input type="number" id="position"
                           class="form-control @error("content.1.position.{$i}") is-invalid @enderror"
                           name="content[image][{{$i}}][position]"
                           placeholder="{{ __('Position') }}"
                           value="{{ old("content.1.position.{$i}") }}">
                    <label for="position">{{ __('Position') }}</label>
                    @error("content.1.position.{$i}")
                    <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <fieldset class="form-group col-md-12 col-12 mt-1 image-input-container">
            <label for="basicInputFile">{{ __('Image') }}</label>
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input image-input @error("content.1.image.{$i}") is-invalid @enderror"
                       name="content[image][{{$i}}][image]"
                       id="basicInputFile">
                <label class="custom-file-label"
                       for="basicInputFile"></label>
                @error("content.1.image.{$i}")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
{{--        <i class="feather icon-trash-2 text-danger remove-image-content"></i>--}}
        </fieldset>
        <fieldset class="form-group col-md-12 col-12"
                  style="display: flex; justify-content: center;">
            <img class="preview" id="preview" src="#" alt="preview"/>
        </fieldset>
    </div>
@endfor
