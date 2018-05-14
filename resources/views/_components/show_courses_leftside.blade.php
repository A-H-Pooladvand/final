@if(!empty($data))
    @if(isset($term_id))
        @foreach($data as $item)
            <li class="cat-item">
                <a href="{{ route("$module.show", [$term_id, $item['id'], str_slug_fa($item['title'])]) }}">{{ $item['title'] }}</a>
            </li>
        @endforeach
    @else
        @foreach($data as $item)
            <li class="cat-item">
                <a href="{{ route("$module.show", [ $item['id'], str_slug_fa($item['title'])]) }}">{{ $item['title'] }}</a>
            </li>
        @endforeach
    @endif
@endif
