@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $meeting->title }}</h1>
                            <div class="entry-meta">
                                <a href="#">{{ jdate($meeting->created_at)->format('d %B Y') }}</a>
                                @if($meeting->place)
                                    <a href="{{ $meeting->place->detail_page }}">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $meeting->place->title }}
                                    </a>
                                @endif
                            </div>

                            <div class="single-post-img">
                                <img src="{{ image_url($meeting->image,66,37, true) }}" alt="{{ $meeting->title }}" title="{{ $meeting->title }}">
                            </div>
                            <div class="single-content-detail">

                                @include('_includes.share')

                                <div class="right-content">
                                    <p>{{ $meeting->summary }}</p>
                                    <hr>
                                    <p>{!! $meeting->description !!}</p>

                                    @component('_components.show_tags', ['tags' => $meeting->tags])
                                    @endcomponent

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">

                            {{--@if(! $latest_news->isEmpty())

                                <section class="widget widget_recent_entries">

                                    <h2 class="widget-title">آخرین اخبار</h2>

                                    <ul>
                                        @if(! $latest_news->isEmpty())
                                            @foreach($latest_news as $latest)
                                                <li>
                                                    <article class="entry-item">
                                                        <div class="entry-item">
                                                            <div class="entry-thumb">
                                                                <a href="{{ route('news.show', $latest->id) }}"><img src="{{ image_url($latest->image,6,4,true) }}" alt="{{ $latest->title }}" title="{{ $latest->title }}"></a>
                                                            </div>
                                                            <div class="entry-content">
                                                                <h4 class="entry-title">
                                                                    <a href="{{ route('news.show', $latest->id) }}">{{ $latest->title }}</a>
                                                                </h4>
                                                                <a href="{{ route('news.show', $latest->id) }}">{{ $latest->summary }}</a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </section>

                            @endif
--}}
                            <section class="widget widget_categories">
                                <h2 class="widget-title">دسته بندی ها</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $meeting->categories, 'module' => 'category'])
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
