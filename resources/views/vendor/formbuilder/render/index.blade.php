@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($pageTitle) }} @endsection
@section('css')

    <style>
        /* .footable .btn .caret {
            margin-left: 0;
            display: none;
        } */

        .rendered-form h1{
            font-size: 36px;
            font-weight: 700;
            line-height: 46px;
        }
        .rendered-form p, .contact-page__sub-title{
            font-size: 16px;
            font-weight: 400;
            line-height: 26px;
        }

        .rendered-form label{
            color: #121212;
            font-size: 14px;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 2px;
        }


        .rendered-form input[type="text"], .rendered-form input[type="email"] {
            height: 46px;
            width: 100%;
            border: none;
            padding-right: 30px;
            outline: none;
            font-size: 14px;
            color: var(--secondary);
            display: block;
            font-weight: 400;
            border-bottom: 1px solid #EAECF0;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
            background-color: #F5F5F2;
        }

        .rendered-form textarea.form-control, .form-contact .row .form-block select{
            background-color: #F5F5F2;
            color: var(--secondary);
        }

        .form-contact .row .form-block select{
            height: 46px;
        }

        .rendered-form input[type="text"]:focus, .rendered-form input[type="email"]:focus {
            border-bottom: 1px solid var(--blue);
        }

        .rendered-form .form-control:focus {
            /* outline: 0; */
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 0%), 0 0 8px rgb(102 175 233 / 0%) !important;
        }

        .card-footer {
            padding: 0.5rem 1rem;
            background-color: transparent;
            border-top: 1px solid transparent;
        }

        .card-footer button {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            -webkit-appearance: none;
            outline: none !important;
            background-color: var(--blue);
            color: var(--white);
            font-size: 16px;
            font-weight: 500;
            padding: 10px 33px 10px;
            border-radius: 5px;
            overflow: hidden;
            transition: all 0.5s linear;
            z-index: 1;
            width: 20%!important;
            border-color: var(--blue);
        }

    </style>
@endsection
@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="form-contact style-two mt-100">
        <div class="container">
            <div class="row flex-center">
{{--                <div class="col-12 col-lg-5">--}}
{{--                    <div class="infor flex-columns-between row-gap-32">--}}
{{--                        <div class="heading">--}}
{{--                            <div class="title">Contact us</div>--}}
{{--                            <div class="heading3 mt-12">Get it touch</div>--}}
{{--                            <div class="body3 mt-8">We will get back to you as soon as possible, or call us </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-more-infor">--}}
{{--                            <div class="item flex-item-center gap-12"><i class="ph-fill ph-phone text-white bg-on-surface p-8 bora-50"></i>--}}
{{--                                <div class="line-y"> </div>--}}
{{--                                <div class="body2"><a href="tel:{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}"></a>--}}
{{--                                    {{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="item flex-item-center gap-12 mt-20"><i class="ph-bold ph-envelope-simple text-white bg-on-surface p-8 bora-50"></i>--}}
{{--                                <div class="line-y"> </div>--}}
{{--                                <div class="body2"><a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email }}</a></div>--}}
{{--                            </div>--}}
{{--                            <div class="item flex-item-center gap-12 mt-20"><i class="ph-bold ph-map-pin text-white bg-on-surface p-8 bora-50"></i>--}}
{{--                                <div class="line-y"> </div>--}}
{{--                                <div class="body2">{{ $data['setting_data']->address }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--                        <div class="list-social flex-item-center gap-10"><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.facebook.com/" target="_blank"><i class="icon-facebook icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.linkedin.com/" target="_blank"><i class="icon-in icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.twitter.com/" target="_blank"><i class="icon-twitter fs-14 icon-on-surface ml-1"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.instagram.com/" target="_blank"><i class="icon-insta fs-14 icon-on-surface"></i></a><a class="item bora-50 w-48 h-48 flex-center bg-surface" href="https://www.youtube.com/" target="_blank"><i class="icon-youtube fs-12 icon-on-surface"></i></a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-12 col-lg-8">
                    <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-block flex-columns-between gap-20">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <strong class="sent-success">{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong class="error-sent">{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="card-body">
                                <div id="fb-render"></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="theme-btn w-100 confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                                    <i class="fa fa-submit"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
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

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
