@props(['locale', 'availableLangs'])

<li class="dropdown dropdown-language nav-item">
    <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-{{($locale == 'en') ? 'gb' : $locale}}"></i>
        <span class="selected-language">{{ $locale }}</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdown-flag">
        @foreach($availableLangs as $language)
            <a class="dropdown-item" href="?change-language={{ $language }}" data-language="{{ $language }}">
                <i class="flag-icon flag-icon-{{($language == 'en') ? 'gb' : $language}}"></i>{{ $language }}
            </a>
        @endforeach
    </div>
</li>
