@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="POST" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $page->title ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_slug" class="control-label">نامک</label>
                    <input id="input_slug" name="slug" type="text" class="form-control" autocomplete="off" value="{{ $page->slug ?? '' }}" dir="ltr">
                </div>
                <div class="form-group">
                    <div dir="ltr" class="bg-info text-primary p-b-0-5 p-t-0-5 p-l-0-5 p-r-0-5">
                        <strong>http://kalaam.ir/pages/</strong><span id="slug--preview">{{ $page->slug ?? '' }}</span>
                    </div>
                </div>

                @push('scripts')
                    <script>
                        $(function () {
                            $('#input_slug').bind('change keyup input', function () {
                                $('#slug--preview').text($(this).val());
                            });
                        });
                    </script>
                @endpush

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_content" class="control-label">محتوا</label>
                    <textarea name="content" id="input_content" class="tinymce">{{ $page->content ?? '' }}</textarea>
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="input_gallery_type" class="control-label">نوع چیدمان تصاویر</label>

                    @component('_components.bootstrap-select--single')

                        @slot('name') gallery_type @endslot
                        @slot('search') false @endslot

                        @slot('options')
                            <option value="none">هیچکدام</option>
                            <option value="slider">اسلایدشو</option>
                            <option value="gallery">گالری</option>
                        @endslot

                    @endcomponent

                </div>

                <div class="form-group">
                    @style(selectize/selectize.css)
                    @script(selectize/selectize.js)
                    <div class="selectize--tags">
                        <label for="input_tags" class="control-label">کلمات کلیدی</label>
                        <select id="input_tags" name="tags[]" class="demo-default" multiple placeholder="جستجو و یا با فشار دادن Enter یکی جدید ایجاد نمایید">
                            @if(!empty($page['tags']))
                                @foreach($page['tags'] as $item)
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

        <div class="lfm--gallery-container">
            <div class="form-group">
                <label for="image" class="control-label">گالری تصاویر</label>
                <br>
                <a class="btn btn-primary lfm--gallery-input">
                    <i class="fa fa-picture-o"></i>
                    <span>انتخاب</span>
                </a>
            </div>

            <div class="row">
                <div class="lfm--wrapper">

                    @if(!empty($page->galleries))
                        @foreach($page->galleries as $item)
                            <div class="col-lg-3 col-sm-3 lfm--images__wrapper">
                                <div class="form-group form-group-sm">
                                    <div class="position-relative thumbnail">
                                        <div class="btn-remove"></div>
                                        <img src="{{ image_url($item->path, 16,15, true) }}" alt="{{ $item->title }}" title="{{ $item->title }}" class="full-width m-b-1">
                                        <input type="text" value="{{ $item->title }}" class="form-control m-b-1" name="lfm_gallery_title0[]" placeholder="عنوان">
                                        <input type="number" value="{{ $item->priority }}" class="form-control" name="lfm_gallery_priority0[]" placeholder="اولویت 1-255">
                                        <input type="hidden" value="{{ $item->path }}" class="form-control" name="lfm_gallery_path0[]">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($page))
                {{ Breadcrumbs::render('page-edit', $page) }}
            @else
                {{ Breadcrumbs::render('page-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop