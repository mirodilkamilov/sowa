@props(['image'])
{{--image-container--gutters--}}
<figure {{ $attributes->merge(['class' => 'image-container reveal']) }}>
    <img class="cover lazyload" src="{{ $image }}" alt=""/>
</figure>
