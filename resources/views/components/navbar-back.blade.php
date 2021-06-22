@props(['projectId', 'slug'])

<nav class="navbar navbar-back">
    <div class="mr-auto logo-container">
        <a class="btn-link" href="{{ route('user.projects.index', $locale) }}"><i class="circle icon-left-open"></i></a>
        <a class="logo-link" href="{{ route('home.index', $locale) }}">
            <img class="logotype" src="{{ asset('assets/images/logo-white.svg') }}" alt="Sowa.">
        </a>

        @foreach(config('app.languages') as $language)
            <a class="logo-link m-3 title--overhead"
               href="{{ route(Route::currentRouteName(), [$language, $projectId, $slug]) }}"
               @if ($language == $locale) style="font-weight: 900; color: black" @endif>{{ $language }}</a>
        @endforeach
    </div>
    <div class="ml-sm-auto">
        <button class="hamburger zoom-cursor" type="button">
            <span class="hamburger__inner"></span>
        </button>
    </div>
</nav>
