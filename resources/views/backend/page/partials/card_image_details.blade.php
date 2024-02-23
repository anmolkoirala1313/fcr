<tr>
    <td>
        {!! Form::text('list_header[]',  isset($detail) ? $detail->list_title:null, ['class'=>'form-control list_title','placeholder'=>'Enter title','required']) !!}
        {!! Form::hidden('list_id[]',  isset($detail) ? $detail->id:null, ['class'=>'form-control list_id','readonly']) !!}
    </td>
    <td>
        {!! Form::text('button[]',  isset($detail) ? $detail->button:null, ['class'=>'form-control button','placeholder'=>'Enter designation']) !!}
    </td>
    <td>
        {!! Form::select('image_position[]', ['left'=>'Left','right'=>'Right'], isset($detail) ? $detail->image ?? 'left' : 'left',['class'=>'form-select','placeholder'=>'Select Image Position']) !!}
    </td>
    <td>
        {!! Form::textarea('list_description[]', isset($detail) ? $detail->list_description:null, ['class'=>'form-control list_description','placeholder'=>'Enter description']) !!}
    </td>
    <td>
        {!! Form::file('image_input[]', ['class'=>'form-control',isset($detail) ? '':'required']) !!}
        @if(isset($detail) && $detail->list_image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($detail->list_image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($detail->list_image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </td>
    <td>
        <button type="button" title="Remove Card Image"
                class="btn btn-outline-danger waves-effect waves-light remove_card_row"><i class="ri-delete-bin-6-line"></i></button>
    </td>
</tr>
