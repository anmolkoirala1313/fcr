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
            <div class="mt-20 row team-member">
                @foreach($data['rows'] as $team)
                    <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-6 mt-3">
                        <div class="bg-img w-100">
                            <img class="w-100 h-100 display-block lazy" data-src="{{ asset(imagePath($team->image)) }}" alt=""/>
                            @if(@$team->fb_link || @$team->twitter_link || @$team->instagram_link || @$team->linkedin_link)
                                <div class="list-social bg-white">
                                    @if($team->fb_link)
                                        <a href="{{ $team->fb_link  ?? "#" }}" target="_blank">
                                            <i class="icon-facebook fs-14"></i></a>
                                    @endif
                                    @if($team->instagram_link)
                                        <a href="{{ $team->instagram_link  ?? "#" }}" target="_blank"> <i class="icon-insta fs-12"></i></a>
                                    @endif
                                    @if($team->twitter_link)
                                        <a href="{{ $team->twitter_link  ?? "#" }}" target="_blank"> <i class="icon-twitter fs-12"></i></a>
                                    @endif
                                    @if($team->linkedin_link)
                                        <a href="{{ $team->linkedin_link  ?? "#" }}" target="_blank"> <i class="icon-in fs-14"></i></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="infor text-center pt-16">
                            <div class="name heading6">{{$team->title ?? ''}}</div>
                            <div class="caption1 text-secondary">{{$team->designation ?? ''}} </div>
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
