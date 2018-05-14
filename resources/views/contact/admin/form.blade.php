@extends('_layouts.admin.index')

@section('content')

    <form action="{{ route('admin.contact.update', 1) }}" method="post" id="form">
        {{ method_field('PUT') }}

        <div class="form-group">
            @script(tinymce/tinymce.js)
            <label for="input_content" class="control-label">محتوا</label>
            <textarea name="content" id="input_content" class="tinymce">{{ $contact->content ?? '' }}</textarea>
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