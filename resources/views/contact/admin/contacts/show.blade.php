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
            <th>نام</th>
            <td>{{ $contact->name }}</td>
        </tr>

        <tr>
            <th>ایمیل</th>
            <td>{{ $contact->email }}</td>
        </tr>

        <tr>
            <th>تلفن تماس</th>
            <td>{{ $contact->mobile }}</td>
        </tr>

        <tr>
            <th>موضوع تماس</th>
            <td>{!! $contact->title !!}</td>
        </tr>

        <tr>
            <th>محتوای پیام</th>
            <td>{{ $contact->content }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $contact->created_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('contact-show', $contact) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop