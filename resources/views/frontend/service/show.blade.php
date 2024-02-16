@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css">

    <style>
        .table {
            width: 100%!important;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table tbody tr:first-child {
            background-color: var(--blue); /* Different background color */
            border-color:var(--blue); /* Different border color */
            color: white;
        }
       
    </style>
@endsection
@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

{{--    <section class="services-details">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-4">--}}
{{--                    @include($view_path.'includes.sidebar')--}}
{{--                </div>--}}
{{--                <div class="col-xl-9 col-lg-8">--}}
{{--                    <div class="services-details__right">--}}
{{--                        <div class="services-details__img">--}}
{{--                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">--}}
{{--                        </div>--}}
{{--                        <h3 class="services-details__title-1">--}}
{{--                            {{ $data['row']->title ?? '' }}--}}
{{--                        </h3>--}}
{{--                        <div class="services-details__text-1 text-align-justify custom-description">--}}
{{--                            {!!  $data['row']->description !!}--}}
{{--                        </div>--}}
{{--                        <div class="news-details__tag-and-social">--}}
{{--                            <div class="news-details__tag">--}}
{{--                            </div>--}}
{{--                            <div class="news-details__social">--}}
{{--                                <span>Share on:</span>--}}
{{--                                <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.service.show',$data['row']->key)}}")'></i></a>--}}
{{--                                <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>--}}
{{--                                <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <div class="content-detail-block pt-100 pb-100">
        <div class="container">
            <div class="row row-gap-32">
                <div class="col-12 col-xl-8">
                    <div class="content-para pr-55">
                        <div class="heading3">
                            {{ $data['row']->title ?? '' }}
                        </div>
                        <div class="bg-img mt-32 mb-32">
                            <img class="w-100 h-100 bora-16 lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt=""/>
                        </div>
                        <div class="body2 text-secondary mt-16 text-align-justify custom-description">
                            {!!  $data['row']->description !!}
                        </div>
                        <div class="blog-more-infor mt-32">
                            <div class="infor-above flex-between">
                                <div class="share-block flex-item-center gap-16 share-social">
                                    <div class="caption2 pt-8 pb-8 pl-16 pr-16 bora-8 border-line-1px">Share</div>
                                    <div class="social-media flex-item-center gap-12">
                                        <a href="#" target="_blank"> <i class="icon-facebook" onclick='fbShare("{{route('frontend.service.show',$data['row']->key)}}")'></i></a>
                                        <a href="#" target="_blank"> <i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>
                                        <a href="#" target="_blank"> <i class="icon-twitter fs-14"  onclick='twitShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-32 line-x"></div>


                        </div>
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
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <script>
        function fbShare(url) {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function twitShare(url, title) {
            window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function whatsappShare(url, title) {
            message = title + " " + url;
            window.open("https://api.whatsapp.com/send?text=" + message);
        }
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive').attr("data-toggle", "table");
            }
        });
    </script>
@endsection
