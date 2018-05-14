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
            <td>{{ $tag['title'] }}</td>
        </tr>

        <tr>
            <th>نامک</th>
            <td>{{ $tag['slug'] }}</td>
        </tr>


        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $tag['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $tag['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('tag-show', $tag) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop