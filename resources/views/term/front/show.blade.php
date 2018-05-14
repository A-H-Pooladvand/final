@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $term->title }}</h1>
                            <div class="entry-meta">
                                <i class="fa fa-calendar"></i>
                                <a href="#">{{ jdate($term->created_at)->format('d %B Y') }}</a>
                            </div>

                            <div class="single-post-img">
                                <img class="img-responsive thumbnail" src="{{ image_url($term->image,66,37, true) }}"
                                     alt="{{ $term->title }}" title="{{ $term->title }}">
                            </div>


                            <div class="single-content-detail">
                                @include('_includes.share')

                                <div class="right-content">
                                    <p>{!! $term->description !!}</p>

                                    @component('_components.show_tags', ['tags' => $term->tags])
                                    @endcomponent
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">

                            <section class="widget widget_categories">
                                <h2 class="widget-title">مشخصات دوره</h2>
                                <ul>
                                    @if($term->place)
                                        <li class="without-arrow">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="{{ $term->place->detail_page }}">{{ $term->place->title }}</a>
                                        </li>
                                    @endif
                                    <li class="without-arrow">
                                        <i class="fa fa-circle-o"></i>
                                        {!! $term->summary !!}
                                    </li>
                                </ul>
                            </section>
                            <section class="widget widget_categories">
                                <h2 class="widget-title">دروس این دوره</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $term->courses, 'module' => 'course', 'term_id' => $term->id])
                                    @endcomponent
                                </ul>
                            </section>

                            {{--<section class="widget widget_categories">--}}
                            {{--<h2 class="widget-title">دسته بندی ها</h2>--}}
                            {{--<ul>--}}
                            {{--@component('_components.show_courses_leftside', ['data' => $term->categories, 'module' => 'category'])--}}
                            {{--@endcomponent--}}
                            {{--</ul>--}}
                            {{--</section>--}}

                        </aside>

                    </div>

                </div>

            </div>

        </section>

    </div>

@stop
