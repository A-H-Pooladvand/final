<section class="kopa-area kopa-area-05">
    <div class="container">
        <div class="widget kopa-widget-news">

            <header class="widget-header style-01">
                <h3 class="widget-title"><a href="{{ route('news.index') }}">یادداشت و مصاحبه</a></h3>
            </header>

            <div class="widget-content module-news-01">

                @foreach($news as $i => $item)

                    <article class="entry-item {{ $i & 1 ? 'style-01' : '' }}">
                        <div class="entry-thumb">
                            <a href="{{ route('news.show', [$item->id, str_slug_fa($item->title)]) }}">
                                <img src="{{ image_url($item->image, 57,35) }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                            </a>
                            <span class="entry-time">{{ jdate($item->created_at)->format('d %B Y') }}</span>
                        </div>
                        <div class="entry-content">
                            <h4 class="entry-title">
                                <a href="{{ route('news.show', [$item->id, str_slug_fa($item->title)]) }}">{{ $item->title }}</a>
                            </h4>

                            {{--<div class="entry-meta">
                                @foreach($item->categories as $category)
                                    <a href="{{ route('news.category.show', $category->id) }}">{{ $category->title }}</a>
                                @endforeach
                            </div>--}}

                            <p>{{ $item->summary }}</p>
                        </div>
                    </article>

                @endforeach
            </div>
        </div>
    </div>
</section>