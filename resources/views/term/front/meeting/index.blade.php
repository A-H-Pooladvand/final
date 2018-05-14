@extends('_layouts.front.index')

@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area kopa-area-16">
            <div class="container">

                <div class="widget kopa-widget-listcourse">
                    <div class="widget-content module-listcourse-04">
                        <div class="row">

                            @foreach($meetings as $meeting)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <article class="entry-item kopa-item-course-03">
                                        <div class="entry-thumb">
                                            <a href="{{ route('meeting.show', $meeting->id) }}">
                                                <img src="{{ image_url($meeting->image, 36, 23) }}" alt="{{ $meeting->title }}" title="{{ $meeting->title }}">
                                                <span>مشاهده جزئیات</span>
                                            </a>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="{{ route('meeting.show', $meeting->id) }}">{{ $meeting->title }}</a>
                                            </h4>

                                            <div href="{{ route('meeting.show', $meeting->id) }}" class="course-excerpt">

                                                {{--<div class="thumb">
                                                    <img src="images/testimonial/3.jpg" alt="">
                                                </div>--}}

                                                <p>{{ str_limit($meeting->summary, 200) }}</p>
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
                                                        {{--                                                            {{ jdate($meeting->created_at)->format('d %B Y') }}--}}
                                                        {{ jdate($meeting->created_at)->format('Y/m/d') }}
                                                    </small>
                                                </li>
                                                @if($meeting->place)
                                                    <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        <a href="{{ $meeting->place->detail_page }}">{{ $meeting->place->title }}</a>
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
                            {{ $meetings->links() }}
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>

@stop


