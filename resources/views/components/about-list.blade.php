@props(['title', 'lists', 'isOdd'])

<div class="col-12 col-md-6 {{ $isOdd ? 'col-lg-4 offset-lg-3 mt-3 mt-sm-0' : 'col-lg-5' }}">
    <h4 class="title title--h6">{{ $title }}</h4>
    <ul class="list-unstyled list-block {{ $isOdd ? 'mb-4 mb-sm-0' : '' }}">
        @foreach($lists as $list)
            <li>{{ $list }}</li>
        @endforeach
    </ul>
</div>
