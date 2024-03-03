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
                    {!! Form::label('ss_title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('ss_title', null,['class'=>'form-control','id'=>'ss_title','placeholder'=>'Enter title']) !!}
                    {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','readonly']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('ss_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                    {!! Form::text('ss_subtitle', null,['class'=>'form-control','id'=>'ss_subtitle','placeholder'=>'Enter subtitle']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('ss_description', 'Description', ['class' => 'form-label required']) !!}
                    {!! Form::textarea('ss_description', null,['class'=>'form-control','id'=>'ss_description','placeholder'=>'Enter description']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="nosticky-side-div">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"> Site Statistics </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="position-relative mb-3">
                                    {!! Form::label('project_completed', 'Project Completed', ['class' => 'form-label']) !!}
                                    {!! Form::text('project_completed', null, ['class'=>'form-control','id'=>'project_completed','placeholder'=>'Project Completed']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="position-relative mb-3">
                                    {!! Form::label('happy_clients', 'Happy Clients', ['class' => 'form-label']) !!}
                                    {!! Form::text('happy_clients', null, ['class'=>'form-control','id'=>'happy_clients','placeholder'=>'Happy Clients']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="position-relative mb-3">
                                    {!! Form::label('visa_approved', 'Visa Approved', ['class' => 'form-label']) !!}
                                    {!! Form::text('visa_approved', null, ['class'=>'form-control','id'=>'visa_approved','placeholder'=>'Visa Approved']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="position-relative mb-3">
                                    {!! Form::label('success_stories', 'Success Stories', ['class' => 'form-label']) !!}
                                    {!! Form::text('success_stories', null, ['class'=>'form-control','id'=>'success_stories','placeholder'=>'Success Stories']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 border-top mt-3">
                            <div class="hstack gap-2">
                                {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end card body -->
            </div>


        </div>
    </div>
</div>


{!! Form::close() !!}
