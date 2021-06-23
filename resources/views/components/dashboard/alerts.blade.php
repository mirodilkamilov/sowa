@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0"><i class="feather icon-check"></i>
            {{ __(session('success')) }}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="mb-0"><i class="feather icon-alert-octagon"></i>
            {{ __(session('error')) }}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p><i class="feather icon-info"></i>
            {{ __(session('info')) }}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
