<div class="payment-gateway-one mt-60 bg-on-surface">
    <div class="bg-img">
        <img class="w-100 h-100 lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="payment-infor">
                    <div class="text">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            {{ $element->first()->subtitle ?? '' }}
                        </div>
                        <div class="heading3 mt-12 text-white ">{{ $element->first()->title ?? '' }}</div>
                    </div>
                    <div class="body3 mt-2 text-secondary text-align-justify" style="color:#f6f1f1">
                        {!! $element->first()->description ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
