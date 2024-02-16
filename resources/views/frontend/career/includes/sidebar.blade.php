<div class="search-block bora-8 bg-surface">
    {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'search-form']) !!}
    <input class="bora-8 bg-surface w-100" type="text" name="for"  placeholder="Search"/>
    <button type="submit"><i class="ph ph-magnifying-glass"></i></button>
    {!! Form::close() !!}
</div>
@if(count( $data['latest']) > 0)
    <div class="recent-post-block mt-40">
        <div class="recent-post-heading heading7">Recent Career Jobs</div>
        <div class="list-recent-post mt-16">
            @foreach($data['latest'] as $latest)
                <div class="recent-post-item d-flex item-start gap-16">
                    <a class="item-img" href="{{ route($module.'career.show',$latest->slug) }}">
                        <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt=""/>
                    </a>
                    <div class="item-infor">
                        <a href="{{ route($module.'career.show',$latest->slug) }}">
                            <div class="item-date flex-item-center">
                                <i class="ph-bold ph-calendar-blank"></i>
                                <span class="ml-4 caption2">
                                        @if(@$job->end_date >= date('Y-m-d'))
                                        {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                    @else
                                        Expired
                                    @endif
                                </span>
                            </div>
                            <div class="item-title mt-4">
                                {{ $latest->title }}
                            </div>
                        </a>
                    </div>
                </div>
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
