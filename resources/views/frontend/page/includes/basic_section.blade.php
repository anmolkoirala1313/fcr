<div class="about-home-five mt-100 mb-80">
    <div class="container">
        <div class="row ">
            <div class="col-12 col-lg-5 col-md-8 col-sm-8">
                <div class="bg-img w-100 bora-20">
                    <img class="hover-scale display-block bora-20 lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 ml-65">
                <div class="text-about">
                    @if ($element->first()->subtitle)
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">{{ $element->first()->subtitle ?? '' }}</div>
                    @endif
                    <div class="heading4 mt-16">{{ $element->first()->title ?? '' }}</div>
                    <div class="body3 text-secondary mt-2 text-align-justify">  {!! $element->first()->description ?? '' !!}</div>
                    @if($element->first()->button_link)
                        <div class="button-block button-block-2 mt-3 flex-item-center gap-24">
                            <a class="button-share display-inline-block hover-button-black border-none bg-blue text-white text-button pl-28 pr-28 pt-12 pb-12 bora-8" href="{{$element->first()->button_link}}">
                                <span> {{ $element->first()->button ?? 'Reach Out' }}</span></a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
