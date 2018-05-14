@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="clearfix"></div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان کلمه کلیدی</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $tag->title ?? '' }}">
                </div>
            </div>

            <div class="clearfix"></div>

        </div>

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($tag['slug']))
                {{ Breadcrumbs::render('category-edit', $tag) }}
            @else
                {{ Breadcrumbs::render('category-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop