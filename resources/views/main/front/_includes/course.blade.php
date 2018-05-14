<section class="kopa-area kopa-area-02 white-text-style">
    <div class="container">
        <div class="widget kopa-widget-listcourse">

            <header class="widget-header style-01">
                <h3 class="widget-title"><a href="{{ route('term.index') }}">درس گفتار</a></h3>
            </header>

            <div class="widget-content module-listcourse-04">
                <div class="row">

                    @foreach($terms as $term)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="entry-item kopa-item-course-01">
                                <div class="entry-thumb">
                                    <a href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}">
                                        <img src="{{ image_url($term->image, 36,23) }}" alt="{{ $term->title }}" title="{{ $term->title }}">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="entry-content">

                                    <a href="#" class="course-category">دسته بندی</a>
                                    <h4 class="entry-title">
                                        <a href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}">{{ $term->title }}</a>
                                    </h4>
                                    <a href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}" class="course-excerpt">{{ str_limit($term->summary,200) }}</a>
                                    {{--<div class="course-price">
                                        <span class="price">200000 تومان</span>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>--}}
                                    <ul class="course-detail">
                                        <li>
                                            <small>
                                                <i class="fa fa-calendar"></i>
{{--                                                {{ jdate($term->start_at)->format('d %B Y') }}--}}
                                                {{ jdate($term->start_at)->format('Y/m/d') }}
                                            </small>
                                        </li>
                                        @if($term->place)
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                                <a href="{{ $term->place->detail_page }}">{{ $term->place->title }}</a>
                                        </li>
                                        @endif
                                        {{--<li>--}}
                                            {{--<i class="fa fa-comments-o"></i>--}}
                                            {{--2--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>