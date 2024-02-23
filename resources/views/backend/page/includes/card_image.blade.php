@php $card_image = $data['section_elements']['card_image']; $card_image_section = $data['row']->pageSections->where('slug','card_image')->first();  @endphp

@if(count($card_image)>0)
    {!! Form::open(['url'=>route($module.'section-element.multiple-section-update'),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'POST','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $module.'section-element.store','method'=>'post','class'=>'needs-validation submit_form','id'=>'submit_form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@endif
<div class="row" id="card-image-form-ajax">
    <div class="col-md-12">
        <div class="card ctm-border-radius shadow-sm flex-fill">
            <div class="card-header">
                <h4 class="card-title mb-0">
                    {{ucfirst(str_replace('_',' ',$value))}} details
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <img class="img-responsive pb-4 border-bottom lazy" data-src="{{asset('assets/backend/images/pages/sections/'.$value.'.png')}}" width="100%"/>
                    <div class="col-lg-6 mt-3">
                        <div class="mb-1">
                            <label class="form-label required">Title </label>
                            <input type="text" class="form-control" name="heading[]" value="{{ $card_image[0]->heading ?? null}}" maxlength="60">
                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                            <input type="hidden" class="form-control" value="{{ $data['row']->id }}" name="page_id" required>
                            <div class="invalid-feedback">
                                Please enter the basic section title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="mb-1">
                            <label>Sub Title </label>
                            <input type="text" class="form-control" maxlength="60" name="subheading[]" value="{{ $card_image[0]->subheading ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="mb-1">
                            <label>Description </label>
                            <textarea class="form-control" maxlength="1000" rows="14" name="description[]">{!! $card_image[0]->description ?? null !!}</textarea>
                            <div class="invalid-feedback">
                                Please enter the description.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flash-details mt-5">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-striped table-centered
                        align-middle table-nowrap mb-0" id="card-table">
                            <thead class="text-muted table-light">
                            <tr>
                                <th scope="col" class="required">Title</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Image Position</th>
                                <th scope="col">Description</th>
                                <th scope="col" width="350px">Image</th>
                                <th scope="col" >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($card_image))
                                @foreach($card_image as $i => $detail)
                                    @include($view_path.'partials.card_image_details')
                                @endforeach
                            @else
                                @include($view_path.'partials.card_image_details')
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 border-top mt-3 mb-3">
                        <div class="hstack gap-2 pt-2">
                            <button type="button" title="Add Card Image" id="add_card_image"
                                    class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add Card</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3" id="card-image-form-button">
    <button type="submit" class="btn btn-success w-sm" id="card-image-form-submit">{{(count(@$card_image) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
