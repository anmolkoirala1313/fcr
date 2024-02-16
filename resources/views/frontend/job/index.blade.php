@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="case-studies-block style-one mt-100 pb-100">
        <div class="container">
            <div class="row row-gap-32">
                <div class="col-12 col-xl-8">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-12 col-xl-6 col-sm-6">
                                <a class="item-main" href="{{ route('frontend.job.show', $row->slug) }}">
                                    <div class="bg-img bora-16 overflow-hidden">
                                        <img class="w-100 h-100 bora-16 display-block lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="" style="width: 410px;height: 303px;object-fit: cover"/></div>
                                    <div class="infor bg-white bora-8 pl-24 pr-24 pt-16 pb-16 text-center">
                                        <div class="category text-button-uppercase text-secondary">
                                            @if(@$row->end_date >= date('Y-m-d'))
                                                {{date('M j, Y',strtotime(@$row->start_date))}} - {{date('M j, Y',strtotime(@$row->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </div>
                                        <div class="heading6 mt-8">{{ $row->title ?? '' }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination mt-5">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </div>
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
