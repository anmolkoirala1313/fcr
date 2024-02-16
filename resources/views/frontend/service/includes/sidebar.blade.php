<div class="search-block bora-8 bg-surface">
    {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'search-form']) !!}
    <input class="bora-8 bg-surface w-100" type="text" name="for"  placeholder="Search"/>
    <button type="submit"><i class="ph ph-magnifying-glass"></i></button>
    {!! Form::close() !!}
</div>
@if(count( $data['latest']) > 0)
    <div class="more-infor border-line-1px bora-12 pt-32 pb-32 pl-24 pr-24 mt-3">
        <div class="heading6">Latest Categories</div>
        <div class="list-nav mt-16">
            @foreach($data['latest'] as $latest)
                <a class="nav-item bora-8 flex-between p-12 mt-1 {{ $loop->first ? 'active':''}}" href="{{ route('frontend.service.show',$latest->key) }}">
                    <div class="text-button text-secondary">
                        {{ $latest->title ?? '' }}
                    </div><i class="ph-bold ph-caret-right hidden"></i>
                </a>
            @endforeach
        </div>
    </div>
@endif
<div class="ads-block bora-8">
    <div class="bg-img"> <img src="{{ asset('assets/frontend/images/component/ads.png') }}" alt=""/></div>
    <div class="text flex-columns-between">
        <div class="title">
            <div class="heading5 text-white">Let’s talk</div>
            <div class="body3 text-white mt-4">You can reach out,<br>Send a Message!</div>
        </div>
        <div class="button-block">
            <a class="button-share hover-button-black display-inline-block bg-white text-button pl-36 pr-36 pt-12 pb-12 bora-48"
               href="{{route('frontend.contact-us')}}">
                Contact Us
            </a>
        </div>
    </div>
</div>
