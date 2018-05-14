@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $book->title }}</h1>
                            <div class="entry-meta">
                                <i class="fa fa-calendar"></i>
                                <a href="#">{{ jdate($book->created_at)->format('d %B Y') }}</a>
                            </div>

                            <div class="single-content-detail">
                                <object data="{{ asset($book->file) }}" type="application/pdf" width="100%" height="800px">
                                    <p><b>توجه: </b>: مرورگر شما از فایل pdf پشتیبانی نمی کند. این فایل را از : <a href="{{ asset($book->file) }}">اینجا</a> دانلود کنید.</p>
                                </object>
                            </div>

                            <div class="single-content-detail">

{{--                                @include('_includes.share')--}}
                                <div class="right-content">

                                    @component('_components.show_tags', ['tags' => $book->tags])
                                    @endcomponent
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">


                            <div class="single-post-img">
                                <img class="img-responsive thumbnail" src="{{ image_url($book->image,66,37, true) }}" alt="{{ $book->title }}"
                                     title="{{ $book->title }}">

                            </div>


                            <div class="single-content-detail">
                                <div class="right-content">
                                    <p>{!! $book->description !!}</p>

                                </div>
                            </div>

                            <section class="widget widget_categories">
                                <h2 class="widget-title">دسته بندی ها</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $book->categories, 'module' => 'category'])
                                    @endcomponent
                                </ul>
                            </section>

                            <section class="widget widget_categories">
                                <h2 class="widget-title">فایل</h2>
                                <ul>
                                    <li class="cat-item">
                                        <a target="_blank" download="{{ str_slug_fa($book->title, "_") . "." . $book->extension }}" href="{{ asset($book->file) }}">دانلود فایل</a>
                                    </li>
                                </ul>
                            </section>

                        </aside>

                    </div>

                </div>

            </div>

        </section>

    </div>

@stop
