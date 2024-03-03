@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup {
            background: transparent;
            width: 80%;
            height: auto; /* Set height to auto */
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1000;
        }

        .popup-header {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .popup-close {
            cursor: pointer;
            font-size: 35px; /* Increase the size of the close button */
            color: #042a54;
        }

        .popup-content {
            text-align: center;
        }

        .popup-content img {
            max-width: 100%;
            max-height: 100%;
        }

    </style>
@endsection
@section('content')
        @if ($data['sliders'])
            <div class="slider-block style-one">
                <div class="prev-arrow flex-center"><i class="ph-bold ph-caret-left text-white"></i></div>
                <div class="slider-main">
                    @foreach($data['sliders']  as $index=>$slider)
                        @php [$remaining, $last] = splitWordsFromEnd($slider->title, 2);
                        @endphp
                        <div class="slider-item">
                            <div class="bg-img">
                                <img class="w-100 h-100 animate__animated animate__fadeIn animate__delay-0-2s"
                                     src="{{ asset(imagePath($slider->image)) }}" alt=""/>
                            </div>
                            <div class="container">
                                <div class="text-content flex-columns-between">
                                    <div class="heading2 animate__animated animate__fadeInUp animate__delay-0-2s">
                                        {{ $remaining ?? '' }} <span class="text-blue w-350">{{ $last ?? '' }}</span>
                                    </div>
                                    <div class="body2 mt-12 text-secondary animate__animated animate__fadeInUp animate__delay-0-5s">{{ $slider->subtitle ?? '' }}</div>
                                    @if($slider->link)
                                        <div class="button-block mt-40 animate__animated animate__fadeInUp animate__delay-0-8s">
                                            <a class="button-share display-inline-block hover-button-black border-none bg-blue text-white text-button pl-28 pr-28 pt-12 pb-12 bora-8" href="{{ $slider->link ?? '' }}">
                                                {{ $slider->button ?? 'Learn More' }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="next-arrow flex-center"><i class="ph-bold ph-caret-right text-white"></i></div>
            </div>
        @endif

        @if($data['homepage']->description)
            <div class="about-home-five mt-100">
                <div class="container">
                    <div class="row ">
                        <div class=" {{ $data['homepage']->image_position == 'left' ? 'col-12 col-lg-5 col-md-8 col-sm-8':'col-12 col-lg-6' }}">
                            @if($data['homepage']->image_position == 'left')
                                @include($module.'partials.welcome_image')
                            @else
                                @include($module.'partials.welcome_description')
                            @endif

                        </div>
                        <div class="{{ $data['homepage']->image_position == 'right' ? 'col-12 col-lg-5 col-md-8 col-sm-8':'col-12 col-lg-6 ml-6' }}">
                            @if($data['homepage']->image_position == 'right')
                                @include($module.'partials.welcome_image')
                            @else
                                @include($module.'partials.welcome_description')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($data['homepage']->mission)
            <div class="service-block style-six pt-80 pb-100 mt-6 bg-on-surface">
                <div class="container">
                    <div class="row flex-columns-center">
    {{--                        <div class="heading3 text-white">Our services</div>--}}
    {{--                        <div class="body3 text-line text-center mt-24 col-12 col-lg-6">This is  simply dummy text printing and typesetting industry been industry's. This is  simply dummy text been industry. <a class="text-underline text-surface hover-text-orange" href="service-one.html">View case</a></div>--}}
                        <div class="col-12 list-service row">
                            <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <a class="main-item bora-16"> <i class="icon-rocket"></i>
                                    <div class="heading7 text-white hover-text-orange">Mission
                                    </div>
                                    <div class="body3 text-placehover mt-12">
                                        {{ $data['homepage']->mission ?? '' }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <a class="main-item bora-16"> <i class="icon-lamp-earth-white"></i>
                                    <div class="heading7 text-white hover-text-orange">Vision</div>
                                    <div class="body3 text-placehover mt-12">
                                        {{ $data['homepage']->vision ?? '' }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <a class="main-item bora-16"> <i class="icon-hand-protect-white"></i>
                                    <div class="heading7 text-white hover-text-orange">Value</div>
                                    <div class="body3 text-placehover mt-12">
                                        {{ $data['homepage']->value ?? '' }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($data['jobs']) > 0)
            <div class="benefit-block style-one mt-100">
                <div class="container">
                    <div class="heading text-center">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            Current demands
                        </div>
                        <div class="heading3 mt-20">Learn more about our latest<br> jobs</div>
                        <div class="right flex-columns-center gap-8 mt-12">
                            <a class="text-button" href="{{ route('frontend.job.index') }}">View All <i class="ph-bold ph-caret-double-right fs-12 mt-4"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-benefit mt-40">
                    <div class="row">
                        @foreach($data['jobs'] as $index=>$job)
                            <div class="col-12 col-xl-3 col-sm-6">
                                <div class="benefit-item">
                                    <div class="bg-img">
                                        <img class="jobs-cover display-block lazy" data-src="{{ asset(imagePath($job->image)) }}" alt="">
                                     </div>
                                    <div class="text flex-columns-between gap-12">
                                        <div class="heading5">
                                            <a class="text-white" href="{{ route('frontend.job.show', $job->slug) }}">
                                                {{ $job->title ?? '' }}
                                            </a>
                                        </div>
                                        <div class="body2 text-white">
                                            @if(@$job->end_date >= date('Y-m-d'))
                                                {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </div>
                                        <a class="flex-item-center gap-4" href="{{ route('frontend.job.show', $job->slug) }}">
                                            <div class="text-button text-white">Read More </div>
                                            <i class="ph-bold ph-caret-double-right fs-12 mt-4 text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(count($data['services']) > 0)
            <div class="blog-list style-six pt-100 pb-100 bg-surface">
                <div class="container">
                    <div class="heading flex-between">
                        <div class="heading4">OUR LATEST CATEGORIES</div>
                        <a class="text-underline hover-text-orange" href="{{ route('frontend.service.index') }}">View All <i class="ph-bold ph-caret-double-right fs-12 mt-4"></i></a>
                    </div>
                    <div class="row row-gap-32 mt-40">
                        @foreach($data['services'] as $index=>$service)
                            <div class="blog-item col-12 col-xl-4 col-sm-6">
                                <a class="blog-item-main" href="{{ route('frontend.service.show', $service->key) }}">
                                    <div class="bg-img w-100 overflow-hidden mb-minus-1">
                                        <img class="w-100 h-100 display-block lazy"  data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt="">
                                    </div>
                                    <div class="infor bg-white p-24">
{{--                                        <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">Makerting</div>--}}
                                        <div class="heading6 mt-8">{{ $service->title ?? '' }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($data['homepage']->action_title)
            <div class="form-cta-block benefit-two">
                <div class="bg-img cta-image">
                    <img class="lazy" data-src="{{ asset('assets/frontend/images/banner/form-benefit-two.png') }}" alt="">
                </div>
                <div class="container h-100">
                    <div class="row flex-between h-100 row-gap-20">
                        <div class="col-12 col-xl-5 col-lg-6">
                            <div class="heading3 text-white">{{ $data['homepage']->action_title ?? '' }}</div>
                            <div class="body1 text-line mt-16">{{ $data['homepage']->action_subtitle ?? '' }}</div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-block bora-16 bg-white p-28 flex-columns-between gap-20">
                                <div class="heading6">Send us a message</div>
                                <div class="row row-gap-20">
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="name" type="text" placeholder="Name" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="father_name" type="text" placeholder="Father Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="passport_number" type="text" placeholder="Passport Number" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="dob" type="date" placeholder="D.O.B" max="{{today()}}" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class="w-100 bg-surface caption1 pl-12 pt-12 pb-12 bora-8 select2" name="gender" required>
                                            <option value>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="number" type="text" placeholder="Number" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class="w-100 bg-surface caption1 pl-12 pt-12 pb-12 bora-8 select2" name="categories" required>
                                            <option value>Select Category</option>
                                            @foreach($data['categories'] as $index=>$category)
                                                <option value="{{ $index }}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class="w-100 bg-surface caption1 pl-12 pt-12 pb-12 bora-8 select2" name="gender">
                                            <option value>Select Latest Qualification</option>
                                            <option value="slc">SLC</option>
                                            <option value="plus2">Plus 2</option>
                                            <option value="bachelors">Bachelors</option>
                                            <option value="Masters">Masters</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 bora-8" style="padding: 9px;" type="file" placeholder="Passport Photo">
                                        <small>P.P</small>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 bora-8" style="padding: 9px;" type="file" placeholder="CV">
                                        <small>c.v</small>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="messsage" cols="10" rows="2" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="button-block">
                                    <button class="button-share hover-button-black bg-blue text-white text-button pl-36 pr-36 pt-12 pb-12 bora-48">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($data['homepage']->iad_title)
        <div class="service-block service-block-two pt-100 pb-100 bg-surface">
            <div class="container">
                <div class="row row-gap-32">
                    <div class="col-12 col-xl-6 flex-column gap-16">
                        <div class="text-about">
                            @if ($data['homepage']->iad_link)
                                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                    {{ $data['homepage']->iad_subtitle ?? '' }}
                                </div>
                            @endif
                            <div class="heading3 mt-1">{{ $data['homepage']->iad_title ?? '' }}</div>
                            <div class="body3 text-secondary text-align-justify mt-2 custom-description">
                                {!! $data['homepage']->iad_description  ?? '' !!}
                            </div>
                            @if ($data['homepage']->iad_link)
                                <div class="button-block flex-item-center gap-20 mt-2 pb-8">
                                    <a class="button-share text-white bg-blue hover-button-black text-button pt-14 pb-14 pl-36 pr-36 bora-48"
                                       href="{{ $data['homepage']->iad_link ?? '' }}">
                                        {{ $data['homepage']->iad_button ?? 'Know More' }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col12 col-xl-6">
                        <div class="list-service pl-40">
                            <img class="w-100 h-100 lazy" data-src="{{ asset(imagePath($data['homepage']->iad_image)) }}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(count($data['homepage']->coreValueDetail))
            <div class="service-block mt-100">
                <div class="container">
                    <div class="text-center">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            {{ $data['homepage']->core_subtitle ?? '' }}
                        </div>
                        <div class="heading3 mt-20">{{ $data['homepage']->core_title ?? '' }}</div>
                    </div>
                    <div class="list-service row mt-40 row-gap-32">
                        @foreach($data['homepage']->coreValueDetail as $index=>$core_value)
                            <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px">
                                    <a class="service-item-main flex-column gap-16">
                                        <div class="heading flex-between">
                                            <i class="{{ core_value_icon($index) }} text-blue fs-60"></i>
                                            <div class="number heading3 text-placehover"> </div>
                                        </div>
                                        <div class="desc">
                                            <div class="heading7 hover-text-blue">{{ $core_value->title ?? '' }}</div>
                                            <div class="body3 text-secondary mt-4 text-align-justify">
                                                {{ $core_value->description ?? '' }}
                                            </div>
                                        </div></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if($data['statistics']->ss_title)
            <div class="service-block service-block-two mt-60 mb-80">
                <div class="container" style="    border-top: 1px solid var(--line);     padding-top: 60px;">
                    <div class="row row-gap-32">
                        <div class="col-12 col-xl-4 flex-column gap-16">
                            <div class="text-sub-heading2 text-blue">{{ $data['statistics']->ss_subtitle ?? '' }}</div>
                            <div class="heading3">{{ $data['statistics']->ss_title ?? '' }}</div>
                            <div class="body3 text-secondary">
                                {{ $data['statistics']->ss_description ?? '' }}
                            </div>
                        </div>
                        <div class="col12 col-xl-8">
                            <div class="list-service pl-40">
                                <div class="row row-gap-32">
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <div class="service-item hover-box-shadow bora-8 p-24 bg-white box-shadow h-100">
                                            <a class="service-item-main flex-item-center gap-30">
                                                <div class="heading"><i class="icon-coin-hand text-blue fs-48"></i></div>
                                                <div class="desc">
                                                    <div class="heading7 hover-text-blue">Project Completed</div>
                                                    <div class="count-block flex-item-center">
                                                        <div class="counter heading3">{{ $data['homepage']->project_completed ?? '600'}}</div>
                                                        <span class="heading3">+</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <div class="service-item hover-box-shadow bora-8 p-24 bg-white box-shadow h-100">
                                            <a class="service-item-main flex-item-center gap-30">
                                                <div class="heading"><i class="icon-coin-pig text-blue fs-48"></i></div>
                                                <div class="desc">
                                                    <div class="heading7 hover-text-blue">Happy Clients</div>
                                                    <div class="count-block flex-item-center">
                                                        <div class="counter heading3">{{ $data['homepage']->happy_clients ?? '600'}}</div>
                                                        <span class="heading3">+</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <div class="service-item hover-box-shadow bora-8 p-24 bg-white box-shadow h-100">
                                            <a class="service-item-main flex-item-center gap-30">
                                                <div class="heading"><i class="icon-coin-virus text-blue fs-48"></i></div>
                                                <div class="desc">
                                                    <div class="heading7 hover-text-blue">Visa Approved</div>
                                                    <div class="count-block flex-item-center">
                                                        <div class="counter heading3">{{ $data['homepage']->visa_approved ?? '600'}}</div>
                                                        <span class="heading3">+</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <div class="service-item hover-box-shadow bora-8 p-24 bg-white box-shadow h-100">
                                            <a class="service-item-main flex-item-center gap-30">
                                                <div class="heading"><i class="icon-hand-protect text-blue fs-48"></i></div>
                                                <div class="desc">
                                                    <div class="heading7 hover-text-blue">Passive income earners</div>
                                                    <div class="count-block flex-item-center">
                                                        <div class="counter heading3">{{ $data['homepage']->success_stories ?? '600'}}</div>
                                                        <span class="heading3">+</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($data['homepage']->why_title)
            <div class="payment-gateway-one bg-surface">
                <div class="bg-img">
                    <img class="w-100 h-100 lazy" data-src="{{ asset(imagePath($data['homepage']->why_image)) }}" alt=""/>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="payment-infor flex-columns-between">
                                <div class="text">
                                    <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                        {{ $data['homepage']->why_subtitle ?? 'Why Choose Us' }}
                                    </div>
                                    <div class="heading3 mt-20">{{ $data['homepage']->why_title }}</div>
                                </div>
                                <div class="body3 text-secondary text-align-justify">
                                    {{ $data['homepage']->why_description ?? '' }}
                                </div>
                                @if ( $data['homepage']->why_link )
                                    <div class="button-block flex-item-center gap-20 mt-2 pb-8">
                                        <a class="button-share text-white bg-blue hover-button-black text-button pt-14 pb-14 pl-36 pr-36 bora-48" href="{{ $data['homepage']->why_link ?? '#' }}">
                                           {{ $data['homepage']->why_button ?? 'Learn More'}}
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($data['homepage']->recruitmentProcess))
            <div class="how-we-work pt-100 pb-100 bg-blue-surface">
                <div class="container">
                    <div class="text-button-uppercase text-orange">{{ $data['homepage']->recruitment_subtitle  ?? ''}}</div>
                    <div class="heading mt-12">
                        <div class="row w-100 row-gap-24 flex-item-center">
                            <div class="heading3 text-white col-12 col-xl-6">{{  $data['homepage']->recruitment_title ?? ''}}</div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($data['homepage']->recruitmentProcess as $index=>$process)
                            <div class="col-12 col-xl-3 col-md-6 col-sm-6 d-flex align-items-stretch">
                                <div class="main-item bora-16 p-32">
                                    <div class="number heading4 text-white bg-orange bora-20 display-inline-block">{{ $index < 9 ? '0'.($index+1): ($index+1) }}</div>
                                    <div class="heading7 text-white">{{ $process->title ?? '' }}</div>
                                    <div class="body3 text-placehover mt-8">
                                        {{ $process->description ?? '' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(count($data['director']) > 0)
            <div class="testimonials-six pt-100 pb-60 bg-on-surface">
                <div class="container">
                    <div class="text-center">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                           Closer Look
                        </div>
                        <div class="heading3 text-white mt-20">Message From Our Directors</div>
                    </div>
                    <div class="row">
                        @foreach($data['director'] as $index=>$director)
                            <div class="col-12 col-md-8 {{$loop->last ? 'touch':''}}">
                                <div class="row">
                                    <div class="col-12 col-md-7">
                                        <div class="comment-item bora-16">
                                            <div class="heading9 mt-12 text-white text-align-justify">
                                                {{ $director->description ?? '' }}
                                            </div>
                                            <div class="infor mt-16">
                                                <div class="text-button-small text-white">{{ $director->title ?? '' }}</div>
                                                <div class="caption2 fw-400 text-line mt-4">{{ $director->designation ?? '' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <img class="w-100 h-100" src="{{ asset(imagePath($director->image)) }}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($data['homepage']->grievance_title)
            <div class="form-cta-block benefit-three bg-surface">
                <div class="container h-100">
                    <div class="row  h-100">
                        <div class="col-12 col-lg-6">
                            <div class="text">
                                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                    {{ $data['homepage']->grievance_subtitle ?? '' }}
                                </div>
                                <div class="heading2 mt-20">{{ $data['homepage']->grievance_title }}</div>
                            </div>
                            <div class="body3 text-secondary text-align-justify">
                                {{ $data['homepage']->grievance_description ?? '' }}
                            </div>
                            @if($data['homepage']->grievance_link)
                                <div class="button-block mt-24 animate__animated animate__fadeInUp animate__delay-0-8s">
                                    <a class="button-share display-inline-block hover-button-black border-none bg-blue text-white text-button pl-28 pr-28 pt-12 pb-12 bora-8" href="{{ $data['homepage']->grievance_link }}" tabindex="0">
                                        {{ $data['homepage']->grievance_button ?? 'Contact Us' }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-block bora-16 bg-white p-28" style="width: 95%;">
                                @if($data['setting']->google_map)
                                    <iframe src="{{$data['setting']->google_map}}" style="border:0;width: 545px;height: 520px; border-radius: 8px" allowfullscreen="" loading="lazy"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($data['testimonials'])>0)
            <div class="testimonials-three mt-100">
                    <div class="container">
                        <div class="text-center">
                            <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                Closer Look
                            </div>
                            <div class="heading3 mt-20">Message From Our Directors</div>
                        </div>
                        <div class="list-comment row">
                            @foreach($data['testimonials'] as $index=>$testimonial)
                                <div class="col-12 col-lg-4 display-flex align-items-stretch h-100 col-sm-6 comment-item">
                                    <div class="item p-32 bg-white bora-12 box-shadow hover-box-shadow">
                                        <div class="body3 text-secondary">"{{ $testimonial->description }}"</div>
                                        <div class="infor mt-16 flex-item-center gap-16">
                                            <div class="avatar">
                                                <img class="w-60 h-60" src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                            </div>
                                            <div class="desc">
                                                <div class="text-button">{{ $testimonial->title ?? '' }}</div>
                                                <div class="caption2 text-secondary mt-4">{{ $testimonial->position ?? '' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        @endif

        @if(count($data['blogs'])>0)
            <div class="blog-list style-one mt-100">
                <div class="container">
                    <div class="text-center">
                        <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                            News and articles
                        </div>
                        <div class="heading3 mt-20">Latest Stories and Blogs</div>
                    </div>
                    <div class="row row-gap-32 mt-40">
                        @foreach($data['blogs'] as $blog)
                            <div class="blog-item col-12 col-xl-4 d-flex align-items-stretch col-sm-6" data-name="">
                                <a class="blog-item-main" href="{{ route('frontend.blog.show', $blog->slug) }}">
                                    <div class="bg-img w-100 overflow-hidden mb-minus-1">
                                        <img class="w-100 h-100 display-block lazy" data-src="{{ asset(imagePath($blog->image))}}" alt=""/>
                                    </div>
                                    <div class="infor bg-white p-24">
                                        <div class="date flex-item-center gap-16 mt-8">
                                            <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i>
                                                <span class="ml-4 caption2">{{date('d M Y', strtotime($blog->created_at))}}</span>
                                            </div>
                                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">{{ $blog->blogCategory->title ?? '' }}</div>

                                        </div>
                                        <div class="heading6 mt-8">{{ $blog->title ?? '' }}</div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(count( $data['clients']) > 0)
            <div class="partner-five-col style-one mt-100 bg-surface">
                <div class="list pt-32 pb-32">

                    @foreach($data['clients'] as $index=>$client)
                        <div class="bg-img flex-center"><img class="w-100" src="{{ asset(imagePath($client->image)) }}" alt=""/></div>
                    @endforeach

                </div>
            </div>
        @endif

        @if ($data['setting']->popup_image)
            @include('frontend.includes.modal')
        @endif

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select2').select2();

        $(document).ready(function () {
            let popup2 = "{{$data['setting']->popup_image}}";

            // Open Popup on Page Load
            if (popup2 !== "" && popup2 !== null) {
                $("#customPopup").fadeIn();
            }

            // Close Popup
            $("#closePopup").click(function () {
                $("#customPopup").fadeOut();
            });

            // Close Popup on outside click
            $(document).mouseup(function (e) {
                var popup = $(".popup");
                if (!popup.is(e.target) && popup.has(e.target).length === 0) {
                    $("#customPopup").fadeOut();
                }
            });
        });
    </script>

@endsection
