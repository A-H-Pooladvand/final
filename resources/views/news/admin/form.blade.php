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
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $news->title ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه مطلب</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="form-control">{{ $news->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_content" class="control-label">محتوا</label>
                    <textarea name="content" id="input_content" class="tinymce">{{ $news->content ?? '' }}</textarea>
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
                    <img id="image-preview" class="thumbnail {{ !empty($news->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($news->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.date_picker')
                    @slot('title')تاریخ انتشار@endslot
                    @slot('placeholder')لطفا تاریخ انتشار را تعیین نمایید@endslot
                    @slot('value'){{ jdate($news->publish_at ?? null)->format('Y/m/d H:i:s') }}@endslot
                    @slot('name') publish_at @endslot
                @endcomponent

                @component('_components.date_picker')
                    @slot('title')تاریخ انقضا@endslot
                    @slot('placeholder')لطفا تاریخ انقضا را تعیین نمایید@endslot
                    @slot('value'){{ !empty($news->expire_at) ? jdate($news->expire_at)->format('Y/m/d H:i:s') : null }}@endslot
                    @slot('name') expire_at @endslot
                @endcomponent

                <div class="form-group">
                    <label for="input_status" class="control-label">وضعیت</label>
                    <br>
                    @component('_components.bootstrap-select--single')

                        @slot('name') status @endslot
                        @slot('search') false @endslot

                        @slot('options')
                            <option {{ !empty($news->status) && $news->status === 'publish' ? 'selected' : '' }} value="publish">انتشار</option>
                            <option {{ !empty($news->status) && $news->status === 'draft' ? 'selected' : '' }} value="draft">پیشنویس</option>
                        @endslot

                    @endcomponent
                </div>

                <div class="form-group">
                    @style(selectize/selectize.css)
                    @script(selectize/selectize.js)
                    <div class="selectize--tags">
                        <label for="input_tags" class="control-label">کلمات کلیدی</label>
                        <select id="input_tags" name="tags[]" class="demo-default" multiple placeholder="جستجو و یا با فشار دادن Enter یکی جدید ایجاد نمایید">
                            @if(!empty($news['tags']))
                                @foreach($news['tags'] as $item)
                                    <option selected value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <script>
                        let $selectize_url = '{{ route('admin.tag.search.index') }}';
                    </script>
                </div>

                @component('_components.category--multiple')

                    @slot('name') categories[] @endslot
                    @slot('label') دسته بندی @endslot
                    @slot('categories', $categories)
                    @if(!empty($category_ids))
                        @slot('category_ids', $category_ids)
                    @endif

                @endcomponent


            </div>

        </div>

        @component('_components.filemanager--multiple')

            @slot('type') gallery @endslot
            @slot('label') گالری تصاویر @endslot
            @slot('index') 0 @endslot
            @if(!empty($news->galleries))
                @slot('data', $news->galleries)
            @endif

        @endcomponent

        @component('_components.filemanager--multiple')

            @slot('type') multimedia @endslot
            @slot('label') پیوست فایل @endslot
            @slot('index') 0 @endslot
            @if(!empty($news->files))
                @slot('data', $news->files)
            @endif

        @endcomponent



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
            @if(!empty($news))
                {{ Breadcrumbs::render('news-edit', $news) }}
            @else
                {{ Breadcrumbs::render('news-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop