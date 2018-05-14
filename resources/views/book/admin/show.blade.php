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
                <a href="{{ route('admin.user.show', $book->author->id) }}">{{ $book->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $book->title }}</td>
        </tr>

        @if(!empty($book->image))
            <tr>
                <th>تصویر جلد</th>
                <td>
                    <img src="{{ image_url($book->image, 15,10) }}" width="150" height="100" alt="#">
                </td>
            </tr>
        @endif

        <tr>
            <th>توضیحات</th>
            <td>{{ $book->description }}</td>
        </tr>

        <tr>
            <th>فایل کتاب</th>
            <td>
                <a href="{{$book->file}}">فایل کتاب</a>
            </td>
        </tr>

        @if(!empty($book->categories))
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($book->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        @if(!empty($book->tags))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($book->tags as $tag)
                        <span class="label label-info m-l-1-5">
                            <i class="fa fa-hashtag fa-fw"></i>
                            {{ $tag->title }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $book->created_at }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $book->updated_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('book-show', $book) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop