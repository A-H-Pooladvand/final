@extends('_layouts.admin.index')


@section('content')

    <table class="table table-striped table-show">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>مشخصات</th>
        </tr>
        </thead>
        <tbody>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $place->author->id) }}">{{ $place->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>نام مکان</th>
            <td>{{ $place->title }}</td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <a href="{{ image_url($place->image) }}" target="_blank">
                    <img src="{{ image_url($place->image, 15,10,true) }}" alt="{{ $place->title }}" title="{{ $place->title }}">
                </a>
            </td>
        </tr>

        <tr>
            <th>استان</th>
            <td>{{ $place->province->title }}</td>
        </tr>

        <tr>
            <th>شهر</th>
            <td>{{ $place->province_city->title }}</td>
        </tr>

        <tr>
            <th>محل روی نقشه</th>
            <td>
                <div class="form-group">
                    {{--<div id="location-picker" class="thumbnail full-width" style="height: 400px;"></div>--}}
                    @include('_components.google_map', ['static_marker' => true])
                    <input type="hidden" name="latitude" id="latitude"
                           value="{{ $place->map_lat or '35.76756'}}">
                    <input type="hidden" name="longitude" id="longitude"
                           value="{{ $place->map_lng or '51.43795'}}">
                </div>
            </td>
        </tr>
        {{--<tr>--}}
            {{--<th>محل روی نقشه</th>--}}
            {{--<td>--}}
                {{--@script(location-picker/location-picker.js)--}}
                {{--@push('top-scripts')--}}
                    {{--<script type="text/javascript" src="{{ env('GOOGLE_MAP') }}"></script>--}}
                {{--@endpush--}}

                {{--<div class="form-group">--}}
                    {{--<div id="location-picker" class="thumbnail full-width" style="height: 400px;"></div>--}}
                {{--</div>--}}

                {{--@push('scripts')--}}
                    {{--<script>--}}
                        {{--$('#location-picker').locationpicker({--}}
                            {{--location: {--}}
                                {{--latitude: parseFloat('{{ $place->map_lat  }}'),--}}
                                {{--longitude: parseFloat('{{ $place->map_lng }}'),--}}
                            {{--},--}}
                            {{--radius: 0,--}}
                            {{--zoom: 13--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--@endpush--}}

            {{--</td>--}}
        {{--</tr>--}}

        <tr>
            <th>جنسیت</th>
            <td>{{ $place->gender_fa }}</td>
        </tr>

        <tr>
            <th>آدرس اول</th>
            <td>
                <p>{{ $place->first_address }}</p>
            </td>
        </tr>

        <tr>
            <th>آدرس دوم</th>
            <td>
                <p>{{ $place->second_address }}</p>
            </td>
        </tr>

        <tr>
            <th>تلفن اول</th>
            <td>
                <p>{{ $place->first_phone }}</p>
            </td>
        </tr>

        <tr>
            <th>تلفن دوم دوم</th>
            <td>
                <p>{{ $place->second_phone }}</p>
            </td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $place['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $place['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('place-show', $place) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.place.edit', $place->id) }}" class="btn btn-info">ویرایش</a>

        </div>

    </div>

@stop