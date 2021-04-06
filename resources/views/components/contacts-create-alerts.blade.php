@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
        <p class="mb-0"><i class="feather icon-check"></i>
            {{ __(session('success')) }}
        </p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="opacity: 1;">
        <p class="mb-0"><i class="feather icon-check"></i>
            {{ __(session('error')) }}
        </p>
    </div>
@endif
