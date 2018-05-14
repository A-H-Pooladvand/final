@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان <span class="text-danger">*</span></label>
                    <input id="input_title" name="title" type="text" class="form-control"
                           value="{{ $audible->title ?? '' }}">
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_description" class="control-label">توضیحات <span
                                class="text-danger">*</span></label>
                    <textarea name="description" id="input_description"
                              class="tinymce">{{ $audible->description ?? '' }}</textarea>
                </div>

                @component('_components.filemanager--single')

                    @slot('name') file @endslot
                    @slot('label') افزودن فایل متنی @endslot
                    @slot('filemanager_id') filemanager_file @endslot
                    @slot('data') {{ $audible->file ?? '' }} @endslot

                @endcomponent

                <div class="row">

                    <div class="col-sm-6">
                        @component('_components.filemanager--single')
                            @slot('name') sound @endslot
                            @slot('label') افزودن فایل صوتی @endslot
                            @slot('filemanager_id') filemanager_sound @endslot
                            @slot('data') {{ $audible->sound ?? '' }} @endslot
                        @endcomponent
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_sound_link" class="control-label">لینک فایل صوتی </label>
                            <input id="input_sound_link" name="sound_link" type="text" class="form-control"
                                   value="{{ $audible->sound_link ?? '' }}">
                        </div>
                    </div>
                </div>

                @component('_components.filemanager--single')

                    @slot('name') video @endslot
                    @slot('label') افزودن فایل ویدیویی @endslot
                    @slot('filemanager_id') filemanager_video @endslot
                    @slot('data') {{ $audible->video ?? '' }} @endslot

                @endcomponent

            </div>
            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر</label>
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
                    <img id="image-preview" class="thumbnail {{ $audible->image ?? 'hidden' }}" width="100%"
                         src="{{ image_url($audible->image ?? '', 37,23,true) }}">
                </div>

                @if(!empty($audible->file))
                    <div class="well">
                        <a href="{{ $audible->file }}">دانلود فایل پیوست شده</a>
                    </div>
                @endif


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
                            @if(!empty($audible['tags']))
                                @foreach($audible['tags'] as $item)
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

            $('#image-manager').filemanager('image');

            $('#file-manager').filemanager('file');

            $('#image-preview').change(function () {
                $(this).removeClass('hidden');
            });

        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($audible))
                {{ Breadcrumbs::render('audible-edit', $audible) }}
            @else
                {{ Breadcrumbs::render('audible-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop