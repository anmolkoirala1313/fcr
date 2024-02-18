@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($form->name) }} @endsection
@section('css')
    <style>
        .contact-page__sub-title {
            font-size: 16px;
            font-weight: 400;
            text-transform: uppercase;
            color: #26292E;
            margin-top: 14px;
            margin-bottom: 11px!important;
        }

    </style>
@endsection
@section('content')

    <!-- Page Banner Start -->
    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="form-contact style-two mt-100">
        <div class="container">
            <div class="row flex-center">
                    <div class="col-12 col-lg-5">
                        <div class="infor flex-columns-between row-gap-32">
                            <div class="heading">
                                <div class="title">Successfully sent</div>
                                <div class="heading3 mt-12">Form Submitted</div>
                                <div class="body3 mt-8">Your entry for <strong>{{ $form->name }}</strong> was successfully submitted.</div>
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
                                <div class="item flex-item-center gap-12 mt-20 mb-60"><i class="ph-bold ph-map-pin text-white bg-on-surface p-8 bora-50"></i>
                                    <div class="line-y"> </div>
                                    <div class="body2">{{ $data['setting_data']->address }}</div>
                                </div>
                                <a  href="{{ url()->previous() }}" class="mt-5 button-share bg-on-surface text-button text-white pl-36 pr-36 pt-12 pb-12 bora-48"><span class="fas fa-paper-plane"></span> View Form </a>

                            </div>
                        </div>
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
