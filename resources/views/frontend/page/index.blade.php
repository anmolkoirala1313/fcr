@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{asset('assets/common/frontend_datatable.css')}}">

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

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg', 'page_image'=> $data['row']->image])

    @foreach($data['section_elements'] as $index=>$element)
        @if($index == 'basic_section' && count($element)>0)
            @include($base_route.'includes.basic_section')
        @endif
        @if($index == 'background_image_section' && count($element)>0)
            @include($base_route.'includes.background_image_section')
        @endif
        @if($index == 'call_to_action' && count($element)>0)
            @include($base_route.'includes.call_to_action')
        @endif
        @if($index == 'map_and_description' && count($element)>0)
            @include($base_route.'includes.map_and_description')
        @endif
        @if($index == 'flash_card' && count($element)>0)
            @include($base_route.'includes.flash_card')
        @endif
        @if($index == 'gallery')
            @include($base_route.'includes.gallery')
        @endif
        @if($index == 'faq' && count($element)>0)
            @include($base_route.'includes.faq')
        @endif
        @if($index == 'header_description' && count($element)>0)
            @include($base_route.'includes.header_description')
        @endif
        @if($index == 'slider_list' && count($element)>0)
            @include($base_route.'includes.slider_list')
        @endif
        @if($index == 'document' && count($element)>0)
            @include($base_route.'includes.document')
        @endif
        @if($index == 'card_image' && count($element)>0)
            @include($base_route.'includes.card_image')
        @endif
    @endforeach
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>

    <script>
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });

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
