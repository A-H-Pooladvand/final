<div class="lfm--{{ $type }}-container"> {{-- gallery/multimedia --}}

    <div class="form-group">
        <label for="image" class="control-label">{{ $label }}</label>
        <br>
        <a class="btn btn-primary lfm--{{ $type }}-input">
            <i class="fa fa-picture-o"></i>
            <span>انتخاب</span>
        </a>
    </div>

    <div class="row">
        <div class="lfm--{{ $type }}-wrapper">

            @if(!empty($data)) {{-- Example: $news->videos --}}
            @foreach($data as $item)
                <div class="col-lg-3 col-sm-3 lfm--images__wrapper">
                    <div class="form-group form-group-sm">
                        <div class="position-relative thumbnail text-center">
                            <div class="btn-remove"></div>
                            @if($type === 'multimedia')
                                <i class="fa fa-play-circle fa-5x fa-5x p-t-3 p-b-3 text-info"></i>
                                <div class="alert alert-success">{{ substr($item->path, strrpos($item->path, '/') + 1) }}</div>
                            @else
                                <img src="{{ image_url($item->path, 16,15, true) }}" alt="{{ $item->title }}" title="{{ $item->title }}" class="full-width m-b-1">
                            @endif
                            <input type="text" value="{{ $item->title }}" class="form-control m-b-1" name="lfm_{{ $type }}_title{{ $index }}[]" placeholder="عنوان">
                            <input type="number" value="{{ $item->priority }}" class="form-control" name="lfm_{{ $type }}_priority{{ $index }}[]" placeholder="اولویت 1-255">
                            <input type="hidden" value="{{ $item->path }}" class="form-control" name="lfm_{{ $type }}_path{{ $index }}[]">
                        </div>
                    </div>
                </div>
            @endforeach
            @endif

        </div>
    </div>
</div>