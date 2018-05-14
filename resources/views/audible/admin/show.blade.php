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
                <a href="{{ route('admin.user.show', $audible->author->id) }}">{{ $audible->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $audible->title }}</td>
        </tr>

        @if(!empty($audible->image))
            <tr>
                <th>تصویر جلد</th>
                <td>
                    <img src="{{ image_url($audible->image, 15,10) }}" width="150" height="100" alt="#">
                </td>
            </tr>
        @endif

        <tr>
            <th>توضیحات</th>
            <td>{{ $audible->description }}</td>
        </tr>

        @if(!empty($audible->file))
            <tr>
                <th>فایل متنی</th>
                <td>
                    <a href="{{$audible->file}}">دانلود فایل متنی آپلود شده</a>
                </td>
            </tr>
        @endif

        @if(!empty($audible->sound))
            <tr>
                <th>فایل صوتی</th>
                <td>
                    <a href="{{$audible->sound}}">دانلود فایل صوتی آپلود شده</a>
                </td>
            </tr>
        @endif

        @if(!empty($audible->sound_link))
            <tr>
                <th>فایل صوتی(لینک)</th>
                <td>
                    <a href="{{$audible->sound_link}}">دانلود فایل صوتی لینک شده</a>
                </td>
            </tr>
        @endif

        @if(!empty($audible->video))
            <tr>
                <th>فایل ویدیویی</th>
                <td>
                    <a href="{{$audible->video}}">دانلود فایل ویدیویی آپلود شده</a>
                </td>
            </tr>
        @endif

        @if(!empty($audible->categories))
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($audible->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        @if(!empty($audible->tags))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($audible->tags as $tag)
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
            <td>{{ $audible->created_at }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $audible->updated_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('book-show', $audible) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.book.edit', $audible->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop