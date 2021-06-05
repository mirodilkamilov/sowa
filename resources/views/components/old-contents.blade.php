@error("content")
<div class="alert alert-danger alert-dismissible mb-1" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@enderror

@error("content.*.type")
<div class="alert alert-danger alert-dismissible mb-1" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@enderror


@if(isset($oldValues))
    @foreach($oldValues as $key => $oldValue)
        @if(!isset($oldValue['type']))
            @break
        @endif
        <div class="card mb-1 content-body" id="{{ $key }}">
            <div class="card-header">
                @php $optionValues = ['text' => 'Text', 'image-small' => 'Small Image', 'image-big' => 'Wide Image', 'slide' => 'Slide']; @endphp
                <label for="content-type">{{ __('Content type') }}</label>
                <select id="content-type"
                        class="custom-select @error("content.$key.type") is-invalid @enderror"
                        name="content[{{ $key }}][type]"
                        onchange="changeContentType(this)">
                    @foreach($optionValues as $value => $text)
                        <option
                            value="{{ $value }}" {{ $oldValue['type'] ===  $value ? 'selected' : '' }}>{{ __($text) }}</option>
                    @endforeach
                </select>
                @error("content.$key.type")
                <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="card-content pb-1">
                <div class="card-body pb-0">

                    @switch($oldValue['type'])
                        @case('text')
                        <x-dashboard.language-tabs :availableLangs="$availableLangs" :key="$key"
                                                   :hasMultiValuedInput="true"/>
                        <x-dashboard.project-text-content :availableLangs="$availableLangs" :key="$key"/>
                        @break

                        @case('image-small')
                        @case('image-big')
                        <x-dashboard.project-image-content :key="$key"/>
                        @break

                        @case('slide')
                        <x-dashboard.project-slide-content :key="$key"/>
                        @break
                    @endswitch

                </div>
            </div>

            <div class="card-footer">
                <i class="feather icon-trash-2 text-danger pr-1 remove-content" onclick="removeContent(this)"></i>
            </div>
        </div>
    @endforeach
@endif
