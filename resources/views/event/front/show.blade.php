@extends('_layouts.front.index')

@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area kopa-area-18">
            <div class="container">
                <div class="single-event single-content">


                    <div class="row">

                        <div class="col-md-8 col-sm-12 col-xs-12">

                            <h1 class="single-post-title">{{ $event->title }}</h1>
                            <div class="entry-meta">

                                <i class="fa fa-calendar"></i>
                                <a href="#">{{ jdate($event->created_at)->format('d %B Y') }}</a>

                                @if($event->place)
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    <a href="{{ $event->place->detail_page }}">{{ $event->place->title }}</a>
                                @endif
                            </div>

                            <div class="single-post-img">
                                <img src="{{ image_url($event->image,72,35,true) }}" alt="{{ $event->title }}" title="{{ $event->title }}">
                            </div>
                            <h3 class="single-event-title">{{ $event->summary }}</h3>
                            <div class="single-content-detail">
                                <div class="kopa-social-links style-04">
                                    @include('_includes.share')
                                </div>
                                <div class="right-content">
                                    <p>{!! $event->content !!}</p>


                                    @component('_components.show_tags', ['tags' => $event->tags])
                                    @endcomponent
                                </div>
                            </div>

                        </div>


                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="right-content">

                                <div class="widget widget_categories">
                                    <h4 class="widget-title">دسته بندی ها</h4>
                                    <ul>
                                        @component('_components.show_courses_leftside', ['data' => $event->categories, 'module' => 'category'])
                                        @endcomponent
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>

@stop