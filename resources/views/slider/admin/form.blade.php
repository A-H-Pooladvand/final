@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان اسلاید</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $slider->title ?? '' }}">
                </div>
                
                <div class="form-group">
                    <label for="input_description" class="control-label">توضیحات</label>
                    <textarea name="description" id="input_description" cols="30" rows="6" class="form-control">{{ $slider->description ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="input_link" class="control-label">لینک مطلب</label>
                    <input dir="ltr" id="input_link" name="link" type="url" class="form-control" value="{{ $slider->link ?? '' }}" placeholder="http://example.com :مثال">
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر اسلاید</label>
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
                    <img id="image-preview" class="thumbnail {{ !empty($slider->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($slider->image ?? '', 37,23,true) }}">
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
            @if(!empty($slider))
                {{ Breadcrumbs::render('slider-edit', $slider) }}
            @else
                {{ Breadcrumbs::render('slider-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop