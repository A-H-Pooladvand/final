@if(isset($data) && count($data))
    <h4>دوره ها</h4>
    <hr>
    <div class="row">
        @foreach($data as $term)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="entry-item kopa-item-course-03">
                    <div class="entry-thumb">
                        <a href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}">
                            <img src="{{ image_url($term->image, 36, 23) }}" alt="{{ $term->title }}"
                                 title="{{ $term->title }}">
                            <span>مشاهده جزئیات</span>
                        </a>
                    </div>
                    <div class="entry-content">
                        <h4 class="entry-title">
                            <a href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}">{{ $term->title }}</a>
                        </h4>

                        <div href="{{ route('term.show', [$term->id, str_slug_fa($term->title)]) }}" class="course-excerpt">

                            {{--<div class="thumb">
                                <img src="images/testimonial/3.jpg" alt="">
                            </div>--}}

                            <p>{{ str_limit($term->summary, 200) }}</span>
                        </div>

                        <ul class="course-detail">
                            <li>
                                <small>
                                    <i class="fa fa-calendar"></i>
                                    {{--                                                            {{ jdate($term->created_at)->format('%d %B %Y') }}--}}
                                    {{ jdate($term->created_at)->format('Y/m/d') }}
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
                            {{--12--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endif