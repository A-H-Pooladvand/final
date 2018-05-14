@extends('_layouts.front.index')

@section('content')

    <div id="main-container">

        @include('_includes.breadcrumb')

        <div id="main-content">

            <section class="kopa-area kopa-area-16">
                <div class="container">

                    <div class="widget kopa-widget-listcourse">
                        <div class="widget-content module-listcourse-04">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="row">

                                        @foreach($events as $event)
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <article class="entry-item kopa-item-course-03">
                                                    <div class="entry-thumb">
                                                        <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">
                                                            <img src="{{ image_url($event->image, 36, 23) }}"
                                                                 alt="{{ $event->title }}" title="{{ $event->title }}">
                                                            <span>مشاهده جزئیات</span>
                                                        </a>
                                                    </div>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="{{ route('event.show', [$event->id, str_slug_fa($event->title)]) }}">{{ $event->title }}</a>
                                                        </h4>

                                                        <div class="course-excerpt">

                                                            {{--<div class="thumb">
                                                                <img src="images/testimonial/3.jpg" alt="">
                                                            </div>--}}

                                                            <p>{{ str_limit($event->summary, 190) }}</p>
                                                        </div>

                                                        {{--<div class="course-price">
                                                            <span class="price">$ 319</span>
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>--}}

                                                        <ul class="course-detail">
                                                            <li>
                                                                <small>
                                                                    <i class="fa fa-calendar"></i>
                                                                    {{--                                                            {{ jdate($event->created_at)->format('%d %B %Y') }}--}}
                                                                    {{ jdate($event->created_at)->format('Y/m/d') }}
                                                                </small>
                                                            </li>
                                                            @if($event->place)
                                                                <li>
                                                                    <i class="fa fa-map-marker"></i>
                                                                    <a href="{{ $event->place->detail_page }}">{{ $event->place->title }}</a>
                                                                </li>
                                                            @endif
                                                            {{--<li>--}}
                                                            {{--<i class="fa fa-comments-o"></i>--}}
                                                            {{--12--}}
                                                            {{--</li>--}}
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="text-center">
                                        {{ $events->links() }}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">

                                    <aside class="sidebar">

                                        <section class="widget widget_categories">
                                            <h2 class="widget-title">دسته بندی ها</h2>
                                            <ul>
                                                @component('_components.show_courses_leftside', ['data' => App\Event::getCategories(), 'module' => 'category'])
                                                @endcomponent
                                            </ul>
                                        </section>

                                    </aside>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

@stop