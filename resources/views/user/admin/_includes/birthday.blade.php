<div class="col-sm-2">

    <div class="form-group">
        <label for="birthday" class="control-label">تاریخ تولد</label>
    </div>

</div>

<div class="clearfix"></div>

<div class="col-sm-2">

    <div class="form-group">
        <label for="day" class="control-label">روز</label>

        @component('_components.bootstrap-select--single')

            @slot('search') true @endslot
            @slot('name') day @endslot
            @slot('options')

                @for($i = 1; $i <=31; $i++)
                    <option value="{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}"
                            @if(!empty($user->birthday) && jdate($user->birthday)->format('d') === str_pad($i, 2, "0", STR_PAD_LEFT)) selected @endif
                    >{{ $i }}</option>
                @endfor

            @endslot

        @endcomponent

    </div>

</div>

<div class="col-sm-2">

    <div class="form-group">
        <label for="month" class="control-label">ماه</label>

        @component('_components.bootstrap-select--single')

            @slot('search') true @endslot
            @slot('name') month @endslot
            @slot('options')

                @for($i = 1; $i <=12; $i++)
                    <option value="{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}"
                            @if(!empty($user->birthday) && jdate($user->birthday)->format('m') === str_pad($i, 2, "0", STR_PAD_LEFT)) selected @endif
                    >{{ $i }}</option>
                @endfor

            @endslot

        @endcomponent

    </div>

</div>

<div class="col-sm-2">

    <div class="form-group">
        <label for="year" class="control-label">سال</label>

        @component('_components.bootstrap-select--single')

            @slot('search') true @endslot
            @slot('name') year @endslot
            @slot('options')

                @for($i = 1300; $i <=1400; $i++)
                    <option value="{{ $i }}"
                            @if(!empty($user->birthday) && jdate($user->birthday)->format('Y') === str_pad($i, 2, "0", STR_PAD_LEFT)) selected @endif
                    >{{ $i }}</option>
                @endfor

            @endslot

        @endcomponent

    </div>

</div>