<div class="col-md-8 col-sm-8 col-xs-12">
    <header class="widget-header style-01 meetings-events-title pull-left">
        <h3 class="widget-title">
            <a href="{{ route('meeting.index') }}">نشست های علمی</a>
        </h3>
    </header>
    <div class="row">

        <div class="index-meetings">
            <div class="col-xs-12">
                <div class="row">
        @foreach($meetings as $meeting)
            <div class="col-md-4 col-sm-4 col-xs-12">
                <article class="entry-item kopa-item-course-01">
                    <div class="entry-thumb">
                        <a href="{{ route('meeting.show', [$meeting->id, str_slug_fa($meeting->title)]) }}">
                            <img src="{{ image_url($meeting->image, 36,23) }}" alt="{{ $meeting->title }}" title="{{ $meeting->title }}">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="entry-content">
                        {{--<a href="#" class="course-category">دسته بندی</a>--}}
                        <h4 class="entry-title">
                            <a href="{{ route('meeting.show', [$meeting->id, str_slug_fa($meeting->title)]) }}">{{ $meeting->title }}</a>
                        </h4>

                        <ul class="course-detail">
                            @if($meeting->place)
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <a href="{{ $meeting->place->detail_page }}">{{ $meeting->place->title }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </article>
            </div>
        @endforeach
        </div>
    </div>
    </div>
    </div>
</div>