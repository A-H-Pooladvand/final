<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="row">
    <header class="widget-header style-01 meetings-events-title pull-left">
        <h3 class="widget-title">
            <a href="{{ route('event.index') }}">برنامه های آتی</a>
        </h3>
    </header>
        <div class="index-events">
            @foreach($events as $event)
                <div class="col-xs-12">
                    <div class="row">
                        <div class="row-events clearfix">

                            <div class="col-xs-3">
                                <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">
                                    <img class="media-object"
                                         src="{{ image_url($event->image, 7,7) }}"
                                         alt="{{ $event->title }}">
                                </a>
                            </div>
                            <div class="col-xs-9">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">
                                            <h5 class="">{{ $event->title }}</h5>
                                        </a>
                                    </div>
                                    <div class="col-xs-12">
                                        {{--@if($event->place)--}}
                                            {{--<i class="fa fa-map-marker"></i>--}}
                                            {{--<a href="{{ $event->place->detail_page }}">محل برگذاری</a>--}}
                                        {{--@endif--}}
                                        <div class="event-summary">
                                            {{ str_limit($event->summary, 40) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <small class="pull-right">
                                            <i class="fa fa-calendar"></i>
                                            {{ jdate($event->start_at)->format('%d %B %Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="col-xs-12">
                    <article class="entry-item kopa-item-course-01">
                        <div class="entry-thumb">
                            <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">
                                <img src="{{ image_url($event->image, 36,23) }}" alt="{{ $event->title }}" title="{{ $event->title }}">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                        <div class="entry-content">
                            --}}{{--<a href="#" class="course-category">دسته بندی</a>--}}{{--
                            <h4 class="entry-title">
                                <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">{{ $event->title }}</a>
                            </h4>

                            <ul class="course-detail">
                                @if($event->place)
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <a href="{{ $event->place->detail_page }}">{{ $event->place->title }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </article>
                </div>--}}
            @endforeach
        </div>
    </div>
</div>