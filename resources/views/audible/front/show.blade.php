@extends('_layouts.front.index')

@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="single-content">

                            <h1 class="single-post-title">{{ $audible->title }}</h1>
                            <div class="entry-meta">
                                <i class="fa fa-calendar"></i>
                                <a href="#">{{ jdate($audible->created_at)->format('d %B Y') }}</a>
                            </div>

                            <div class="single-post-img">
                                <img class="img-responsive thumbnail" src="{{ image_url($audible->image, 192,50, true) }}" alt="{{ $audible->title }}" title="{{ $audible->title }}">
                            </div>


                            <div class="single-content-detail">

                                <div class="kopa-social-links style-04">
                                    @include('_includes.share')
                                </div>
                                <div class="right-content">
                                    <p>{{ $audible->description }}</p>

                                    @component('_components.show_tags', ['tags' => $audible->tags])
                                    @endcomponent

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">
                            {{--<section class="widget widget_categories">
                                <h2 class="widget-title">چندرسانه ای</h2>
                                <ul>
                                    <li><a href="{{ $audible->file }}" target="_blank">فایل PDF</a></li>
                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">فایل صوتی</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#myModal">فایل ویدئویی</a></li>
                                </ul>
                            </section>--}}

                            <section class="widget widget_categories">
                                <h2 class="widget-title">دسته بندی ها</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $audible->categories, 'module' => 'category'])
                                    @endcomponent
                                </ul>
                            </section>

                            <section class="widget widget_categories">
                                <h2 class="widget-title">چندرسانه ای</h2>
                                <ul>
                                    <li><a href="{{ asset($audible->file) }}" target="_blank">فایل PDF</a></li>
                                    <li class="without-arrow">
                                        <!-- Video Player -->
                                        <video width="100%" controls>
                                            <source src="{{ asset($audible->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </li>
                                    <li class="without-arrow">
                                        <!-- Audio Player -->
                                        <audio controls>
                                            <source src="{{ asset($audible->sound) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </li>
                                </ul>
                            </section>
                        </aside>

                    </div>

                </div>
            </div>
        </section>

        <{{--!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">چندرسانه ای</h4>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Video Player -->
                        <video controls>
                            <source src="{{ $audible->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <!-- Audio Player -->
                        <audio controls>
                            <source src="{{ $audible->sound }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بـــستن</button>
                    </div>
                </div>

            </div>
        </div>--}}

    </div>

@stop

