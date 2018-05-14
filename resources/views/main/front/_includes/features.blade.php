<section class="kopa-area kopa-area-01">
    <div class="container">
        <div class="widget kopa-widget-features">

            <header class="widget-header style-01">
                <h3 class="widget-title"><a href="{{ route('book.index') }}">کتابخانه</a></h3>
            </header>

            <div class="widget-content module-features-01">

                <div class="row">

                    @foreach($books as $book)

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <article class="entry-item">
                                <div class="custom">
                                    <div class="entry-thumb">
                                        <img class="img-circle" src="{{ image_url($book->image, 11,11,true) }}" alt="{{ $book->title }}" title="{{ $book->title }}">
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="{{ route('book.show', [$book->id, str_slug_fa($book->title)]) }}">{{ $book->title }}</a>
                                        </h4>
                                        <p>{{ str_limit($book->description, 150) }}</p>
                                        <a href="{{ route('book.show', [$book->id, str_slug_fa($book->title)]) }}" class="button-01">مشاهده</a>
                                    </div>
                                </div>
                            </article>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>