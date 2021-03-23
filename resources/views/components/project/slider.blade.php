@props(['images'])

<div class="slider slider-simply image-container--half reveal">
    <div class="slider-article swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                @foreach($images as $image)
                    <div class="cover-slider lazyload" data-bg="{{ $image }}"></div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="control-slider control-slider--bottom swiper-control">
        <div class="swiper-button-next swiper-button-next--square zoom-cursor">
            <i class="icon-up-open"></i>
        </div>
        <div class="swiper-button-prev swiper-button-prev--square zoom-cursor">
            <i class="icon-down-open"></i>
        </div>
    </div>
</div>
