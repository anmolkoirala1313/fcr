<div class="form-cta-block benefit-three bg-surface">
    <div class="container">
        <div class="row ">
            <div class="col-12 col-lg-6">
                <div class="form-block bora-16 bg-white p-28" style="width: 95%;">
                    @if($setting_data && $setting_data->google_map)
                        <iframe src="{{ $setting_data->google_map }}" style="border:0;width: 545px;height: 520px; border-radius: 8px" allowfullscreen="" loading="lazy"></iframe>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-6">

                <div class="body3 ">
                    <div class="text">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            {{ $element->first()->subtitle ?? '' }}
                        </div>
                        <div class="heading2 mt-16">{{ $element->first()->title ?? '' }}</div>
                    </div>
                    <p class="text-secondary text-align-justify">{{ $element->first()->description ?? '' }}</p>
                    @if($element->first()->button_link)
                        <div class="button-block mt-24 animate__animated animate__fadeInUp animate__delay-0-8s">
                            <a class="button-share display-inline-block hover-button-black border-none bg-blue text-white text-button pl-28 pr-28 pt-12 pb-12 bora-8" href="{{$element->first()->button_link}}" tabindex="0">
                                {{ $element->first()->button ?? 'Explore more' }}
                            </a>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>
