@props(['availableLangs', 'positions', 'categories', 'slide' => null])

<section id="basic-divider">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ __('Common form fields') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-6 col-12">
                                <fieldset class="form-group">
                                    <label for="project-category"
                                           style="position: absolute; top: -20px;">
                                        {{ __('Project category') }}
                                    </label>

                                    <select id="project-category"
                                            class="custom-select project-category @error('category_id') is-invalid @enderror"
                                            name="category_id" form="slide-form">
                                        <option disabled selected value>
                                            -- {{ __('Select a category') }} --
                                        </option>
                                        <option value="all"
                                                @if($slide?->category_id === 'all' || old('category_id') === 'all') selected @endif>
                                            {{ __('All') }}
                                        </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if($slide?->category_id == $category->id || old('category_id') == $category->id) selected @endif>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach

                                        <option value="add-category">
                                            -- {{ __('Add new category') }} --
                                        </option>
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>

                            <x-dashboard.categories.add-modal :availableLangs="$availableLangs"/>

                            <div class="col-md-6 col-12">
                                <div class="form-label-group mb-0">
                                    <input type="number" id="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           name="position"
                                           placeholder="{{ __('Position') }}" form="slide-form"
                                           value="{{ old('position') ?? $slide?->position }}">
                                    <label for="position">{{ __('Position') }}</label>
                                    @error('position')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                    <x-dashboard.available-positions :positions="$positions"/>
                                </div>
                            </div>

                            <fieldset class="form-group col-md-12 col-12">
                                <label for="image">{{ __('Image') }}</label>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('image') is-invalid @enderror"
                                           name="image"
                                           id="image" form="slide-form" onchange="readURL(this)">
                                    <label class="custom-file-label"
                                           for="image"></label>
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </fieldset>

                            <fieldset class="form-group col-md-12 col-12"
                                      style="display: flex; justify-content: center; align-items: center;">
                                <img class="preview" src="#" alt="preview"/>
                                @if(isset($slide?->image))
                                    <img src="{{ $slide->image }}" class="placeholder" alt="placeholder"
                                         style="width: 300px;">
                                @endif
                            </fieldset>

                            <div class="col-12 mt-1">
                                <button type="submit" class="btn btn-primary mr-1 mb-1"
                                        form="slide-form">
                                    {{ __('Edit') }} {{ __('slide') }}
                                </button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1"
                                        form="slide-form">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
