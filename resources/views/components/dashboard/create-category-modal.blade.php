@props(['availableLangs', 'modalId' => 'category-add'])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog"
     aria-labelledby="category-addTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
         role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title"
                    id="category-addTitle">{{ __('Create a category') }}</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('categories.store') }}"
                      method="post" id="category-create">
                    @csrf
                    @foreach($availableLangs as $lang)
                        <div
                            class="col-sm-12 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <input type="text"
                                   class="form-control category-edit-input"
                                   id="category_{{$lang}}"
                                   name="category[{{ $lang }}]"
                                   placeholder="{{ __('Category') . " ($lang)" }}"
                                   value="{{ old("category.$lang") }}">
                            <label
                                for="category_{{$lang}}"
                                style="padding-left: 0.6rem; top: 0;">
                                {{ __('Category') . " ($lang)" }}
                            </label>
                            @error("category.$lang")
                            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <div class="add-data-btn">
                    <button class="btn btn-outline-success mr-1"
                            type="submit" form="category-create">
                        {{ __('Add category') }}
                    </button>
                </div>
                <div class="cancel-data-btn">
                    <button class="btn btn-outline-primary"
                            data-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->hasAny('category.*'))
    @push('category-modal-show')
        <script>
            $('#category-add').modal('show');
        </script>
    @endpush
@endif
