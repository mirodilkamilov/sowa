@props(['images', 'isLastContentTypeText'])

<div class="slider slider-simply image-container--half reveal"
     @unless($isLastContentTypeText) style="margin-top: calc(4rem + 2.32rem);" @endunless>
    <div class="slider-article swiper-container">
        <div class="swiper-wrapper">
            @foreach($images as $image)
                <div class="swiper-slide">
                    <div class="cover-slider lazyload" data-bg="{{ $image }}"></div>
                </div>
            @endforeach
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
