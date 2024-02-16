<div class="popup-container" id="customPopup">
    <div class="popup">
        <div class="popup-header">
            <span class="popup-close" id="closePopup">&times;</span>
        </div>
        <div class="popup-content">
            @if ($data['setting']->popup_image)
                <img  class="w-100" src="{{ asset(imagePath($data['setting']->popup_image))}}" alt="">
            @endif
        </div>
    </div>
</div>
