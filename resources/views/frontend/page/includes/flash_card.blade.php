
<div class="service-block style-about-two pt-60 pb-60 bg-surface style-three">
    <div class="container">
        <div class="text text-center">
            @if ($element->first()->subtitle )
                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                    {{ $element->first()->subtitle ?? '' }}
                </div>
            @endif

            <div class="heading3 mt-12 ">{{ $element->first()->title ?? '' }}</div>
        </div>

        <div class="list-service mt-40 pt-12">
            <div class="row row-gap-40">
                @foreach($element as $index=>$row)
                    <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="service-item hover-box-shadow pl-32 pr-32 pt-40 pb-40 bora-8 bg-white">
                            <a class="service-item-main flex-column gap-16">
                                <div class="heading flex-item-center gap-16">
                                    @if($row->image)
                                        <span><img src="{{ asset(imagePath($row->image)) }}"  style="height: 65px;width: 65px;object-fit: cover;" alt=""></span>
                                    @else
                                        <i class="{{ get_flash_card_icons($index) }} icon-gradient fs-60"></i>
                                    @endif

                                    <div class="heading6 hover-text-blue">{{$row->list_title ?? ''}}</div>
                                </div>
                                <div class="body3 text-secondary text-align-justify">
                                    {{$row->list_description ?? ''}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
