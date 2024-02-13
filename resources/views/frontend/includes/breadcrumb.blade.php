<div class="slider-sub ">
    <div class="bg-img">
        <img class="lazy" data-src="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
asset('assets/frontend/images/banner/'.$breadcrumb_image) }}" alt="">
    </div>
    <div class="container">
        <div class="text-nav">
            <div class="heading-nav gap-4 mt-32">
                <a class="hover-underline caption1 text-white" href="/">Home</a>
                <i class="ph ph-caret-double-right text-white"></i>
                @if($page_method !=='index')
                    <a class="hover-underline caption1 text-white" href="{{route($base_route.'index')}}">{{ $page }}</a>
                    <i class="ph ph-caret-double-right text-white"></i>
                    <div class="caption1 text-white">{{ $page_title }}</div>
                @else
                    <div class="caption1 text-white">{{ $page_title }}</div>
                @endif
            </div>
            <div class="heading3 mt-32 text-white"> {{ $page_title }}</div>

        </div>
    </div>
</div>
