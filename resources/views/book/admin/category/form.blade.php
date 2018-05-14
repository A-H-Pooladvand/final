@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان دسته بندی</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $category->title ?? '' }}">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="input_slug" class="control-label">نامک</label>
                    <input id="input_slug" name="slug" type="text" class="form-control" placeholder="فقط حروف انگلیسی، زیرخط و یا خط تیره" value="{{ $category->slug ?? '' }}">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="clearfix"></div>

            <div class="col-md-4">

                @component('_components.category--single')

                    @slot('name') parent @endslot
                    @slot('label') دسته بندی والد @endslot
                    @slot('categories', $categories)
                    @if(!empty($category))
                        @slot('category', $category)
                    @endif

                @endcomponent

            </div>

        </div>

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($category['slug']))
                {{ Breadcrumbs::render('book-category-edit', $category) }}
            @else
                {{ Breadcrumbs::render('book-category-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop