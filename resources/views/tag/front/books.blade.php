@if(isset($data) && count($data))
    <h4>کتاب ها</h4>
    <hr>
    <div class="row">
        @foreach($data as $item)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="entry-item  kopa-item-01">
                    <div class="entry-thumb">
                        <a href="{{ route('book.show', [$item->id, str_slug_fa($item->title)]) }}">
                            <img src="{{ image_url($item->image,36,25,true) }}" alt="{{ $item->title }}"
                                 title="{{ $item->title }}">
                        </a>
                    </div>
                    <div class="entry-content">
                        <h4 class="entry-title">
                            <a href="{{ route('book.show', [$item->id, str_slug_fa($item->title)]) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="entry-meta">
                            <a href="{{ route('book.show', [$item->id, str_slug_fa($item->title)]) }}">
                                <small>{{ jdate($item->created_at)->format('d %B Y') }}</small>
                            </a>
                        </div>
                        <p>{{ str_limit($item->description, 120) }}</p>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endif