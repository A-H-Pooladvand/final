@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $event->title ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="6" class="form-control">{{ $event->summary ?? '' }}</textarea>
                </div>

                <div class="well">

                    <label for="location">مکان برنامه های آتی</label>

                    <hr>

                    <div class="row">

                        @include('_includes.provinces', [
                        'provinces' => $provinces,
                        'size' => 6,
                        'province_id' => $event->province->id ?? '',
                        'province_city_id' => $event->province_city_id ?? ''
                        ])

                    </div>

                    <div class="form-group">
                        <label for="place" class="control-label">مکان</label>

                        @component('_components.bootstrap-select--single')

                            @slot('name') place @endslot

                            @slot('options')@endslot

                        @endcomponent

                    </div>

                    @push('scripts')
                        <script>
                            $(function () {
                                let $place_id = '{{ $event->place_id ?? '' }}';

                                $('#input_province_city').change(function () {
                                    let $id = $(this).val();

                                    $.post('{{ route('admin.place.ajax.index') }}' + '/' + 'locations' + '/' + $id).done(function (response) {

                                        $('#input_place').empty();
                                        $.map(response, function (val, i) {

                                            if ($place_id.length > 0) {
                                                if (parseInt($place_id) === val.id) {
                                                    return $('#input_place').append(
                                                        $('<option>', {value: val.id, text: val.title, selected: true})
                                                    )
                                                } else {
                                                    return $('#input_place').append(
                                                        $('<option>', {value: val.id, text: val.title})
                                                    )
                                                }

                                            } else {
                                                return $('#input_place').append(
                                                    $('<option>', {value: val.id, text: val.title})
                                                )
                                            }

                                        });

                                        $('.selectpicker').selectpicker('refresh');
                                    });
                                });

                            });
                        </script>
                    @endpush

                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_content" class="control-label">محتوا</label>
                    <textarea name="content" id="input_content" class="tinymce">{{ $event->content ?? '' }}</textarea>
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر شاخص</label>
                    <div class="input-group">
                <span class="input-group-btn">
                <a id="file-manager" data-input="image" data-preview="image-preview" class="btn btn-primary">
                <i class="fa fa-picture-o"></i>
                <span>انتخاب</span>
                </a>
                </span>
                        <input id="image" readonly class="form-control" type="text" name="image">
                    </div>
                </div>

                <div class="form-group">
                    <img id="image-preview" class="thumbnail {{ !empty($event->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($event->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.date_picker')
                    @slot('title')تاریخ نمایش@endslot
                    @slot('placeholder')لطفا تاریخ نمایش را تعیین نمایید@endslot
                    @slot('value'){{ jdate($event->releases_at ?? null)->format('Y/m/d H:i:s') }}@endslot
                    @slot('name') releases_at @endslot
                @endcomponent

                @component('_components.date_picker')
                    @slot('title')تاریخ برگزاری برنامه های آتی@endslot
                    @slot('placeholder')لطفا تاریخ برگزاری را تعیین نمایید@endslot
                    @slot('value'){{ jdate($event->starts_at ?? null)->format('Y/m/d H:i:s') }}@endslot
                    @slot('name') starts_at @endslot
                @endcomponent

                @push('scripts')
                    <script>
                        $(function () {

                            let $teachers = $('#input_teachers').selectize({
                                plugins: ['remove_button']
                            });

                        });

                    </script>
                @endpush

                @component('_components.category--multiple')

                    @slot('name') categories[] @endslot
                    @slot('label') دسته بندی @endslot
                    @slot('categories', $categories)
                    @if(!empty($category_ids))
                        @slot('category_ids', $category_ids)
                    @endif

                @endcomponent

                <div class="form-group">
                    @style(selectize/selectize.css)
                    @script(selectize/selectize.js)
                    <div class="selectize--tags">
                        <label for="input_tags" class="control-label">کلمات کلیدی</label>
                        <select id="input_tags" name="tags[]" class="demo-default" multiple placeholder="جستجو و یا با فشار دادن Enter یکی جدید ایجاد نمایید">
                            @if(!empty($event['tags']))
                                @foreach($event['tags'] as $item)
                                    <option selected value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <script>
                        let $selectize_url = '{{ route('admin.tag.search.index') }}';
                    </script>
                </div>

            </div>

        </div>

    </form>

    @push('scripts')
        <script>
            $('#file-manager').filemanager('image');

            $(function () {
                $('#image-preview').change(function () {
                    $(this).removeClass('hidden');
                });
            });

        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($event))
                {{ Breadcrumbs::render('event-edit', $event) }}
            @else
                {{ Breadcrumbs::render('event-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop