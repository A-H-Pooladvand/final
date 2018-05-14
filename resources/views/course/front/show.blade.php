@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $course->title }}</h1>
                            <div class="entry-meta">
                                <a href="#">{{ jdate($course->created_at)->format('d %B Y') }}</a>
                            </div>

                            @if($course->image)
                                <img class="img-responsive thumbnail" src="{{ image_url($course->image,66,37, true) }}" alt="{{ $course->title }}" title="{{ $course->title }}">
                            @endif

                            <div class="single-content-detail">

                                @include('_includes.share')

                                <div class="right-content">
                                    <p>{!! $course->summary !!}</p>
                                    <hr>
                                    <p>{!! $course->content !!}</p>

                                    @component('_components.show_tags', ['tags' => $course->tags])
                                    @endcomponent
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">
                        <section class="widget widget_categories">
                            <h2 class="widget-title">چندرسانه ای</h2>
                            <ul>
                                <li><a href="{{ asset($course->file) }}" target="_blank">فایل PDF</a></li>
                                <li class="without-arrow">
                                    <!-- Video Player -->
                                    <video width="100%" controls>
                                        <source src="{{ asset($course->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </li>
                                <li class="without-arrow">
                                    <!-- Audio Player -->
                                    <audio controls>
                                        <source src="{{ asset($course->sound) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </li>
                            </ul>
                        </section>



                            {{--<section class="widget widget_categories">--}}
                                {{--<h2 class="widget-title">دوره(ها)ی این درس</h2>--}}
                                {{--<ul>--}}
                                    {{--@component('_components.show_courses_leftside', ['data' => $course->terms, 'module' => 'term'])--}}
                                    {{--@endcomponent--}}
                                {{--</ul>--}}
                            {{--</section>--}}

                            <section class="widget widget_categories">
                                <h2 class="widget-title">دسته بندی ها</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $categories, 'module' => 'category'])
                                    @endcomponent
                                </ul>
                            </section>

                        </aside>

                    </div>

                </div>

            </div>

        </section>

    </div>

@stop
