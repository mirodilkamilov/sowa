<nav class="navbar">
    <div class="mr-auto logo-container">
        <a class="logo-link" href="{{ route('home.index', $locale) }}">
            <img class="logotype logotype__front" src="{{ asset('/assets/images/logo-black.svg') }}" alt="Sowa.">
            <img class="logotype logotype__back" src="{{ asset('/assets/images/logo-white.svg') }}" alt="Sowa.">
        </a>

        @foreach(config('app.languages') as $language)
            <a class="logo-link m-3 title--overhead" href="{{ route(Route::currentRouteName(), $language) }}"
               @if ($language == $locale) style="font-weight: 900; color: black" @endif>{{ $language }}</a>
        @endforeach
    </div>

    <div class="ml-sm-auto">
        <button class="hamburger zoom-cursor" type="button">
            <span class="hamburger__inner"></span>
        </button>
    </div>
</nav>
