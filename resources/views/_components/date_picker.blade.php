<div class="form-group">
    <label for="input_{{ $name }}" class="control-label">{{ $title }}</label>
    <div class="input-group position-relative">
        <div class="input-group-addon"
             data-mddatetimepicker="true"
             data-trigger="click"
             data-targetselector="#{{ $name }}"
             data-enabletimepicker="true"
             data-placement="bottom"
             data-englishnumber="true"
             data-format="yyyy/MM/dd"
             data-disablebeforetoday="true"{{ $attributes ?? '' }}>
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
        <input type="text"
               data-mddatetimepicker="true"
               data-trigger="click"
               data-targetselector="#{{ $name }}"
               data-enabletimepicker="true"
               data-placement="bottom"
               data-englishnumber="true"
               data-format="yyyy/MM/dd"
               data-disablebeforetoday="true" {{ $attributes ?? '' }}
               name="{{ $name }}"
               class="form-control datepicker"
               id="{{ $name }}"
               readonly placeholder="{{ $placeholder }}"
               value="{{ $value }}">

        <div class="clear-date btn btn-default" id="clear-date">
            <i class="fa fa-trash-o"></i>
        </div>

    </div>

</div>

@push('scripts')
    <script>
        $(function () {
            $('.clear-date').click(function () {
                $(this).closest('.input-group').find('input').val('');
            });
        });
    </script>
@endpush