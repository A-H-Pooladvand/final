@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $news->title }}</h1>

                            <div class="entry-meta">
                                <i class="fa fa-calendar"></i>
                                <a href="#">{{ jdate($news->created_at)->format('d %B Y') }}</a>
                            </div>

                            <div class="single-post-img">
                                <img src="{{ image_url($news->image,66,37, true) }}" alt="{{ $news->title }}" title="{{ $news->title }}">
                                <div class="entry-date style-01">
                                    <span>{{ jdate($news->created_at)->format('d') }}</span>
                                    <p>{{ jdate($news->created_at)->format('Y/m') }}</p>
                                </div>
                            </div>


                            <div class="single-content-detail">

                                @include('_includes.share')

                                <div class="right-content">
                                    <h5>{{ $news->summary }}</h5>
                                    <p>{!! $news->content !!}</p>

                                    @component('_components.show_tags', ['tags' => $news->tags])
                                    @endcomponent

                                </div>
                            </div>

                            @if(! $news->galleries->isEmpty())

                                @foreach($news->galleries as $gallery)

                                    <img src="{{ image_url($gallery->path) }}" alt="{{ $gallery->path }}" title="{{ $gallery->path }}">

                                @endforeach

                            @endif

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">

                            <section class="widget widget_categories">
                                <h2 class="widget-title">دسته بندی ها</h2>
                                <ul>
                                    @component('_components.show_courses_leftside', ['data' => $news->categories, 'module' => 'category'])
                                    @endcomponent
                                </ul>
                            </section>

                            @if(! $latest_news->isEmpty())
                                <section class="widget widget_recent_entries">

                                    <h2 class="widget-title">آخرین اخبار</h2>

                                    <ul>
                                        @if(! $latest_news->isEmpty())
                                            @foreach($latest_news as $latest)
                                                <li>
                                                    <article class="entry-item">
                                                        <div class="entry-item">
                                                            <div class="entry-thumb">
                                                                <a href="{{ route('news.show', [$latest->id, str_slug_fa($latest->title)]) }}"><img src="{{ image_url($latest->image,6,4,true) }}" alt="{{ $latest->title }}" title="{{ $latest->title }}"></a>
                                                            </div>
                                                            <div class="entry-content">
                                                                <h4 class="entry-title">
                                                                    <a href="{{ route('news.show', [$latest->id, str_slug_fa($latest->title)]) }}">{{ $latest->title }}</a>
                                                                </h4>
                                                                <a href="{{ route('news.show', [$latest->id, str_slug_fa($latest->title)]) }}">{{ jdate($news->created_at)->format('d %B Y') }}</a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </section>
                            @endif

                        </aside>

                    </div>

                </div>

            </div>

        </section>

    </div>

@stop
