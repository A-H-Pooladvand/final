<select
        data-header="انتخاب نمایید"
        data-live-search="true"
        multiple
        name="{{ $name }}[]"
        id="input_{{ $name }}"
        class="selectpicker form-control"
        data-selected-text-format="count > {{ $count }}"
        data-style="btn-default"
        data-live-search-placeholder="جستجو">
    <option value="">انتخاب کنید...</option>
    {{ $options }}

</select>