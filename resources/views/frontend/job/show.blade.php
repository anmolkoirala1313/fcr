@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection
@section('css')
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

    <div class="blog-list style-detail mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="heading4 mt-16">
                        {{ $data['row']->name ?? $data['row']->title ?? '' }}
                    </div>
                    <div class="date flex-item-center gap-16 mt-16">
                        <div class="item-date flex-item-center"><i class="ph-bold ph-calendar-blank"></i><span class="ml-4 caption2">{{date('d M Y', strtotime($data['row']->created_at))}}</span></div>
                    </div>
                    <div class="blog-paragraph">
                        <div class="paragraph-heading text-center">
                            <div class="bg-img mt-3">
                                <img class="w-100 bora-16 lazy" data-src="{{ asset(imagePath($data['row']->image)) }}"  alt=""/></div>
                        </div>
                        <div class="paragraph-content mt-32">
                            <div class="body2 text-secondary text-align-justify custom-description">
                                {!!  $data['row']->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="blog-more-infor mt-32">
                        <div class="infor-above flex-between">
                            <div class="tags-cloud-block flex-item-center gap-12">
                                <div class="body3">Category:</div>
                                <div class="list-nav flex-item-center gap-12">
                                    @foreach($data['row']->categories as $category)
                                        <a class="caption2 pt-8 pb-8 pl-16 pr-16 bg-surface bora-20 hover-button-black" href="{{ route('frontend.job.category',$category->title)}}">
                                            {{$category->title}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="share-block flex-item-center gap-16">
                                <div class="caption2 pt-8 pb-8 pl-16 pr-16 bora-8 border-line-1px">
                                    Share
                                </div>
                                <div class="social-media flex-item-center gap-12">
                                    <a href="#" target="_blank"> <i class="icon-facebook" onclick='fbShare("{{route('frontend.job.show',$data['row']->slug)}}")'></i></a>
                                    <a href="#" target="_blank"> <i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                    <a href="#" target="_blank"> <i class="icon-twitter fs-14"  onclick='twitShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-32 line-x"></div>
                        <div class="infor-below flex-between pt-20 pb-20">
                            @if($data['previous'])
                                <div class="prev-block"> <a class="text-left" href="{{ route('frontend.blog.show', $data['previous']->slug) }}">
                                        <div class="text-button-uppercase text-blue">Previous</div>
                                        <div class="heading7 mt-4">{{ $data['previous']->title }} </div></a></div>
                            @endif
                            @if($data['next'] )
                                <div class="line-y"></div>
                                <div class="next-block"> <a class="text-right" href="{{ route('frontend.blog.show', $data['next']->slug) }}">
                                        <div class="text-button-uppercase text-blue">Next</div>
                                        <div class="heading7 mt-4">{{ $data['next']->title }}</div></a></div>
                            @endif
                        </div>
                        <div class="line-x"></div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="bora-12 bg-white box-shadow p-32 flex-columns-between">
                        <div class="heading6">Job Information</div>
                        <div class="infor-item flex-between mt-32">
                            <div class="text-button">Published Date:</div>
                            <div class="body3 text-secondary">
                                @if(@$data['row']->end_date >= date('Y-m-d'))
                                    {{date('M j, Y',strtotime(@$data['row']->start_date))}} - {{date('M j, Y',strtotime(@$data['row']->end_date))}}
                                @else
                                    Expired
                                @endif
                            </div>
                        </div>
                        @if($data['row']->company)
                            <div class="line-x mt-16"></div>
                            <div class="infor-item flex-between mt-32">
                                <div class="text-button">Companuy</div>
                                <div class="body3 text-secondary">{{ $data['row']->company ?? '' }}</div>
                            </div>
                        @endif
                        @if($data['row']->required_number)
                            <div class="line-x mt-16"></div>
                            <div class="infor-item flex-between mt-32">
                                <div class="text-button">Required Number</div>
                                <div class="body3 text-secondary">{{ $data['row']->required_number ?? '' }}</div>
                            </div>
                        @endif
                        @if($data['row']->salary)
                            <div class="line-x mt-16"></div>
                            <div class="infor-item flex-between mt-16">
                                <div class="text-button">Salary</div>
                                <div class="body3 text-secondary">{{ $data['row']->required_number ?? '' }}</div>
                            </div>
                        @endif
                        @if($data['row']->min_qualification)
                            <div class="line-x mt-16"></div>
                            <div class="infor-item flex-between mt-16">
                                <div class="text-button">Min Qualification</div>
                                <div class="body3 text-secondary">{{ $data['row']->min_qualification ?? '' }}</div>
                            </div>
                        @endif
                        @if($data['row']->formlink && $data['row']->end_date >= date('Y-m-d'))
                            <div class="line-x mt-16"></div>
                            <div class="infor-item flex-between mt-16">
                                <div class="text-button">Location</div>
                                <div class="body3 text-secondary"><a href="{{$data['row']->formlink}}" target="_blank">Submit response</a></div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
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
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
    </script>
@endsection
