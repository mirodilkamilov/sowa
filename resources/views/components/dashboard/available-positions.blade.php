<span class="display-block mt-1 text-muted">
    @php $availablePositions = $getAvailablePositions(); @endphp
    @if(empty($availablePositions))
        No reserved positions yet
    @else
        {{ __('Available positions:') }}
        @foreach($availablePositions as $availablePosition)
            {{ $availablePosition }},

            @if($loop->last) &infin; @endif
        @endforeach
    @endif
</span>
