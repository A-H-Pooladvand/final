<div class="form-group">

    <label for="{{ $name }}" class="control-label">
        {{ $label ?? 'پیوست فایل' }}
        {!! !empty($required) ? '<span class="text-danger">*</span>' : '' !!}
    </label>

    <div class="input-group">
        <span class="input-group-btn">
            <a id="{{ $filemanager_id }}" data-input="{{ $name }}" class="btn btn-primary">
                <i class="fa fa-folder"></i>
                <span>انتخاب</span>
            </a>
        </span>
        <input dir="ltr" id="{{ $name }}" readonly class="form-control" type="text" name="{{ $name }}"
               value="{{ $data ?? '' }}"> {{--like $news->file--}}
        <div class="clear-date btn btn-default" id="clear-date">
            <i class="fa fa-trash-o"></i>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $('#{{ $filemanager_id }}').filemanager('file');
        $(function () {
            $('.clear-date').click(function () {
                $(this).closest('.input-group').find('input').val('');
            });
        });
    </script>
@endpush