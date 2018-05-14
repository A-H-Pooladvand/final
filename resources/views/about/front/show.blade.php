@extends('_layouts.front.index')

@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area kopa-area-20">
            <div class="container">
                <div class="widget kopa-widget-course_info">
                    <div class="widget-content module-course_info-01">

                        <div class="right-content">

                            <div class="course-author">
                                <div class="thumb">
                                    <img src="{{ image_url($about->image, 27, 40, true) }}" alt="{{ $about->title }}" title="{{ $about->title }}">
                                </div>
                                <div class="content">
                                    <h4>{{ $about->title }}</h4>
                                    <div class="text">
                                        <i class="fa fa-quote-left"></i>
                                        <p>{!! $about->content !!}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


@endsection