{{--<section class="portfolio-page" style="padding: 100px 0 40px;">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-5">--}}
{{--                <div class="appointment-page__top-left">--}}
{{--                    <div class="section-title__tagline-box">--}}
{{--                        <p class="section-title__tagline">{{ $element->first()->subtitle ?? '' }} </p>--}}
{{--                    </div>--}}
{{--                    <h3 class="appointment-page__top-title">{{ $element->first()->title ?? '' }}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-7">--}}
{{--                <div class="appointment-page__top-right">--}}
{{--                    <p class="appointment-page__top-text">{{ $element->first()->description ?? '' }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @if(count($element))--}}
{{--            <div class="row">--}}
{{--                <div class="table-responsive py-5">--}}
{{--                    <table class="table table-hover table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">S.N.</th>--}}
{{--                            <th scope="col">Title</th>--}}
{{--                            <th scope="col">Description</th>--}}
{{--                            <th scope="col">Document</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($element as $index=>$row)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                                <td>{{ $row->list_title ?? '' }}</td>--}}
{{--                                <td>{{ $row->list_description ?? '' }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ asset(filePath($row->image))}}" class="fw-medium link-primary" download>Download File</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</section>--}}

<div class="content-detail-block mt-100 pb-100">
    <div class="container">
        <div class="row row-gap-32">
            <div class="col-12 col-xl-12">
                <div class="content-para pr-55">
                    <div class="text text-center">
                        @if ($element->first()->subtitle )
                            <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                {{ $element->first()->subtitle ?? '' }}
                            </div>
                        @endif
                        <div class="heading3 mt-12 ">{{ $element->first()->title ?? '' }}</div>
                            <div class="right flex-columns-center gap-8 mt-12">
                                <div class="body3">{{ $element->first()->description ?? '' }}</div>
                            </div>
                    </div>

                    @if(count($element))
                            <div class=" py-5">
                                <table class="table table-hover table-bordered" data-toggle="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S.N.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Document</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($element as $index=>$row)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $row->list_title ?? '' }}</td>
                                            <td>{{ $row->list_description ?? '' }}</td>
                                            <td>
                                                <a href="{{ asset(filePath($row->image))}}" class="fw-medium link-primary" download>Download File</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
