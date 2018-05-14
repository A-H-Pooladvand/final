<ul>
@if(! $tags->isEmpty())
    @foreach($tags as $tag)
        <li class="cat-item">
            <a href="{{ route('tag.index', ($tag->title)) }}">{{ $tag->title }}</a>
        </li>
    @endforeach
@endif
</ul>