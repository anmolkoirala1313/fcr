@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

{{--    <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">{{ count($data['rows']) }}</span> blogs--}}
{{--        for you--}}
{{--    </h2>--}}

    <div class="blog-list mt-100 mb-100">
        <div class="container">
            <div class="row row-gap-40">
                <div class="col-12 col-lg-8 flex-column row-gap-40">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="blog-item col-12 col-xl-6 d-flex align-items-stretch col-sm-6 {{ $index > 1 ? 'mt-3':'' }}" data-name="">
                                <a class="blog-item-main" href="{{ route('frontend.blog.show', $row->slug) }}">
                                    <div class="bg-img w-100 overflow-hidden mb-minus-1">
                                        <img class="w-100 h-100 display-block lazy" data-src="{{ asset(imagePath($row->image))}}" alt=""/>
                                    </div>
                                    <div class="infor bg-white p-24">
                                        <div class="date flex-item-center gap-16 mt-8">
                                            <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i>
                                                <span class="ml-4 caption2">{{date('d M Y', strtotime($row->created_at))}}</span>
                                            </div>
                                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">{{ $row->blogCategory->title ?? '' }}</div>

                                        </div>
                                        <div class="heading6 mt-8">{{ $row->title ?? '' }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </div>
                </div>
                <div class="col-12 col-lg-4 pl-55">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
