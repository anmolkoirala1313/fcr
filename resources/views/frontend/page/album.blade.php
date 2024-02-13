@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="case-studies-block style-one mt-100 pb-100">
        <div class="container">
            @if($data['heading'])

                <div class="text text-center">
                    @if ( $data['heading']->subtitle )
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            {{  $data['heading']->subtitle ?? ''  }}
                        </div>
                    @endif
                    <div class="heading3 mt-12 ">{{ $data['heading']->title ?? '' }}</div>
                    <div class="right flex-columns-center gap-8 mt-12">
                        <div class="body3">{!!  $data['heading']->description ?? '' !!}</div>
                    </div>
                </div>
            @endif
            <div class="row mt-40">
                @foreach($data['rows'] as $row)
                    <div class="col-12 col-xl-4 col-sm-6">
                        <a class="item-main" href="{{ route($base_route.'page.album_gallery', $row->slug) }}">
                            <div class="bg-img bora-16 overflow-hidden">
                                <img class="w-100 h-100 bora-16 display-block lazy" data-src="{{ asset(imagePath($row->image)) }}" alt=""/>
                            </div>
                            <div class="infor bg-white bora-8 pl-24 pr-24 pt-16 pb-16 text-center">
                                <div class="category text-button-uppercase text-secondary">Images: ({{ $row->album_gallery_count }})</div>
                                <div class="heading6 mt-8">{{ $row->title ?? '' }}</div>
                            </div>
                        </a>
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
