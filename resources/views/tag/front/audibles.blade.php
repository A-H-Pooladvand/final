@if(isset($data) && count($data))
    <h4>کوتاه و شنیدنی</h4>
    <hr>
    <div class="masonry-content row">
        @foreach($data as $audible)
            <div class="ms-item show parent-container col-md-6 col-sm-6 col-xs-12" data-val="2">
                <article class="entry-item kopa-ms-item-01">
                    <div class="entry-thumb">
                        <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>
                            <img src="{{ image_url($audible->image, 60, 34, true) }}" alt="{{ $audible->title }}"
                                 title="{{ $audible->title }}">
                        </a>
                    </div>
                    <div class="entry-content">
                        <h4 class="entry-title">
                            <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>{{ $audible->title }}</a>
                        </h4>
                        <p>{{ str_limit($audible->description, 150) }}</p>
                        <ul>
                            <a href="{{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}" class="btn btn-primary">بیشتر
                                بخوانید</a>
                            {{--<li><a href={{ route('audible.show', $audible->id) }} class="fa fa-search"></a></li>--}}
                            {{--<li><a href={{ route('audible.show', $audible->id) }} class="fa fa-link"></a></li>--}}
                        </ul>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endif
