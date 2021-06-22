@props(['positions' => null, 'modalId' => 'customer-update'])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog"
     aria-labelledby="category-addTitle" aria-hidden="true">
    <div class="update-customer-modal modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="category-addTitle">{{ __('Edit') }} {{ __('customer') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php $customerId = old('customer-edit.id') @endphp
                <form class="form" action="{{ isset($customerId) ? route('customers.update', $customerId) : '' }}"
                      method="post" id="customer-update-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @error('customer')
                    <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-6 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <input id="customer-id" name="customer-edit[id]" value="{{ old('customer-edit.id') }}"
                                   type="hidden">

                            <input type="text"
                                   class="form-control name-input @error('customer-edit.name') is-invalid @enderror"
                                   id="customer-name"
                                   name="customer-edit[name]"
                                   placeholder="{{ __('Customer name') }}"
                                   value="{{ old('customer-edit.name') }}">
                            <label for="customer-name" style="padding-left: 0.6rem; top: 0;">
                                {{ __('Customer name') }}
                            </label>
                            @error('customer-edit.name')
                            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <input type="text"
                                   class="form-control category-edit-input @error('customer-edit.position') is-invalid @enderror"
                                   id="customer-position"
                                   name="customer-edit[position]"
                                   placeholder="{{ __('Position') }}"
                                   value="{{ old('customer-edit.position') }}">
                            <label for="customer-position" style="padding-left: 0.6rem; top: 0;">
                                {{ __('Position') }}
                            </label>
                            @error('customer-edit.position')
                            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                            @enderror
                            <x-dashboard.available-positions :positions="$positions"/>
                        </div>

                        <div class="col-12 data-field-col pt-2 p-1 mb-0 form-label-group">
                            <label for="basicInputFile">Изображение</label>
                            <div class="custom-file">
                                <input type="file"
                                       class="custom-file-input @error('customer-edit.logo') is-invalid @enderror"
                                       name="customer-edit[logo]" id="basicInputFile"
                                       onchange="readURL(this, $('.preview'))">
                                <label class="custom-file-label" for="basicInputFile"></label>
                                @error('customer-edit.logo')
                                <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div id="customer-logo" class="col-12 data-field-col p-1 mb-0 form-label-group"
                             style="display: flex; justify-content: center;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="add-data-btn">
                    <button class="btn btn-outline-success mr-1"
                            type="submit" form="customer-update-form">
                        {{ __('Update customer') }}
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

@if($errors->hasAny(['customer-edit', 'customer-edit.*']))
    @push('modal-show')
        <script>
            $('#customer-update').modal('show');
        </script>
    @endpush
@endif
