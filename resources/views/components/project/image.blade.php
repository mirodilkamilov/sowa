@props(['image'])

<figure {{ $attributes->merge(['class' => 'image-container reveal']) }}>
    <img class="cover lazyload" src="{{ $image }}" alt="Sowa"/>
</figure>
