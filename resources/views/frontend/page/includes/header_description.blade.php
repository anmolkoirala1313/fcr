<div class="content-detail-block pb-100">
    <div class="container">
        <div class="row row-gap-32">
            <div class="col-12 col-xl-12">
                <div class="content-para pr-55">
                    <div class="text text-center">
                        <div class="heading3 mt-30 mb-3">{{ $element->first()->subtitle ?? '' }}</div>
                    </div>
                    <div class="body3 text-secondary text-align-justify custom-description">
                        {!! $element->first()->description ?? '' !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
