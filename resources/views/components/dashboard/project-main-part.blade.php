@props(['categories', 'availableLangs' => $availableLangs, 'project' => null])

@error('main')
<div class="alert alert-danger alert-dismissible mb-1" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@enderror

<div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0">
    @foreach($availableLangs as $lang)
        <div
            class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
            id="{{ $lang }}-just" role="tabpanel"
            aria-labelledby="{{ $lang }}-tab-justified">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <input type="text" id="main_title-{{$loop->iteration}}"
                               class="form-control @error("main.*.main_title.$lang") is-invalid @enderror"
                               placeholder="{{ __('Main title') . ' ('. $lang . ')' }}"
                               name="main[1][main_title][{{ $lang }}]"
                               value="{{ old("main.1.main_title.$lang") ?? $project?->main_title[$lang] }}">
                        <label
                            for="main_title-{{$loop->iteration}}">{{ __('Main title') . ' ('. $lang . ')' }}</label>
                        @error("main.*.main_title.$lang")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <input type="text" id="slug-{{$loop->iteration}}"
                               class="form-control @error("main.*.slug.$lang") is-invalid @enderror"
                               placeholder="{{ __('Slug') . ' ('. $lang . ')' }}"
                               name="main[1][slug][{{ $lang }}]"
                               value="{{ old("main.1.slug.$lang") ?? $project?->slug[$lang] }}">
                        <label
                            for="slug-{{$loop->iteration}}">{{ __('Slug') . ' ('. $lang . ')' }}</label>
                        @error("main.*.slug.$lang")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="divider">
    <div class="divider-text">
        <h4 class="title text-primary">{{ __('Common form fields') }}</h4>
    </div>
</div>

<div class="row pt-1">
    <div class="col-md-4 col-6">
        <div class="form-label-group mb-0">
            <input type="text" id="client"
                   class="form-control @error('main.*.client') is-invalid @enderror"
                   name="main[1][client]"
                   placeholder="{{ __('Client') }}"
                   form="project-create-form"
                   value="{{ old('main.1.client') ?? $project?->client }}">
            <label
                for="client">{{ __('Client') }}</label>
            @error('main.*.client')
            <p class="text-danger mb-0">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-4 col-6">
        <div class="form-label-group mb-0">
            <input type="number" id="year"
                   class="form-control @error('main.*.year') is-invalid @enderror"
                   name="main[1][year]"
                   placeholder="{{ __('Year') }}"
                   form="project-create-form"
                   value="{{ old('main.1.year') ?? $project?->year }}">
            <label
                for="year">{{ __('Year') }}</label>
            @error('main.*.year')
            <p class="text-danger mb-0">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-4 col-6">
        <div class="form-label-group">
            <input type="text" id="url"
                   class="form-control @error('main.*.url') is-invalid @enderror"
                   placeholder="{{ __('Url') }}"
                   name="main[1][url]"
                   form="project-create-form"
                   value="{{ old('main.1.url') ?? $project?->url }}">
            <label
                for="url">{{ __('Url') }}</label>
            @error('main.*.url')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>


    <div class="row col-12 col-md-12 mr-0 ml-0 p-0">
        <fieldset class="form-group col-md-6 col-6">
            <label for="project-category">
                {{ __('Project category') }}
            </label>
            <select id="project-category"
                    class="custom-select project-category @error('main.*.category') is-invalid @enderror"
                    name="main[1][category]"
                    form="project-create-form">
                <option disabled selected value>
                    -- {{ __('Select a category') }} --
                </option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @php
                            $isOldValue = old('main.1.category') == $category->id;
                            $isSavedValue = false;
                        @endphp
                        @if(isset($project))
                        @foreach($project->categories as $projectCategory)
                        @php $isSavedValue = $projectCategory->id === $category->id; @endphp
                        @endforeach
                        @endif
                        @if($isOldValue || $isSavedValue) selected @endif>
                        {{ $category->category }}
                    </option>
                @endforeach

                <option value="add-category">
                    -- {{ __('Add new category') }} --
                </option>
            </select>
            @error('main.*.category')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="form-group col-md-6 col-6">
            <label for="basicInputFile">{{ __('Image') }}</label>
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input image-input @error('main.*.main_image') is-invalid @enderror"
                       name="main[1][main_image]"
                       id="basicInputFile"
                       form="project-create-form"
                       onchange="setPreview(this)">
                <label class="custom-file-label"
                       for="basicInputFile"></label>
                @error('main.*.main_image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </fieldset>
    </div>
    <fieldset class="form-group col-md-6 col-6"></fieldset>
    <fieldset
        class="form-group col-md-6 col-6"
        style="display: flex; justify-content: center; align-items: center;">
        <img src="#" class="preview" alt="preview"/>
        @if(isset($project->main_image))
            <img src="{{ $project->main_image }}" class="placeholder"
                 alt="placeholder"
                 style="width: 300px;">
        @endif
    </fieldset>
</div>
