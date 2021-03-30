@props(['availableLangs'])

<ul class="nav nav-tabs" id="myTab2" role="tablist">
    @foreach($availableLangs as $lang)
        <li class="nav-item" style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 1rem 1rem 0 0; width: 100px; text-align: center;">
            <a class="nav-link text-uppercase @if($loop->first) active @endif"
               id="{{ $lang }}-tab-justified"
               data-toggle="tab"
               href="#{{ $lang }}-just" role="tab"
               aria-controls="{{ $lang }}-just"
               aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}
                @if(!empty($errors->all()))
                    @php $errorCounter = 0; @endphp
                    @php $errorCounter = count($errors->get("*.{$lang}")); @endphp
                    @if($errorCounter > 0)
                        <span
                            class="badge badge badge-danger badge-pill float-right">{{ $errorCounter }}</span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach
</ul>
