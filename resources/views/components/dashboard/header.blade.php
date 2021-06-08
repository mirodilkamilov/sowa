@props(['currentRoute', 'arrayOfRoutes', 'slicedSegment' => null])

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __(Str::title($currentRoute)) }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        @php $routeUrl = ''; @endphp
                        @foreach($arrayOfRoutes as $route)
                            <li class="breadcrumb-item">
                                @if(isset($slicedSegment) && $loop->iteration === 3)
                                    @php $routeUrl .= '/' . $slicedSegment @endphp
                                @endif
                                @php $routeUrl .= '/' . $route @endphp
                                <a href="{{ asset($routeUrl) }}">{{ __(Str::title($route)) }}</a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
