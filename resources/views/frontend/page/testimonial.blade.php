@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="our-team-block pt-100 bg-white pb-100">
        <div class="container">
            @if($data['heading'])
                <div class="text text-center">
                    @if ($data['heading']->subtitle ?? '')
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            {{ $data['heading']->subtitle ?? '' }}
                        </div>
                    @endif
                    <div class="heading3 mt-12 ">{{ $data['heading']->title ?? '' }}</div>
                    <div class="right flex-columns-center gap-8 mt-12">
                        <div class="body3 custom-description text-align-justify">
                            {!! $data['heading']->description ?? ''  !!}
                        </div>
                    </div>
                </div>
            @endif
            <div class="mt-20 row testimonials">
                @foreach($data['rows'] as $testimonial)
                    <div class="col-12 col-lg-4 col-sm-6 d-flex align-items-stretch comment-item">
                        <div class="item p-32 bg-white bora-12 box-shadow hover-box-shadow w-100">
                            <div class="body3 text-secondary text-align-justify">
                                "{{ $testimonial->description }}"
                            </div>
                            <div class="infor mt-16 flex-item-center gap-16">
                                <div class="avatar"><img class="w-60 h-60 lazy" data-src="{{ asset(imagePath($testimonial->image)) }}" alt=""/></div>
                                <div class="desc">
                                    <div class="text-button">{{ $testimonial->title ?? '' }}</div>
                                    <div class="caption2 text-secondary mt-4">{{ $testimonial->position ?? '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
