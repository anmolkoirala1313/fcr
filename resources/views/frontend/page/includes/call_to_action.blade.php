<div class="more-question-block mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="content bg-gradient-blue bora-16 flex-columns-center gap-16 pt-32 pb-32 pl-28 pr-28">
                    <div class="text text-center">
                        <div class="heading6 text-white">{{ $element->first()->subtitle ?? '' }}</div>
                        <div class="body3 text-white mt-8">{{ $element->first()->title ?? '' }}</div>
                    </div>
                        @if($element->first()->button_link)
                            <a class="button-share hover-button-blue bg-white text-button pl-36 pr-36 pt-12 pb-12 bora-48" href="{{ $element->first()->button_link }}">
                             {{ $element->first()->button ?? 'Learn More' }}
                            </a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
