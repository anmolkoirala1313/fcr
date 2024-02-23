<div class="service-block style-about-two pt-60 pb-60 style-three">
    <div class="container">
        <div class="text text-center">
            @if ($element->first()->subtitle )
                <div class="text-sub-heading2 text-white pt-8 pb-8 pl-16 pr-16 bg-blue bora-8 display-inline-block">
                    {{ $element->first()->subtitle ?? '' }}
                </div>
            @endif

            <div class="heading3 mt-12 ">{{ $element->first()->title ?? '' }}</div>
        </div>

        <div class="list-service mt-40 pt-12">
            <div class="row">
                @foreach($element as $index=>$row)
                    <div class="card custom-card mt-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-{{ $row->image == 'left' ? '5':'7' }}">
                                @if($row->image == 'left')
                                    @include($view_path.'partials.card_image')
                                @else
                                    @include($view_path.'partials.card_text')
                                @endif
                            </div>
                            <div class="col-12 col-md-{{ $row->image == 'left' ? '7':'5' }}">
                                @if($row->image == 'right')
                                    @include($view_path.'partials.card_image')
                                @else
                                    @include($view_path.'partials.card_text')
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
