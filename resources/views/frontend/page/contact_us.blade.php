@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])


    <div class="form-contact style-two mt-100">
        <div class="container">
            <div class="row flex-between row-gap-32">
                <div class="col-12 col-lg-5">
                    <div class="infor flex-columns-between row-gap-32">
                        <div class="heading">
                            <div class="title">Contact us</div>
                            <div class="heading3 mt-12">Get it touch</div>
                            <div class="body3 mt-8">We will get back to you as soon as possible, or call us </div>
                        </div>
                        <div class="list-more-infor">
                            <div class="item flex-item-center gap-12"><i class="ph-fill ph-phone text-white bg-on-surface p-8 bora-50"></i>
                                <div class="line-y"> </div>
                                <div class="body2"><a href="tel:{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}"></a>
                                    {{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}</div>
                            </div>
                            <div class="item flex-item-center gap-12 mt-20"><i class="ph-bold ph-envelope-simple text-white bg-on-surface p-8 bora-50"></i>
                                <div class="line-y"> </div>
                                <div class="body2"><a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email }}</a></div>
                            </div>
                            <div class="item flex-item-center gap-12 mt-20"><i class="ph-bold ph-map-pin text-white bg-on-surface p-8 bora-50"></i>
                                <div class="line-y"> </div>
                                <div class="body2">{{ $data['setting_data']->address }}</div>
                            </div>
                        </div>
{{--                        <div class="list-social flex-item-center gap-10"><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.facebook.com/" target="_blank"><i class="icon-facebook icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.linkedin.com/" target="_blank"><i class="icon-in icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.twitter.com/" target="_blank"><i class="icon-twitter fs-14 icon-on-surface ml-1"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.instagram.com/" target="_blank"><i class="icon-insta fs-14 icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.youtube.com/" target="_blank"><i class="icon-youtube fs-12 icon-on-surface"></i></a></div>--}}
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    {!! Form::open(['route' => $module.'contact-us.store', 'method'=>'POST', 'class'=>'submit_form','novalidate'=>'novalidate']) !!}
                        <div class="form-block flex-columns-between gap-20">
                            <div class="row row-gap-20">
                                <div class="col-12 col-sm-6">
                                    <input class="w-100 bg-surface text-secondary caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="name"
                                           type="text" placeholder="Name"/>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input class="w-100 bg-surface text-secondary caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="email" type="email" placeholder="Email"/>

                                </div>
                                <div class="col-12">
                                    <input class="w-100 bg-surface text-secondary caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="subject" type="text" placeholder="Subject"/>

                                </div>
                                <div class="col-12">
                                    <textarea class="w-100 bg-surface text-secondary caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="message" cols="10" rows="4" placeholder="Your Message..."></textarea>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="button-share bg-on-surface text-button text-white pl-36 pr-36 pt-12 pb-12 bora-48">Send Message</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @if($data['setting_data'] && $data['setting_data']->google_map)

            <div class="map-block mt-100">
                <iframe src="{{$data['setting_data']->google_map}}" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        @endif
    </div>
    @endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
