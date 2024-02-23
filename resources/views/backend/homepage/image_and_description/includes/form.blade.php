@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('iad_title', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('iad_title', isset($data['row']) ? $data['row']->iad_title : null,['class'=>'form-control','id'=>'iad_title','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('iad_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
            {!! Form::text('iad_subtitle', isset($data['row']) ? $data['row']->iad_subtitle : null,['class'=>'form-control','id'=>'iad_subtitle','placeholder'=>'Enter subtitle']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('iad_button', 'Button', ['class' => 'form-label']) !!}
            {!! Form::text('iad_button', isset($data['row']) ? $data['row']->iad_button : null,['class'=>'form-control','id'=>'iad_button','placeholder'=>'Enter button']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('iad_link', 'Link', ['class' => 'form-label']) !!}
            {!! Form::text('iad_link', isset($data['row']) ? $data['row']->iad_link : null,['class'=>'form-control','id'=>'iad_link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3 editor">
            {!! Form::label('iad_description', 'Description', ['class' => 'form-label required']) !!}
            {!! Form::textarea('iad_description', isset($data['row']) ? $data['row']->iad_description : null,['class'=>'form-control ck-editor','id'=>'iad_description','placeholder'=>'Enter description']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('image_input', 'Images', ['class' => 'form-label request']) !!}
            {!! Form::file('image_input', ['class'=>'form-control','id'=>'image_input']) !!}
        </div>
        @if(isset($data['row']) && $data['row']->iad_image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->iad_image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->iad_image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
