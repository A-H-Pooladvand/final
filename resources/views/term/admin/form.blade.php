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
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $term->title ?? '' }}">
                </div>


                @script(tinymce/tinymce.js)
                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="tinymce">{{ $term->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="input_description" class="control-label">توضیحات</label>
                    <textarea name="description" id="input_description" class="tinymce">{{ $term->description ?? '' }}</textarea>
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
                    <img id="image-preview" width="100%" src="{{ image_url($term->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.date_picker')
                    @slot('title')تاریخ شروع@endslot
                    @slot('placeholder')لطفا تاریخ شروع را تعیین نمایید@endslot
                    {{--@slot('value'){{ isset($term) ? jdate($term->start_at)->format('Y/m/d H:i:s') : null }}@endslot--}}
                    @slot('value'){{ (isset($term) && $term->start_at) ? jdate($term->start_at)->format('Y/m/d H:i:s') : null }}@endslot
                    @slot('name') start_at @endslot
                @endcomponent

                @component('_components.date_picker')
                    @slot('title')تاریخ پایان@endslot
                    @slot('placeholder')لطفا تاریخ پایان را تعیین نمایید@endslot
{{--                    @slot('value'){{  isset($term) ? jdate($term->end_at)->format('Y/m/d H:i:s') : null  }}@endslot--}}
                        @slot('value'){{ (isset($term) && $term->end_at) ? jdate($term->end_at)->format('Y/m/d H:i:s') : null }}@endslot
                    @slot('name') end_at @endslot
                @endcomponent

                <div class="form-group">
                    <label for="input_category" class="control-label">محل برگذاری</label>
                    <br>

                    @component('_components.bootstrap-select--single')

                        @slot('name') place @endslot

                        @slot('options')
                            @foreach($places as $place)
                                <option value="{{ $place['id'] }}" @if(isset($term) && $place['id']== $term->place_id) selected @endif>
                                    {{ $place['title'] }}
                                </option>
                            @endforeach
                        @endslot

                    @endcomponent

                </div>

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
                            @if(!empty($term['tags']))
                                @foreach($term['tags'] as $item)
                                    <option selected value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <script>
                        let $selectize_url = '{{ route('admin.tag.search.index') }}';
                    </script>
                </div>

                <div class="form-group">
                    <label for="input_category" class="control-label">درس</label>
                    <br>

                    @component('_components.bootstrap-select--multiple')

                        @slot('name') courses @endslot

                        @slot('options')
                            @foreach($courses as $course)
                                <option value="{{ $course['id'] }}" @if(isset($term) && in_array($course['id'], $term_courses, true)) selected @endif>
                                    {{ $course['title'] }}
                                </option>
                            @endforeach
                        @endslot

                        @slot('count') 4 @endslot


                    @endcomponent

                </div>

            </div>

        </div>


    </form>

    @push('scripts')
        <script>
            $('#file-manager').filemanager('image');
        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($term))
                {{ Breadcrumbs::render('term-edit', $term) }}
            @else
                {{ Breadcrumbs::render('term-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop