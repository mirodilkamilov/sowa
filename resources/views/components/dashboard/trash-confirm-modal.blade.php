@props(['id' => 'confirm-modal'])

<div class="modal fade confirm-modal" id="{{ $id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">{{ __('Are you sure you want to empty trash?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-left mb-0">{{ __('From now on, it is impossible to restore data') }}</p>
            </div>

            <div class="modal-footer">
                <form action="{{ route('trash.store') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="trash[type]" value="emptyTrash">
                    <button class="btn btn-danger mr-1 waves-effect waves-light"
                            type="submit">
                        {{ __('Yes, empty trash!') }}
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"
                            aria-label="Close">
                        {{ __('Cancel') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
