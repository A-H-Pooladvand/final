@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">نام مکان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $place->title ?? '' }}">
                </div>

                <div class="row">

                    @include('_includes.provinces', [
                    'provinces' => $provinces,
                    'size' => 6,
                    'province_id' => $place->province->id ?? '',
                    'province_city_id' => $place->province_city_id ?? ''
                    ])

                </div>

                <div class="form-group">
                    <label for="input_first_address" class="control-label">آدرس اول</label>
                    <textarea name="first_address" id="input_first_address" cols="30" rows="4" class="form-control">{{ $place->first_address ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="input_second_address" class="control-label">آدرس دوم</label>
                    <textarea name="second_address" id="input_second_address" cols="30" rows="4" class="form-control">{{ $place->second_address ?? '' }}</textarea>
                </div>

                {{--@script(location-picker/location-picker.js)--}}
                {{--@push('top-scripts')--}}
                    {{--<script type="text/javascript" src="{{ env('GOOGLE_MAP') }}"></script>--}}
                {{--@endpush--}}


                {{--@push('scripts')--}}
                    {{--<script>--}}
                        {{--$('#location-picker').locationpicker({--}}
                            {{--location: {--}}
                                {{--latitude: parseFloat('{{ $place->map_lat ?? '34.63991380839733' }}'),--}}
                                {{--longitude: parseFloat('{{ $place->map_lng ?? '50.87594223022461' }}'),--}}
                            {{--},--}}
                            {{--radius: 0,--}}
                            {{--zoom: 13,--}}
                            {{--inputBinding: {--}}
                                {{--latitudeInput: $('#lat'),--}}
                                {{--longitudeInput: $('#long'),--}}
                                {{--locationNameInput: $('#location-picker-live-search')--}}
                            {{--},--}}
                            {{--enableAutocomplete: true,--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--@endpush--}}

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر شاخص</label>
                    <div class="input-group">
                    <span class="input-group-btn">
                            <a id="lfm" data-input="image" data-preview="image-preview" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i>
                                <span>انتخاب</span>
                            </a>
                        </span>
                        <input id="image" readonly class="form-control" type="text" name="image">
                    </div>
                </div>

                <div class="form-group">
                    <img id="image-preview" class="{{ $place->image ?? 'hidden' }} thumbnail" width="100%" src="{{ image_url($place->image ?? '', 37,23,true) }}">
                </div>

                <div class="form-group">
                    <label for="input_category" class="control-label">جنسیت</label>

                    @component('_components.bootstrap-select--single')

                        @slot('search') false @endslot
                        @slot('name') gender @endslot

                        @slot('options')
                            <option @if(!empty($place) && $place->gender === 'male') selected @endif value="male">آقا</option>
                            <option @if(!empty($place) && $place->gender === 'female') selected @endif value="female">خانم</option>
                            <option @if(!empty($place) && $place->gender === 'both') selected @endif value="both">هردو</option>
                        @endslot

                    @endcomponent

                </div>

                <div class="form-group">
                    <label for="input_first_phone" class="control-label">تلفن اول</label>
                    <input name="first_phone" id="input_first_phone" type="tel" class="form-control" value="{{ $place->first_phone ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_second_phone" class="control-label">تلفن دوم</label>
                    <input name="second_phone" id="input_second_phone" type="tel" class="form-control" value="{{ $place->second_phone ?? '' }}">
                </div>

            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="location-picker" class="control-label">محل مکان روی نقشه</label>

                    {{--<div class="form-group">--}}
                        {{--<small class="text-warning">--}}
                            {{--<small>برای راحتی میتوانید از فیلد زیر برای جستجو استفاده نمایید.</small>--}}
                        {{--</small>--}}
                        {{--<input type="text" class="form-control" id="location-picker-live-search" placeholder="لطفا مکان مورد نظر خود را جستجو نمایید">--}}
                    {{--</div>--}}

                    {{--<div id="location-picker" class="thumbnail full-width" style="height: 400px;"></div>--}}
                    @include('_components.google_map')
                    <input type="hidden" name="latitude" id="latitude"
                           value="{{ $place->map_lat or '35.76756'}}">
                    <input type="hidden" name="longitude" id="longitude"
                           value="{{ $place->map_lng or '51.43795'}}">
                </div>
            </div>

        </div>


        @push('scripts')
            <script>
                $('#lfm').filemanager('image');

                $(function () {
                    $('#image-preview').change(function () {
                        $(this).removeClass('hidden');
                    });
                });

            </script>
        @endpush

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($place))
                {{ Breadcrumbs::render('place-edit', $place) }}
            @else
                {{ Breadcrumbs::render('place-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop