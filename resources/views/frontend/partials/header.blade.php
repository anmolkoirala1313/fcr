<!DOCTYPE html>
<html lang="en">
<!-- finatex -->
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? '')}}"/>
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
    <link rel="canonical" href="#" />

    @if (\Request::is('/'))
        <title> {{ucwords($setting_data->title ?? '')}}</title>
    @else
        <title>@yield('title') |  {{ucwords($setting_data->title ?? '')}} </title>
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com/"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

    <meta property="og:title" content="{{ucwords(@$setting_data->meta_title ?? '')}}" />
    <meta property="og:type" content="Consultancy" />
    <meta property="og:url" content="#" />
    <meta property="og:site_name" content="{{ucwords($setting_data->title ?? '')}}" />
    <meta property="og:description" content="{{ucwords(@$setting_data->meta_description ?? '')}}" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-drawer.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/icons/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate-4.1.1.min.css') }}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>

    @yield('css')
    @stack('styles')
</head>
<body>
<div id="header">
    <div class="top-nav style-one bg-dark">
        <div class="container flex-between h-44">
            <div class="left-block flex-item-center">
                <div class="location flex-item-center">
                    <i class="ph-light ph-phone text-white fs-20"></i>
                    <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}" class="ml-8 caption1 text-white">{{ $setting_data->phone ?? $setting_data->mobile }}</a>
                </div>
                <div class="line h-24 ml-24 w-1 bg-grey"> </div>
                <div class="mail ml-24 flex-item-center">
                    <i class="ph-light ph-envelope text-white fs-20"></i>
                    <a href="mailto:{{ $setting_data->email ?? '' }}" class="ml-8 caption1 text-white">{{ $setting_data->email ?? '' }}</a>
                </div>
            </div>
            <div class="right-block flex-item-center gap-20">
                <div class="location flex-item-center">
                    <a href="tel:{{ $setting_data->phone }}" class="ml-8 caption1 text-white">{{ $setting_data->phone ?? $setting_data->mobile }}</a>
                </div>
                <div class="line h-24 w-1 bg-grey"> </div>
                <div class="list-social flex-item-center gap-10 style-one">
                    @if(@$setting_data->facebook)
                        <a class="item bora-50 w-28 h-28 border-grey-2px flex-center" href="{{$setting_data->facebook}}" target="_blank">
                            <i class="icon-facebook fs-12"></i>
                        </a>
                    @endif
                    @if(@$setting_data->instagram)
                        <a class="item bora-50 w-28 h-28 border-grey-2px flex-center" href="{{$setting_data->instagram}}" target="_blank">
                            <i class="icon-insta fs-12"></i>
                        </a>
                    @endif
                    @if(@$setting_data->youtube)
                    <a class="item bora-50 w-28 h-28 border-grey-2px flex-center" href="{{$setting_data->youtube}}" target="_blank">
                        <i class="fab fa-youtube fs-12"></i>
                    </a>
                    @endif
                    @if(@$setting_data->linkedin)
                        <a class="item bora-50 w-28 h-28 border-grey-2px flex-center" href="{{$setting_data->linkedin}}" target="_blank">
                            <i class="fab fa-linkedin fs-12"></i>
                        </a>
                    @endif
                    @if(!empty(@$setting_data->ticktock))
                        <a class="item bora-50 w-28 h-28 border-grey-2px flex-center" href="{{$setting_data->ticktock}}" target="_blank">
                            <i class="fab fa-tiktok fs-12"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu style-one bg-white">
        <div class="container flex-between h-80">
            <a href="/"><img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 110px;" alt=""></a>

            <div class="menu-center-block h-100">
                <ul class="menu-nav flex-item-center h-100">
                    <li class="nav-item h-100 flex-center home"><a class="nav-link" href="/">Home </a></li>
                    @if(!empty($top_nav_data))
                        @foreach($top_nav_data as $nav)
                            @if(!empty($nav->children[0]))
                                <li class="nav-item h-100 flex-center services">
                                    <a class="nav-link" href="#"> {{ @$nav->name ?? @$nav->title }} {!! !empty($nav->children[0]) ? '<i class="ph ph-caret-down fs-14"></i>':'' !!}</a>
                                    <ul class="sub-nav hidden">
                                        @foreach($nav->children[0] as $childNav)
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link" href="{{get_menu_url($childNav->type, $childNav)}}">
                                                     {{ @$childNav->name ?? @$childNav->title ??''}}
                                                </a>
                                                @if(!empty($childNav->children[0]))
                                                    <ul class="sub-nav-child hidden">
                                                        @foreach($childNav->children[0] as $key => $lastchild)
                                                            <li class="sub-nav-item"> <a class="sub-nav-link" href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                    {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item h-100 flex-center home">
                                    <a class="nav-link" href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                        {{ @$nav->name ?? @$nav->title ??''}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="menu-right-block flex-item-center">
                <a class="button-share bg-orange border-transparent hover-text-orange hover-bg-white text-white text-button pl-36 pr-36 pt-12 pb-12 bora-100" href="{{route('frontend.contact-us')}}">
                    Get a quote
                </a>
                <div class="menu-humburger display-none pointer"><i class="ph-bold ph-list fs-24"></i></div>
            </div>

        </div>
        <div id="menu-mobile-block">
            <div class="menu-mobile-main">
                <div class="container">
                    <ul class="menu-nav-mobile h-100 pt-4 pb-4">
                        <li class="nav-item-mobile h-100 flex-column gap-8 pt-8 pb-8 pl-12 pr-12 pointer home">
                            <a class="fs-14 nav-link-mobile" href="#!">Home </a>
                        </li>
                        @if(!empty($top_nav_data))
                            @foreach($top_nav_data as $nav)
                                @if(!empty($nav->children[0]))
                                    <li class="nav-item-mobile h-100 gap-8 pt-4 pb-8 pl-12 pr-12 pointer">
                                        <a class="fs-14 nav-link-mobile" href="#">{{ @$nav->name ?? @$nav->title }} {!! !empty($nav->children[0]) ? '<i class="ph ph-caret-down fs-12"></i>':'' !!}</a>
                                        <ul class="sub-nav-mobile">
                                            @foreach($nav->children[0] as $childNav)
                                                <li class="sub-nav-item h-100 gap-8 pl-12 pr-12 pt-8 pb-8 pointer">
                                                    <a class="sub-nav-link fs-14" href="#"> {{ @$childNav->name ?? @$childNav->title ??''}} {!! !empty($childNav->children[0]) ? '<i class="ph ph-caret-down fs-12"></i>':'' !!}</a>
                                                    @if(!empty($childNav->children[0]))
                                                        <ul class="sub-nav-child-mobile">
                                                            @foreach($childNav->children[0] as $key => $lastchild)
                                                                <li class="sub-nav-child-item pl-12 pr-12 pt-8 pb-8">
                                                                    <a class="sub-nav-link fs-14" href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">  {{ @$lastchild->name ?? @$lastchild->title ?? ''}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item-mobile h-100 flex-column gap-8 pt-8 pb-8 pl-12 pr-12 pointer home">
                                        <a class="fs-14 nav-link-mobile" href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">  {{ @$nav->name ?? @$nav->title ??''}} </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
