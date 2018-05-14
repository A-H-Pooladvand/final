@script(easyui/easyui.js)
@style(easyui/easyui.css)

<div class="form-group">
    <label for="{{ $selector ?? 'cc' }}" class="control-label">{{ $label }}</label>
    <input id="{{ $selector ?? 'cc' }}" name="{{ $name }}" value="{{ $category->parent->id ?? '' }}">
</div>

@push('scripts')
    <script>

        let $comboTree = $('#{{ $selector ?? 'cc' }}').combotree({
            checkbox: true,
            lines: true,
            animate: true,
            width: '100%',
            data: JSON.parse('{!! json_encode($categories) !!}'),
            // cascadeCheck: true,
            // onlyLeafCheck: true,
            // multiple: true,
            // multivalue: true,
        });




    </script>
@endpush