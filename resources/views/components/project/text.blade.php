@props(['textSectionNum', 'content'])

<article class="caption-single container">
    <div class="row">
        <div class="col-12 col-lg-2"><span class="num-article">0{{ $textSectionNum }} —</span></div>
        <div class="col-12 col-lg-9">
            <h2 class="title title--h4 js-lines">{{ $content->title }}</h2>
            <div class="description js-block">
                <p>{{ $content->description }}</p>
            </div>
        </div>
    </div>
</article>
