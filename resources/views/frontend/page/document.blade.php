@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <style>
        .thead-theme{
            background: #ec673396;
        }
    </style>
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <div class="content-detail-block mt-100 pb-100">
        <div class="container">
            <div class="row row-gap-32">
                <div class="col-12 col-xl-12">
                    <div class="content-para pr-55">
                        <div class="text text-center">
                            @if ( $data['rows']->first()->subtitle )
                                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                                    {{  $data['rows']->first()->subtitle ?? ''  }}
                                </div>
                            @endif
                            <div class="heading3 mt-12 ">{{  $data['rows']->first()->title ?? '' }}</div>
                            <div class="right flex-columns-center gap-8 mt-12">
                                <div class="body3">{{  $data['rows']->first()->description ?? '' }}</div>
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
                                    @foreach($data['rows'] as $row)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $row->list_title ?? '' }}</td>
                                            <td>{{ $row->list_description ?? '' }}</td>
                                            <td>
                                                <a href="{{ asset(filePath($row->list_file))}}" class="fw-medium link-primary" download>Download File</a>
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

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
