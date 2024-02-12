@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <div id="content">
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
                                <a class="main-item bora-16"> <i class="icon-lamp-gear"></i>
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
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="name" type="text" placeholder="Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="email"  type="text" placeholder="Email">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="number" type="text" placeholder="Number">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 pl-16 pr-16 pt-12 pb-12 bora-8" name="location" type="text" placeholder="Location">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class="w-100 bg-surface caption1 pl-12 pt-12 pb-12 bora-8 select2" name="categories">
                                            <option value>Select Category</option>
                                            @foreach($data['categories'] as $index=>$category)
                                                <option value="{{ $index }}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input class="w-100 bg-surface caption1 bora-8" style="padding: 9px;" type="file" placeholder="CV">
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

    <div class="service-block mt-100">
        <div class="container">
            <div class="heading3 text-center">Our Services</div>
            <div class="list-service row mt-40 row-gap-32">
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-cryptocurrency-trading.html">
                            <div class="heading flex-between"><i class="icon-coin-chair text-blue fs-60"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Cryptocurrency Trading</div>
                                <div class="body3 text-secondary mt-4">Experience the excitement and potential of the cryptocurrency market with our expert trading services.</div>
                            </div></a>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-portfolio-management.html">
                            <div class="heading flex-between"><i class="icon-hand-tick text-blue fs-60"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Portfolio Management</div>
                                <div class="body3 text-secondary mt-4">We analyze market trends, manage risks, and optimize your portfolio to maximize returns and achieve your financial goals.</div>
                            </div></a>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-investment-advice.html">
                            <div class="heading flex-between"><i class="icon-hand-house text-blue fs-60"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Investment Advice</div>
                                <div class="body3 text-secondary mt-4">Our team of experienced advisors will guide you in making informed investment decisions, whether you're a beginner or an experienced trader.</div>
                            </div></a>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-detail.html">
                            <div class="heading flex-between"><i class="icon-gear-warning text-blue fs-60"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Risk Management</div>
                                <div class="body3 text-secondary mt-4">We employ industry-leading tools and techniques to protect your investments and minimize potential losses.</div>
                            </div></a>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-research-analysis.html">
                            <div class="heading flex-between"><i class="icon-text-search text-blue fs-60"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Research and Analysis</div>
                                <div class="body3 text-secondary mt-4">We provide timely reports, market updates, and data-driven insights to help you make informed trading decisions</div>
                            </div></a>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-item hover-box-shadow bora-8 p-32 bg-white border-line-1px"><a class="service-item-main flex-column gap-16" href="service-education-resources.html">
                            <div class="heading flex-between"><i class="icon-education text-blue fs-52"></i>
                                <div class="number heading3 text-placehover"> </div>
                            </div>
                            <div class="desc">
                                <div class="heading7 hover-text-blue">Education and Resources</div>
                                <div class="body3 text-secondary mt-4">Expand your knowledge and skills in cryptocurrency trading through our educational resources.</div>
                            </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment-gateway-one mt-100 bg-surface">
        <div class="bg-img"> <img class="w-100 h-100" src="assets/images/component/gateway1.png" alt=""/></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="payment-infor flex-columns-between">
                        <div class="heading flex-item-center gap-16">
                            <div class="bg-img"> <img class="w-100" src="assets/images/component/avatar-gateway1.png" alt=""/></div>
                            <div class="text-button text-secondary">Trusted by 50M+ People <br>around the globe</div>
                        </div>
                        <div class="text">
                            <div class="heading3">Payment Gateway Services</div>
                            <div class="body3 text-secondary mt-24">We provide reliable and secure payment gateway services for businesses of all sizes. With our cutting-edge technology and 24/7 customer support, you can easily accept payments from customers all over the world.</div>
                        </div>
                        <div class="button-block flex-item-center gap-24"><a class="button-share box-shadow hover-button-black text-white bg-blue text-button pt-12 pb-12 pl-36 pr-36 bora-48" href="contact-two.html">Get started</a><a class="button-share box-shadow hover-button-black text-on-surface bg-white text-button pt-12 pb-12 pl-36 pr-36 bora-48 flex-item-center gap-8" href="contact-two.html"><i class="ph ph-phone fs-20"></i><span>(00) 123 456 789</span></a><img src="assets/images/component/gateway1-dot.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment-gateway-two mt-100">
        <div class="container">
            <div class="row row-gap-32 flex-item-center">
                <div class="col-12 col-xl-5 flex-column row-gap-20">
                    <div class="heading3">Payment Gateway Services</div>
                    <div class="body2 text-secondary">We provide reliable and secure payment gateway services for businesses of all sizes. With our cutting-edge technology and 24/7 customer support, you can easily accept payments from customers all over the world.</div>
                    <div class="list-service">
                        <div class="service-item flex-item-center"> <i class="ph-bold ph-check text-blue fs-24"> </i>
                            <div class="text-button ml-12">Debt evaluation and ability to repay</div>
                        </div>
                        <div class="service-item flex-item-center mt-12"><i class="ph-bold ph-check text-blue fs-24"> </i>
                            <div class="text-button ml-12">Calculation of credit limit</div>
                        </div>
                        <div class="service-item flex-item-center mt-12"><i class="ph-bold ph-check text-blue fs-24"> </i>
                            <div class="text-button ml-12">Consolidation of personal financial data</div>
                        </div>
                    </div>
                    <div class="button-block"><a class="button-share hover-bg-blue text-white bg-on-surface text-button display-inline-block pt-12 pb-12 pl-36 pr-36 bora-48" href="contact-two.html">Get started</a>
                    </div>
                </div>
                <div class="col-11 col-xl-7">
                    <div class="right pl-40">
                        <div class="bg-img"> <img class="w-100" src="assets/images/component/gateway2-bg.png" alt=""/></div>
                        <div class="feature-item pt-16 pb-16 pl-24 pr-24 bora-20 bg-white flex-item-center gap-16 box-shadow display-inline-flex"><i class="icon-list fs-28 bg-orange p-16 bora-20"> </i>
                            <div class="text">
                                <div class="heading7">2K+</div>
                                <div class="heading7 text-secondary">Projects</div>
                            </div>
                        </div>
                        <div class="feature-item pt-16 pb-16 pl-24 pr-24 bora-20 bg-white flex-item-center gap-16 box-shadow display-inline-flex"><i class="ph-fill ph-star fs-32 bora-20 text-yellow"></i>
                            <div class="text">
                                <div class="heading7">4.8</div>
                                <div class="heading7 text-secondary">Satisfaction</div>
                            </div>
                        </div>
                        <div class="feature-item pt-16 pb-16 pl-24 pr-24 bora-20 bg-white flex-item-center gap-16 box-shadow display-inline-flex"><i class="icon-user fs-32 bg-orange p-16 bora-20"> </i>
                            <div class="text">
                                <div class="heading7">5 Years</div>
                                <div class="heading7 text-secondary">Product Designer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faqs-block style-one mt-100">
        <div class="row row-gap-32">
            <div class="col-12 col-xl-6">
                <div class="bg-img"> <img src="assets/images/component/item1.png" alt=""/></div>
                <div class="desc bg-blue flex-center">
                    <div class="content gap-30"><i class="icon-hand-team icon-white"></i>
                        <div class="heading4 text-white">We aim for a world of convenience and value for many customers</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 bg-surface">
                <div class="content-main">
                    <div class="heading3">Frequently Asked questions</div>
                    <div class="list-question mt-32">
                        <div class="open question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">Which device can I use to enter your service?<i class="ph-bold ph-plus fs-20 p-8"></i></div>
                            <div class="content-question">
                                <div class="border-line"></div>
                                <div class="body3 text-secondary pt-16 pb-16">You can access our service from any device with an internet connection.</div>
                            </div>
                        </div>
                        <div class=" question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">What are your products and services?<i class="ph-bold ph-plus fs-20 p-8"></i></div>
                            <div class="content-question">
                                <div class="border-line"></div>
                                <div class="body3 text-secondary pt-16 pb-16">Our products and services include [describe your products/services briefly].</div>
                            </div>
                        </div>
                        <div class=" question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">How can I contact your customer support department?<i class="ph-bold ph-plus fs-20 p-8"></i></div>
                            <div class="content-question">
                                <div class="border-line"></div>
                                <div class="body3 text-secondary pt-16 pb-16">You can contact our customer support department by provide contact information during our business hours.</div>
                            </div>
                        </div>
                        <div class=" question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">Can I return items if I'm not satisfied?<i class="ph-bold ph-plus fs-20 p-8"></i></div>
                            <div class="content-question">
                                <div class="border-line"></div>
                                <div class="body3 text-secondary pt-16 pb-16">Yes, you can return items within [specify time frame] if you are not satisfied.</div>
                            </div>
                        </div>
                        <div class=" question-item hover-box-shadow pointer mt-20 pl-28 pr-28 bora-8 border-line-1px">
                            <div class="question-item-main flex-between pt-16 pb-16 heading7">Do you have a customer loyalty program?<i class="ph-bold ph-plus fs-20 p-8"></i></div>
                            <div class="content-question">
                                <div class="border-line"></div>
                                <div class="body3 text-secondary pt-16 pb-16">Yes, we have a customer loyalty program. Earn points with each purchase and enjoy exclusive benefits.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-request mt-100">
        <div class="container">
            <div class="heading flex-between">
                <div class="heading3">Request a free call back.</div>
                <div class="body3 text-secondary">Working with this agency has been a game-changer for our business Forem ipsum <br>dolor sit amet, consectetur adipiscing elit. </div>
            </div>
            <div class="form mt-40 flex-between gap-30">
                <div class="row w-100">
                    <div class="col-12 col-lg-4 col-md-6">
                        <input class="body3 pt-12 pb-12 pl-20 pr-20 bg-surface bora-8 w-100" type="text" placeholder="First name*"/>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <input class="body3 pt-12 pb-12 pl-20 pr-20 bg-surface bora-8 w-100" type="text" placeholder="Email"/>
                    </div>
                    <div class="col-12 col-lg-4 select-arrow-none">
                        <select class="body3 pt-12 pb-12 pl-20 pr-20 bg-surface bora-8 w-100" name="categories">
                            <option value="Financial Planning">Financial Planning</option>
                            <option value="Business Planning">Business Planning</option>
                            <option value="Development Planning">Development Planning</option>
                        </select><i class="ph ph-caret-down"></i>
                    </div>
                </div>
                <div class="button-block">
                    <button class="button-share bg-on-surface hover-bg-blue text-white text-button pl-28 pr-28 pt-12 pb-12 bora-48">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-list style-one mt-100">
        <div class="container">
            <div class="heading3 text-center">Latest News</div>
            <div class="row row-gap-32 mt-40">
                <div class="blog-item col-12 col-xl-4 col-sm-6" data-name=""><a class="blog-item-main" href="blog-detail-two.html">
                        <div class="bg-img w-100 overflow-hidden mb-minus-1"><img class="w-100 h-100 display-block" src="assets/images/blog/item11.png" alt="CI Financial sells RIA stake in new expansion strategy"/></div>
                        <div class="infor bg-white p-24">
                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">Makerting</div>
                            <div class="heading6 mt-8">CI Financial sells RIA stake in new expansion strategy</div>
                            <div class="date flex-item-center gap-16 mt-8">
                                <div class="author caption2 text-secondary">by <span class="text-on-surface">Avitex</span></div>
                                <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i><span class="ml-4 caption2">1 days ago</span></div>
                            </div>
                        </div></a></div>
                <div class="blog-item col-12 col-xl-4 col-sm-6" data-name=""><a class="blog-item-main" href="blog-detail-two.html">
                        <div class="bg-img w-100 overflow-hidden mb-minus-1"><img class="w-100 h-100 display-block" src="assets/images/blog/item13.png" alt="Barred financial advisors charged in $72 million criminal"/></div>
                        <div class="infor bg-white p-24">
                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">Development</div>
                            <div class="heading6 mt-8">Barred financial advisors charged in $72 million criminal</div>
                            <div class="date flex-item-center gap-16 mt-8">
                                <div class="author caption2 text-secondary">by <span class="text-on-surface">Avitex</span></div>
                                <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i><span class="ml-4 caption2">2 days ago</span></div>
                            </div>
                        </div></a></div>
                <div class="blog-item col-12 col-xl-4 col-sm-6" data-name=""><a class="blog-item-main" href="blog-detail-two.html">
                        <div class="bg-img w-100 overflow-hidden mb-minus-1"><img class="w-100 h-100 display-block" src="assets/images/blog/item12.png" alt="Retirement Planning Strategies"/></div>
                        <div class="infor bg-white p-24">
                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">Design</div>
                            <div class="heading6 mt-8">Retirement Planning Strategies</div>
                            <div class="date flex-item-center gap-16 mt-8">
                                <div class="author caption2 text-secondary">by <span class="text-on-surface">Avitex</span></div>
                                <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i><span class="ml-4 caption2">2 days ago</span></div>
                            </div>
                        </div></a></div>
                <div class="blog-item col-12 col-xl-4 col-sm-6 display-none col-lg-show" data-name=""><a class="blog-item-main" href="blog-detail-two.html">
                        <div class="bg-img w-100 overflow-hidden mb-minus-1"><img class="w-100 h-100 display-block" src="assets/images/blog/item10.png" alt="Helping a local business"/></div>
                        <div class="infor bg-white p-24">
                            <div class="caption2 pt-4 pb-4 pl-12 pr-12 bg-surface bora-40 display-inline-block">Makerting</div>
                            <div class="heading6 mt-8">Helping a local business</div>
                            <div class="date flex-item-center gap-16 mt-8">
                                <div class="author caption2 text-secondary">by <span class="text-on-surface">Avitex</span></div>
                                <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i><span class="ml-4 caption2">3 days ago</span></div>
                            </div>
                        </div></a></div>
            </div>
        </div>
    </div>
    <div class="partner-five-col style-one mt-100 bg-blue">
        <div class="list pt-32 pb-32">
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-1.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-2.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-3.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-4.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-5.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-1.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-2.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-3.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-4.png" alt=""/></div>
            <div class="bg-img flex-center"><img class="w-100" src="assets/images/partner/Logo-5.png" alt=""/></div>
        </div>
    </div><a class="scroll-to-top-btn" href="#header"><i class="ph-bold ph-caret-up"></i></a>
</div>

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>

@endsection
