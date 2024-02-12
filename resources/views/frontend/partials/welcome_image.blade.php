<div class="bg-img w-100 bora-20">
    <img class="hover-scale display-block bora-20 lazy" data-src="{{ asset(imagePath($data['homepage']->image)) }}" alt="">
    @if ($data['homepage']->video )
        <a class="video-popup" href="{{$data['homepage']->video }}">
            <i class="ph-fill ph-play text-critical fs-28 bg-white p-28 bora-50 showPopup"></i>
        </a>
    @endif
</div>
