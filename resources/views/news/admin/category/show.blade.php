@extends('_layouts.admin.index')


@section('content')

    <table class="table table-striped table-show">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>مشخصات</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th>عنوان</th>
            <td>{{ $category['title'] }}</td>
        </tr>

        <tr>
            <th>نامک</th>
            <td>{{ $category['slug'] }}</td>
        </tr>

        @if(!empty($category->parent))
            <tr>
                <th>دسته بندی والد</th>
                <td>
                    <a href="{{ route('admin.news.category.show', $category->parent->id) }}" target="_blank">
                        <strong class="label label-info"># {{ $category->parent->title }}</strong>
                    </a>
                </td>
            </tr>
        @endif

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $category['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $category['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('news-category-show', $category) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.news.category.edit', $category->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop