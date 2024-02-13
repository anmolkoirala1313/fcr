
<div class="faq-block pb-80 pt-80 bg-surface">
    <div class="container">
        <div class="row flex-center">
            <div class="col-12 col-lg-8">
                <div class="list-question">
                    <div class="heading4">{{ $element->first()->title ?? '' }}</div>
                    @foreach($element as $index=>$row)
                        <div class=" question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">{{ $row->list_title ?? '' }} {!! $row->list_description ? '<i class="ph-bold ph-plus fs-20 p-8"></i>':'' !!}</div>
                            @if($row->list_description)
                                <div class="content-question">
                                    <div class="border-line"></div>
                                    <div class="body3 text-secondary pt-16 pb-16"> {{ $row->list_description ?? '' }}</div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
