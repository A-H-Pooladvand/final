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

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $slider->author->id) }}">{{ $slider->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان اسلاید</th>
            <td>{{ $slider->title }}</td>
        </tr>

        <tr>
            <th>لینک</th>
            <td>
                <a href="{{ $slider->link }}" target="_blank">{{ $slider->link }}</a>
            </td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($slider->image, 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>

        <tr>
            <th>توضیحات</th>
            <td>{{ $slider->description }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $slider->created_at }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $slider->updated_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('slider-show', $slider) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop