@extends('_layouts.admin.index')

@section('content')

    <form action="{{ route('admin.about.update', 1) }}" method="post" id="form">
        {{ method_field('PUT') }}

        <div class="col-sm-8">
            <div class="form-group">
                <label for="title" class="control-label">عنوان</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}">
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
                <img id="image-preview" class="thumbnail" width="100%"
                     src="{{ image_url($about->image ?? '', 37,23,true) }}">
            </div>
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
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="input_content" class="control-label">عکس</label>--}}
        {{--<br>--}}
        {{--<img src="{{ image_url($about->image, 30,20,true) }}" class="thumbnail" alt="{{ $about->title }}" title="{{ $about->title }}">--}}
        {{--</div>--}}

        <div class="col-sm-12">
            <div class="form-group">
                @script(tinymce/tinymce.js)
                <label for="input_content" class="control-label">محتوا</label>
                <textarea name="content" id="input_content" class="tinymce">{{ $about->content ?? '' }}</textarea>
            </div>
        </div>

    </form>


@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop