<div class="col-sm-{{ $size }}">

    <div class="form-group">
        <label for="province" class="control-label">استان</label>

        @component('_components.bootstrap-select--single')

            @slot('name') province @endslot

            @slot('options')
                @foreach($provinces as $province)
                    <option @if(!empty($province_id) && $province_id === $province->id) selected @endif value="{{ $province->id }}">{{ $province->title }}</option>
                @endforeach
            @endslot

        @endcomponent

    </div>

</div>

<div class="col-sm-{{ $size }}">

    <div class="form-group">
        <label for="province_city" class="control-label">شهر</label>

        @component('_components.bootstrap-select--single')

            @slot('name') province_city @endslot

            @slot('options')@endslot

        @endcomponent

    </div>

</div>

@push('scripts')
    <script>
        $(function () {
            let $input_province = $('#input_province');
            $input_province.change(function () {
                let $id = $(this).val();
                let $input_province_city = $('#input_province_city');

                $.post('{{ route('admin.province.ajax.index') }}' + '/province/city/' + $id).done(function (response) {
                    $input_province_city.empty();
                    $.map(response, function (val, i) {
                        if (parseInt('{{ $province_city_id }}') === val.id) {
                            return $input_province_city.append(
                                $('<option />', {value: val.id, text: val.title, selected: true})
                            )
                        }
                        else {
                            return $input_province_city.append(
                                $('<option />', {value: val.id, text: val.title})
                            )
                        }
                    });
                    $('.selectpicker').selectpicker('refresh');
                    $input_province_city.change();

                });

            });
            if ('{{ $province_id }}' === '') {
                $input_province.prop("selectedIndex", 0).change();
            } else {
                $input_province.change();
            }
        });
    </script>
@endpush