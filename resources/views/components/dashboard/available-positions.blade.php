<span class="display-block text-muted" style="margin-top: 0.5rem;">
    @php $availablePositions = $getAvailablePositions(); @endphp
    @if(empty($availablePositions))
        {{ __('No reserved positions yet') }}
    @else
        {{ __('Available positions') }}:
        @foreach($availablePositions as $availablePosition)
            {{ $availablePosition }},

            @if($loop->last) &infin; @endif
        @endforeach
    @endif
</span>
