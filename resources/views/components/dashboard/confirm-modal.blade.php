@props(['id' => 'confirm-modal'])

<div class="modal fade confirm-modal" id="{{ $id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">{{ __('Are you sure you want to delete?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                <form action="" method="post" id="delete-form" class="form">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mr-1 waves-effect waves-light"
                            type="submit">
                        {{ __('Yes, delete it!') }}
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
