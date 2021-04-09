<ul class="nav nav-tabs language-tabs" id="myTab2" role="tablist">
    @foreach($availableLangs as $lang)
        <li class="nav-item">
            <a class="nav-link text-uppercase @if($loop->first) active @endif"
               id="{{ $lang }}-tab-justified"
               data-toggle="tab"
               href="#{{ $lang }}-just" role="tab"
               aria-controls="{{ $lang }}-just"
               aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}
                @if(!empty($errors->all()))
                    @php $errorCounter = 0; @endphp
                    @php $errorCounter = $hasMultiValuedInput ? count($errors->get("content.text.*.*.$lang")) : count($errors->get("*.$lang")); @endphp
                    @if($errorCounter > 0)
                        <span class="badge badge badge-danger badge-pill float-right">{{ $errorCounter }}</span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach
</ul>
