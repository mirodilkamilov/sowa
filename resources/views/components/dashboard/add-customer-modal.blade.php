@props(['positions' => null, 'modalId' => 'customer-add'])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog"
     aria-labelledby="category-addTitle" aria-hidden="true">
    <div class="add-customer-modal modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="category-addTitle">{{ __('Add a customer') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('customers.store') }}"
                      method="post" id="category-create" enctype="multipart/form-data">
                    @csrf
                    @error('customer')
                    <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-6 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <input type="text"
                                   class="form-control name-input @error('customer.name') is-invalid @enderror"
                                   id="customer-name"
                                   name="customer[name]"
                                   placeholder="{{ __('Customer name') }}"
                                   value="{{ old('customer.name') }}">
                            <label for="customer-name" style="padding-left: 0.6rem; top: 0;">
                                {{ __('Customer name') }}
                            </label>
                            @error('customer.name')
                            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <input type="text"
                                   class="form-control category-edit-input @error('customer.position') is-invalid @enderror"
                                   id="position"
                                   name="customer[position]"
                                   placeholder="{{ __('Position') }}"
                                   value="{{ old('customer.position') }}">
                            <label for="position" style="padding-left: 0.6rem; top: 0;">
                                {{ __('Position') }}
                            </label>
                            @error('customer.position')
                            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                            @enderror
                            <x-dashboard.available-positions :positions="$positions"/>
                        </div>

                        <div class="col-12 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <label for="basicInputFile">Изображение</label>
                            <div class="custom-file">
                                <input type="file"
                                       class="custom-file-input @error('customer.logo') is-invalid @enderror"
                                       name="customer[logo]" id="basicInputFile"
                                       onchange="readURL(this, $('.preview'))">
                                <label class="custom-file-label" for="basicInputFile"></label>
                                @error('customer.logo')
                                <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 data-field-col p-1 mb-0 form-label-group"
                             style="display: flex; justify-content: center;">
                            <img src="#" class="preview" alt="preview" style="display: none;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="add-data-btn">
                    <button class="btn btn-outline-success mr-1"
                            type="submit" form="category-create">
                        {{ __('Add customer') }}
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

@if($errors->hasAny(['customer', 'customer.*']))
    @push('customer-add-modal-show')
        <script>
            $('#customer-add').modal('show');
        </script>
    @endpush
@endif
