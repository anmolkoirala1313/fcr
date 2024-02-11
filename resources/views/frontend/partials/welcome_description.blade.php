<div class="text-about">
    <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">{{ $data['homepage']->subtitle ?? '' }}</div>
    <div class="heading3 mt-20">{{ $data['homepage']->title ?? '' }}</div>
    <div class="body3 text-secondary mt-2 text-align-justify">{!! $data['homepage']->description ?? '' !!}</div>
    @if($data['homepage']->link)
        <div class="button-block button-block-2 mt-3 flex-item-center gap-24">
            <a class="button-share box-shadow hover-button-blue text-on-surface bg-white text-button pt-12 pb-12 pl-36 pr-36 bora-48 flex-item-center gap-8" href="{{ $data['homepage']->link ?? '' }}">
               <span>{{ $data['homepage']->button  ?? 'Learn More'}}</span></a>
            <img class="lazy" data-src="{{asset('assets/frontend/images/component/gateway1-dot.png')}}" alt="">
        </div>
    @endif
</div>
