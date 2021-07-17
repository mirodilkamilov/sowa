@props(['availableLangs', 'aboutLists' => null])

<div class="divider">
    <div class="divider-text">
        <h4 class="title text-primary">{{ __('Lists') }}</h4>
    </div>
</div>

@error('list')
<div class="alert alert-danger alert-dismissible mb-1" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@enderror

@php $inputs = [
      'list.*.title',
      'list.*.list',
   ];
@endphp
<x-dashboard.language-tabs :availableLangs="$availableLangs"
                           :inputs="$inputs" :hasAfterLang="true"/>

<div class="row">
    <div class="tab-content pt-1 col-md-12 col-12">

        @foreach($availableLangs as $lang)
            <div class="tab-pane-{{ $lang }} tab-pane @if($loop->first) active @endif"
                 id="{{ $lang }}-just" role="tabpanel"
                 aria-labelledby="{{ $lang }}-tab-justified">
                <div class="row">

                    @if(isset($aboutLists))
                        @php $i = 1; @endphp
                        @foreach($aboutLists as $listItems)
                            <div class="list-container-{{ $i }}-{{ $lang }} col-md-6 col-6">
                                <div class="form-label-group">
                                    @error("list.$i.list")
                                    <div class="alert alert-danger alert-dismissible mb-1" role="alert">
                                        <p>{{ $message }}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="feather icon-x-circle"></i>
                                        </span>
                                        </button>
                                    </div>
                                    @enderror

                                    @if(Route::currentRouteName() === 'about.index')
                                        <input type="hidden" name="list[{{ $i }}][id]" value="{{ $listItems->id }}">
                                    @endif

                                    <input type="text"
                                           id="list-title-{{ $i }}-{{ $lang }}"
                                           class="form-control @error("list.$i.title.$lang") is-invalid @enderror"
                                           placeholder="{{ __('Title') }} ({{ $lang }})"
                                           name="list[{{ $i }}][title][{{ $lang }}]"
                                           @if ($i === 1)
                                           @php $value = $listItems->title[$lang] ?? (($lang === 'ru') ? 'Стратегия' : '');  @endphp
                                           @endif

                                           @if ($i === 2)
                                           @php $value = $listItems->title[$lang] ?? (($lang === 'ru') ? 'Креатив и Дизайн' : '');  @endphp
                                           @endif
                                           value="{{ old("list.$i.title.$lang") ?? $value }}">
                                    <label for="list-title-{{ $i }}-{{ $lang }}">{{ __('Title') }} ({{ $lang }})</label>
                                    @error("list.$i.title.$lang")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    @php $valueFromDb = $listItems->list[$lang] ?? null; @endphp
                                    @php $listsByLang = old("list.$i.list.$lang") ?? $valueFromDb; @endphp
                                    @if(isset($listsByLang))
                                        @foreach($listsByLang as $listItem)
                                            <div class="list-item-container">
                                                <div class="list-item">
                                                    <input
                                                        name="list[{{ $i }}][list][{{ $lang }}][{{ $loop->index }}]"
                                                        value="{{ $listItem }}"
                                                        class="form-control @error("list.$i.list.$lang.$loop->index") is-invalid @enderror"
                                                        type="text">
                                                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
                                                       onclick="removeListItem(this)"></i>
                                                </div>

                                                @error("list.$i.list.$lang.$loop->index")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif

                                    @error("list.$i.list.$lang")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @php ++$i; @endphp
                        @endforeach

                    @else
                        @for($i=1; $i<=2; $i++)
                            <div class="list-container-{{ $i }}-{{ $lang }} col-md-6 col-6">
                                <div class="form-label-group">
                                    @error("list.$i.list")
                                    <div class="alert alert-danger alert-dismissible mb-1" role="alert">
                                        <p>{{ $message }}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                        </button>
                                    </div>
                                    @enderror

                                    @if(Route::currentRouteName() === 'about.index')
                                        <input type="hidden" name="list[{{ $i }}][id]" value="{{ $listItems->id }}">
                                    @endif

                                    <input type="text"
                                           id="list-title-{{ $i }}-{{ $lang }}"
                                           class="form-control @error("list.$i.title.$lang") is-invalid @enderror"
                                           placeholder="{{ __('Title') }} ({{ $lang }})"
                                           name="list[{{ $i }}][title][{{ $lang }}]"
                                           @if ($i === 1)
                                           @php $value = ($lang === 'ru') ? 'Стратегия' : '';  @endphp
                                           @endif

                                           @if ($i === 2)
                                           @php $value = ($lang === 'ru') ? 'Креатив и Дизайн' : '';  @endphp
                                           @endif
                                           value="{{ old("list.$i.title.$lang") ?? $value }}">
                                    <label for="help-title-{{ $i }}">{{ __('Title') }}({{ $lang }})</label>
                                    @error("list.$i.title.$lang")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    @php $listsByLang = old("list.$i.list.$lang"); @endphp
                                    @if(isset($listsByLang))
                                        @foreach($listsByLang as $listByLang)
                                            <div class="list-item-container">
                                                <div class="list-item">
                                                    <input name="list[{{ $i }}][list][{{ $lang }}][{{ $loop->index }}]"
                                                           value="{{ $listByLang }}"
                                                           class="form-control @error("list.$i.list.$lang.$loop->index") is-invalid @enderror"
                                                           type="text">
                                                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
                                                       onclick="removeListItem(this)"></i>
                                                </div>

                                                @error("list.$i.list.$lang.$loop->index")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif

                                    @error("list.$i.list.$lang")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endfor
                    @endif

                    <div
                        class="btn-group col-md-6 flex-column align-items-center">
                        <button id="1-{{ $lang }}" type="button"
                                onclick="addListItem(this)"
                                class="add-list-item btn btn-primary">{{ __('Add list item') . ' ' . $lang }}
                        </button>
                    </div>
                    <div
                        class="btn-group col-md-6 flex-column align-items-center">
                        <button id="2-{{ $lang }}" type="button"
                                onclick="addListItem(this)"
                                class="add-list-item btn btn-primary">{{ __('Add list item') . ' ' . $lang }}
                        </button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
