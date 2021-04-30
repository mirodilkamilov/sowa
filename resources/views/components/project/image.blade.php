@props(['image', 'isLastContentTypeText'])

<figure
    {{ $attributes->merge(['class' => 'image-container reveal']) }} @unless($isLastContentTypeText) style="margin-top: calc(4rem + 2.32rem);" @endunless>
    <img class="cover lazyload" src="{{ $image }}" alt="Sowa"/>
</figure>
