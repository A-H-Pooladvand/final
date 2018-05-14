
@if(! $tags->isEmpty())
<ul class="kopa-tags">
    <li><span>کلمات کلیدی</span></li>
    @foreach($tags as $tag)
        <li>
            <a href="{{ route('tag.index', ($tag->title)) }}">{{ $tag->title }}</a>
        </li>
    @endforeach
</ul>
@endif