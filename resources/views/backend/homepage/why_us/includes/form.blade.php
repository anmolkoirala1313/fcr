@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('why_title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('why_title', null,['class'=>'form-control','id'=>'why_title','placeholder'=>'Enter title']) !!}
                    {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','readonly']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('why_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                    {!! Form::text('why_subtitle', null,['class'=>'form-control','id'=>'why_subtitle','placeholder'=>'Enter subtitle']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('why_description', 'Description', ['class' => 'form-label required']) !!}
                    {!! Form::textarea('why_description', null,['class'=>'form-control','id'=>'action_button','placeholder'=>'Enter description']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('why_video', 'Video', ['class' => 'form-label']) !!}
                    {!! Form::text('why_video', null,['class'=>'form-control','id'=>'why_video','placeholder'=>'Enter video link']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('image_input', 'Images', ['class' => 'form-label request']) !!}
                    {!! Form::file('image_input', ['class'=>'form-control','id'=>'image_input']) !!}
                </div>
                @if(isset($data['row']) && $data['row']->why_image)
                    <div class="col-xxl-4 col-xl-4 col-sm-6">
                        <div class="gallery-box card">
                            <div class="gallery-container">
                                <a class="image-popup" href="{{ asset(imagePath($data['row']->why_image))}}" title="">
                                    <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->why_image))}}" alt="" />
                                    <div class="gallery-overlay">
                                        <h5 class="overlay-caption">Image</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
