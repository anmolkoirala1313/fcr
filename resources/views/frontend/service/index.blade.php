@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="content-detail-block pt-100 pb-100">
        <div class="container">
            <div class="row row-gap-32">
                <div class="col-12 col-xl-8">
                    <div class="row mb-2">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="blog-item col-12 col-xl-6 col-sm-6 {{ $index > 1 ? 'mt-3':'' }}">
                                <a class="blog-item-main" href="{{ route('frontend.service.show', $row->key) }}">
                                    <div class="bg-img w-100 overflow-hidden mb-minus-1">
                                        <img class="w-100 h-100 display-block lazy" data-src="{{ asset(thumbnailImagePath($row->image)) }}" alt="">
                                    </div>
                                    <div class="infor bg-white p-24">
                                        <div class="heading6 mt-8">{{ $row->title ?? '' }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $data['rows']->links('vendor.pagination.default') }}
                </div>
                <div class="col-12 col-xl-4 sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
