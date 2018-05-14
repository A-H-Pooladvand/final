@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="input_title" class="control-label">عنوان <span class="text-danger">*</span></label>
                        <input id="input_title" name="title" type="text" class="form-control"
                               value="{{ $course->title ?? '' }}">
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="input_summary" class="control-label">خلاصه <span
                                    class="text-danger">*</span></label>
                        <textarea name="summary" class="tinymce" id="input_summary"
                                  rows="3">{{ $course->summary ?? '' }}</textarea>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="input_content" class="control-label">توضیحات <span
                                    class="text-danger">*</span></label>
                        <textarea name="content" class="tinymce" id="input_content"
                                  rows="3">{{ $course->content ?? '' }}</textarea>
                    </div>

                    @script(tinymce/tinymce.js)


                    <div class="col-sm-6">
                        @component('_components.filemanager--single')
                            @slot('name') sound @endslot
                            @slot('label') افزودن فایل صوتی @endslot
                            @slot('filemanager_id') filemanager_sound @endslot
                            @slot('data') {{ $course->sound ?? '' }} @endslot
                        @endcomponent
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_sound_link" class="control-label">لینک فایل صوتی </label>
                            <input id="input_sound_link" name="sound_link" type="text" class="form-control"
                                   value="{{ $course->sound_link ?? '' }}">
                        </div>
                    </div>
                </div>

                @component('_components.filemanager--single')

                    @slot('name') video @endslot
                    @slot('label') افزودن فایل ویدیویی @endslot
                    @slot('filemanager_id') filemanager_video @endslot
                    @slot('data') {{ $course->video ?? '' }} @endslot

                @endcomponent
            </div>
            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر
                        {{--<span class="text-danger">*</span>--}}</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="image-manager" data-input="image" data-preview="image-preview"
                               class="btn btn-primary">
                                <i class="fa fa-picture-o"></i>
                                <span>انتخاب</span>
                            </a>
                        </span>
                        <input id="image" readonly class="form-control" type="text" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <img id="image-preview" width="100%" class="thumbnail {{ $course->image ?? 'hidden' }}"
                         src="{{ image_url($course->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.filemanager--single')

                    @slot('name') file @endslot
                    @slot('label') افزودن فایل @endslot
                    @slot('filemanager_id') filemanager_file @endslot
                    @slot('data') {{ $course->file ?? '' }} @endslot

                @endcomponent


                <div class="form-group">
                    <label for="input_category" class="control-label">درس بعدی</label>
                    <br>
                    @component('_components.bootstrap-select--single')
                        @slot('name') next_id @endslot
                        @slot('options')
                            @foreach($courses as $item)
                                <option value="{{ $item['id'] }}"
                                        @if(isset($course) && $item['id'] == $course->next_id) selected @endif>
                                    {{ $item['title'] }}
                                </option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>

                <div class="form-group">
                    <label for="input_category" class="control-label">درس قبلی</label>
                    <br>
                    @component('_components.bootstrap-select--single')
                        @slot('name') previous_id @endslot
                        @slot('options')
                            @foreach($courses as $item)
                                <option value="{{ $item['id'] }}"
                                        @if(isset($course) && $item['id'] == $course->previous_id) selected @endif>
                                    {{ $item['title'] }}
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
                        <select id="input_tags" name="tags[]" class="demo-default" multiple
                                placeholder="جستجو و یا با فشار دادن Enter یکی جدید ایجاد نمایید">
                            @if(!empty($course['tags']))
                                @foreach($course['tags'] as $item)
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
                    <label for="input_category" class="control-label">دوره</label>
                    <br>

                    @component('_components.bootstrap-select--multiple')

                        @slot('name') terms @endslot

                        @slot('options')
                            @foreach($terms as $term)
                                <option value="{{ $term['id'] }}"
                                        @if(isset($course) && in_array($term['id'], $course_terms, true)) selected @endif>
                                    {{ $term['title'] }}
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

            $('#image-manager').filemanager('image');

            $('#image-preview').change(function () {
                $(this).removeClass('hidden');
            });

        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($course))
                {{ Breadcrumbs::render('course-edit', $course) }}
            @else
                {{ Breadcrumbs::render('course-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop