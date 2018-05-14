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
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $meeting->title ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="form-control">{{ $meeting->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_description" class="control-label">توضیحات</label>
                    <textarea name="description" id="input_description" class="tinymce">{{ $meeting->description ?? '' }}</textarea>
                </div>

                <div class="row">

                    <div class="col-sm-6">
                        @component('_components.filemanager--single')
                            @slot('name') sound @endslot
                            @slot('label') افزودن فایل صوتی @endslot
                            @slot('filemanager_id') filemanager_sound @endslot
                            @slot('data') {{ $meeting->sound ?? '' }} @endslot
                        @endcomponent
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_sound_link" class="control-label">لینک فایل صوتی </label>
                            <input id="input_sound_link" name="sound_link" type="text" class="form-control"
                                   value="{{ $meeting->sound_link ?? '' }}">
                        </div>
                    </div>
                </div>

                @component('_components.filemanager--single')

                    @slot('name') video @endslot
                    @slot('label') افزودن فایل ویدیویی @endslot
                    @slot('filemanager_id') filemanager_video @endslot
                    @slot('data') {{ $meeting->video ?? '' }} @endslot

                @endcomponent
                
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
                    <img id="image-preview" width="100%" src="{{ image_url($meeting->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.filemanager--single')

                    @slot('name') file @endslot
                    @slot('label') افزودن فایل @endslot
                    @slot('filemanager_id') filemanager_file @endslot
                    @slot('data') {{ $meeting->file ?? '' }} @endslot

                @endcomponent

                <div class="form-group">
                    <label for="input_category" class="control-label">محل برگذاری</label>
                    <br>

                    @component('_components.bootstrap-select--single')

                        @slot('name') place @endslot

                        @slot('options')
                            @foreach($places as $place)
                                <option value="{{ $place['id'] }}" @if(isset($meeting) && $place['id']== $meeting->place_id) selected @endif>
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
                            @if(!empty($meeting['tags']))
                                @foreach($meeting['tags'] as $item)
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
        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($meeting))
                {{ Breadcrumbs::render('meeting-edit', $meeting) }}
            @else
                {{ Breadcrumbs::render('meeting-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop