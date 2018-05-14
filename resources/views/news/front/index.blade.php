@extends('_layouts.front.index')


@section('content')


    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area kopa-area-16">
            <div class="container">
                <div class="widget kopa-widget-news">
                    <div class="widget-content module-news-05">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="row">

                                    @foreach($news as $item)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <article class="list-interviews entry-item  kopa-item-01">
                                                <div class="entry-thumb">
                                                    <a href="{{ route('news.show', [$item->id, str_slug_fa($item->title)]) }}">
                                                        <img src="{{ image_url($item->image,36,25,true) }}"
                                                             alt="{{ $item->title }}" title="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h4 class="entry-title">
                                                        <a href="{{ route('news.show', [$item->id, str_slug_fa($item->title)]) }}">{{ $item->title }}</a>
                                                    </h4>
                                                    {{--<div class="entry-meta">--}}
                                                        {{--<a href="{{ route('news.show', [$item->id, str_slug_fa($item->title)]) }}">--}}
                                                            {{--<small>{{ jdate($item->created_at)->format('d %B Y') }}</small>--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                    {{--<p>{{ $item->summary }}</p>--}}
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="text-center">

                                    {{ $news->links() }}

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">

                                <aside class="sidebar">

                                    <section class="widget widget_categories">
                                        <h2 class="widget-title">دسته بندی ها</h2>
                                        <ul>
                                            @component('_components.show_courses_leftside', ['data' => App\News::getCategories(), 'module' => 'category'])
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

@stop
