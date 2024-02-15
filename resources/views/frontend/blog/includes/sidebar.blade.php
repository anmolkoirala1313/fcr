<div class="search-block bora-8 bg-surface">
    {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'search-form']) !!}
        <input class="bora-8 bg-surface w-100" type="text" name="for"  placeholder="Search"/>
    <button type="submit"><i class="ph ph-magnifying-glass"></i></button>
    {!! Form::close() !!}
</div>
@if(count( $data['categories']) > 0)

    <div class="cate-block mt-40">
        <div class="heading7">Categories</div>
        <div class="list-nav mt-16">
            @foreach($data['categories'] as $index=>$category)
                <a class="nav-item bora-8 flex-between p-12 pointer text-button text-secondary {{ $loop->first ? 'active':'' }}" href="{{ route($base_route.'category',$category->slug) }}">
                    {{$category->title}} ({{$category->blogs_count}})<i class="ph-bold ph-caret-right hidden"></i></a>
            @endforeach
        </div>
    </div>
@endif

@if(count( $data['latest']) > 0)
    <div class="recent-post-block mt-40">
        <div class="recent-post-heading heading7">Recent Posts</div>
        <div class="list-recent-post mt-16">
            @foreach($data['latest'] as $latest)
                <div class="recent-post-item d-flex item-start gap-16">
                    <a class="item-img" href="{{ route($module.'blog.show',$latest->slug) }}">
                        <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt=""/>
                    </a>
                    <div class="item-infor">
                        <a href="{{ route($module.'blog.show',$latest->slug) }}">
                            <div class="item-date flex-item-center">
                                <i class="ph-bold ph-calendar-blank"></i>
                                <span class="ml-4 caption2">{{date('d M Y', strtotime($latest->created_at))}}</span>
                            </div>
                            <div class="item-title mt-4">
                                {{ $latest->title }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
