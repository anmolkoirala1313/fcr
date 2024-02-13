<div class="blog-list style-one mt-80 mb-80">
    <div class="container">
        <div class="text-center">
            @if ($element->list_number_1)
                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                    {{ $element->list_number_1 ?? '' }}
                </div>
            @endif

            <div class="heading3 mt-16">{{ $element->list_number_2 ?? '' }}</div>
        </div>
        <div class="row mt-20">
            @foreach($element->pageSectionGalleries as $index=>$gallery)
                <div class="magnific-img mt-2">
                    <a class="image-popup-vertical-fit"
                       href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" title="">
                        <img src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}"
                             class="bora-16 {{ @$page_detail->slug=='legal-document' || @$page_detail->slug=='legal-documents' || @$page_detail->slug=='sample-documents' || @$page_detail->slug=='sample-document' ? '':'image-dimension' }}" alt="" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

