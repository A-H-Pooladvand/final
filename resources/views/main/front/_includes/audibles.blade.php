<section class="kopa-area kopa-area-01">
    <div class="container">
        <div class="widget kopa-widget-features1">

            <header class="widget-header style-01">
                <h3 class="widget-title"><a href="{{ route('audible.index') }}">کوتاه و شنیدنی</a></h3>
            </header>

            <div class="widget-content module-features-01">

                <div class="row">
                <div class="list-audibles">

                    @foreach($audibles as $audible)
                        <div class="ms-item show parent-container col-md-4 col-sm-4 col-xs-12" data-val="2">
                            <article class="entry-item kopa-ms-item-01">
                                <div class="entry-thumb">
                                    <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>
                                        <img src="{{ image_url($audible->image, 60, 34, true) }}" alt="{{ $audible->title }}" title="{{ $audible->title }}">
                                    </a>
                                </div>
                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>{{ $audible->title }}</a>
                                    </h4>
                                    <p>{{ str_limit($audible->description, 150) }}</p>
                                    <ul>
                                        <a href="{{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}" class="btn btn-primary">بیشتر بخوانید</a>
                                    </ul>
                                    @if($audible->sound || $audible->sound_link)
                                        <audio controls>
                                            <source src="{{ $audible->sound ? asset($audible->sound) : $audible->sound_link }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>
                </div>
            </div>
        </div>
    </div>
</section>