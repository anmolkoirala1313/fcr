@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <style>
        .image-dimension{
            width: 410px;
            height: 261px;
            object-fit: cover;
            transform: scale(1);
            transition: .3s linear;
        }
        .magnific-img{
            margin-right: 20px;
        }
        .mfp-container {
            max-width: 900px;
            max-height: 900px;
            margin: 0 auto;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
        }
        .mfp-figure img {
            max-width: 100%;
            height: auto;
        }
        .slick-slide {
            height: auto!important;
        }
    </style>
@endsection


@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])


{{--    <section class="portfolio-one">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($data['rows']->albumGallery as $index=>$gallery)--}}

{{--                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-delay="{{$index+1}}00ms">--}}
{{--                        <div class="portfolio-one__single">--}}
{{--                            <div class="portfolio-one__img-box">--}}
{{--                                <div class="portfolio-one__img">--}}
{{--                                    <img class="image-dimension" src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="portfolio-one__arrow">--}}
{{--                                    <a href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" class="img-popup"><span--}}
{{--                                            class="icon-top-right-1"></span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
{{--    --}}
    <div class="case-studies-block style-one mt-100 pb-100">
        <div class="container">

            <div class="row mt-40">
                @foreach($data['rows']->albumGallery as $index=>$gallery)
                    <div class="magnific-img mt-2">
                        <a class="image-popup-vertical-fit"
                           href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" title="">
                            <img src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}"
                                 class="bora-16 image-dimension" alt="" />
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
    <script>
        $(document).ready(function(){
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom',
                gallery:{
                    enabled:true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            });

        });
    </script>
@endsection
