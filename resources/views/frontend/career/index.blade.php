@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="blog-list mt-100 mb-100">
        <div class="container">
            <div class="row row-gap-40">
                    <div class="col-12 col-lg-8 flex-column row-gap-40">
                        @foreach( $data['rows']  as $index=>$row)
                            <a class="row blog-item row-gap-20 item-filter" href="{{ route('frontend.career.show', $row->slug) }}" style="border: 1px solid #ddddd9;border-radius: 18px;">
                                <div class="col-12 col-md-6" style="padding-left: 0px;">
                                    <div class="bg-img w-100 overflow-hidden bora-16">
                                        <img class="display-block lazy" style="width: 410px; height: 261px" data-src="{{ asset(imagePath($row->image)) }}" alt=""></div>
                                </div>
                                <div class="col-12 col-md-6" style="padding-top: 15px;">
                                    <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">FCR Career</div>
                                    <div class="heading6 mt-8">{{ $row->title ?? '' }}</div>
                                    <div class="date flex-item-center gap-16 mt-8">
                                        <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i>
                                            <span class="ml-4 caption2">
                                                @if(@$row->end_date >= date('Y-m-d'))
                                                    {{date('M j, Y',strtotime(@$row->start_date))}} - {{date('M j, Y',strtotime(@$row->end_date))}}
                                                @else
                                                    Expired
                                                @endif</span>
                                        </div>
                                    </div>
                                    <div class="body3 text-secondary mt-16 pb-16">
                                        {!! elipsis($row->description) !!}
                                    </div>
                                    <div class="read fw-700 text-underline">Read More</div>
                                </div>
                            </a>
                        @endforeach

                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </div>
                <div class="col-12 col-lg-4 pl-55 sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
