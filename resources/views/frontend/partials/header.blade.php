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
                <div class="mail ml-28 flex-item-center">
                    <i class="ph-light ph-envelope text-white fs-20"></i>
                    <a href="mailto:{{ $setting_data->email ?? '' }}" class="ml-8 caption1 text-white">{{ $setting_data->email ?? '' }}</a>
                </div>
            </div>
            <div class="right-block flex-item-center gap-20">
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
    <div class="style-subpage style-home-six">
        <div class="header-menu style-six">
            <div class="container">
                <div class="header-main">
                    <div class="menu-header flex-between"><a class="menu-left-block" href="#"><img class="menu-logo" src="assets/images/LogoWhite.svg" alt="logo"/></a>
                        <div class="menu-center-block h-100">
                            <ul class="menu-nav flex-item-center h-100">
                                <li class="nav-item h-100 flex-center home"><a class="nav-link text-white" href="#!">Home <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item active"><a class="sub-nav-link" href="index.html">Payment Solution</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="home2.html">Financial Planning</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="home3.html">Online Banking</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="home4.html">Personal Finance</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="home5.html">Cryptocurrency Financial</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="home6.html">Blockchain</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center about"><a class="nav-link text-white" href="#!">About <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="about-one.html">About Style 1</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="about-two.html">About Style 2</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center services"><a class="nav-link text-white" href="#!">Services <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item">
                                            <a class="sub-nav-link" href="service-one.html">Service Style 1 <i class="ph ph-caret-down fs-14"></i></a>
                                            <ul class="sub-nav-child hidden">
                                                <li class="sub-nav-item"> <a class="sub-nav-link" href="about-one.html">About Style 1</a></li>
                                                <li class="sub-nav-item"> <a class="sub-nav-link" href="about-two.html">About Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="service-two.html">Service Style 2</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="service-detail.html">Services Detail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center case"><a class="nav-link text-white" href="#!">Case Studies <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="case-studies-one.html">Case Studies 1</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="case-studies-two.html">Case Studies 2</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="case-studies-detail.html">Case Studies Detail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center pages"><a class="nav-link text-white" href="#!">Pages <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="faqs.html">FAQs</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="pricing.html">Pricing</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="partners.html">Partners</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center blog"><a class="nav-link text-white" href="#!">Blog <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-list-one.html">Blog List 1</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-list-two.html">Blog List 2</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-grid.html">Blog Grid</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-masonry.html">Blog Masonry</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-detail-one.html">Blog Detail 1</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="blog-detail-two.html">Blog Detail 2</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item h-100 flex-center contact"><a class="nav-link text-white" href="#!">Contact <i class="ph ph-caret-down fs-14"></i></a>
                                    <ul class="sub-nav hidden">
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="contact-one.html">Contact Style 1</a></li>
                                        <li class="sub-nav-item"> <a class="sub-nav-link" href="contact-two.html">Contact Style 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu-right-block flex-item-center"><a class="button-share bg-orange border-transparent hover-text-orange hover-bg-white text-white text-button pl-36 pr-36 pt-12 pb-12 bora-100" href="contact-two.html">Get a quote</a>
                            <div class="menu-humburger display-none pointer"><i class="ph-bold ph-list fs-24 text-white"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu-mobile-block">
                <div class="menu-mobile-main">
                    <div class="container">
                        <ul class="menu-nav-mobile h-100 pt-4 pb-4">
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-8 pb-8 pl-12 pr-12 pointer home"><a class="fs-14 nav-link-mobile" href="#!">Home <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8 active"><a class="sub-nav-link fs-14" href="index.html">Payment Solution</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="home2.html">Financial Planning</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="home3.html">Online Banking</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="home4.html">Personal Finance</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="home5.html">Cryptocurrency Financial</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="home6.html">Blockchain</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer about"><a class="fs-14 nav-link-mobile" href="#!">About <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="about-one.html">About Style 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="about-two.html">About Style 2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer services"><a class="fs-14 nav-link-mobile" href="#!">Services <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="service-one.html">Service Style 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="service-two.html">Service Style 2</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="service-detail.html">Services Detail</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer case"><a class="fs-14 nav-link-mobile" href="#!">Case Studies <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="case-studies-one.html">Case Studies 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="case-studies-two.html">Case Studies 2</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="case-studies-detail.html">Case Studies Detail</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer pages"><a class="fs-14 nav-link-mobile" href="#!">Pages <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="faqs.html">FAQs</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="pricing.html">Pricing</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="partners.html">Partners</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer blog"><a class="fs-14 nav-link-mobile" href="#!">Blog <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="blog-list-one.html">Blog List 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="blog-list-two.html">Blog List 2</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="blog-grid.html">Blog Grid</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="blog-masonry.html">Blog Masonry</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="blog-detail-one.html">Blog Detail 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="blog-detail-two.html">Blog Detail 2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item-mobile h-100 flex-column gap-8 pt-4 pb-8 pl-12 pr-12 pointer contact"><a class="fs-14 nav-link-mobile" href="#!">Contact <i class="ph-fill ph-caret-down fs-12"></i></a>
                                <ul class="sub-nav-mobile">
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"><a class="sub-nav-link fs-14" href="contact-one.html">Contact Style 1</a></li>
                                    <li class="sub-nav-item pl-12 pr-12 pt-8 pb-8"> <a class="sub-nav-link fs-14" href="contact-two.html">Contact Style 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="close-block"> <i class="ph-bold ph-x"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
