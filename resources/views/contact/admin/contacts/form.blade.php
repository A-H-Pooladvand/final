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
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $blog->title ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه مطلب</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="form-control">{{ $blog->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_content" class="control-label">محتوا</label>
                    <textarea name="content" id="input_content" class="tinymce">{{ $blog->content ?? '' }}</textarea>
                </div>

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
                    <img id="image-preview" width="100%" src="{{ image_url($blog->image ?? '', 37,23,true) }}">
                </div>

                <div class="clearnfix"></div>

                <div class="form-group">
                    <label for="input_publish_at" class="control-label">تاریخ انتشار</label>
                    <div class="input-group">
                        <div class="input-group-addon"
                             data-mddatetimepicker="true"
                             data-trigger="click"
                             data-targetselector=".datepicker"
                             data-enabletimepicker="true"
                             data-placement="bottom"
                             data-englishnumber="true"
                             data-format="yyyy/MM/dd"
                             data-disablebeforetoday="true">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input type="text"
                               name="publish_at"
                               class="form-control datepicker"
                               id="input_publish_at" readonly
                               placeholder="لطفا تاریخ انتشار را تعیین نمایید"
                               value="{{ $blog->publish_at ?? '' }}">
                    </div>
                </div>

                <div class="form-group">
                    @style(selectize/selectize.css)
                    @script(selectize/selectize.js)
                    <div class="selectize--tags">
                        <label for="input_tags" class="control-label">کلمات کلیدی</label>
                        <select id="input_tags" name="tags[]" class="demo-default" multiple placeholder="جستجو و یا با فشار دادن Enter یکی جدید ایجاد نمایید">
                            @if(!empty($blog['tags']))
                                @foreach($blog['tags'] as $item)
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
                    <label for="input_category" class="control-label">دسته بندی</label>
                    <br>
                    <select data-live-search="true" name="category" id="input_category" class="bootstrap-select">
                        <option selected disabled>دسته بندی را انتخاب نمایید</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" @if(!empty($blog['category']) && $blog['category']['id'] === $category['id']) selected @endif>
                                {{ $category['title'] }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

        </div>


        @push('scripts')
            <script>
                $('#lfm').filemanager('image');
            </script>
        @endpush

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($blog))
                {{ Breadcrumbs::render('blog-edit', $blog) }}
            @else
                {{ Breadcrumbs::render('blog-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop