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
                <a href="{{ route('admin.user.show', $course->author->id) }}">{{ $course->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $course['title'] }}</td>
        </tr>

        <tr>
            <th>خلاصه</th>
            <td>{!! $course['summary'] !!}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $course->content !!}</td>
        </tr>

        <tr>
            <th>تصویر</th>
            <td>
                @if(!empty($course['image']))
                    <img src="{{ image_url($course['image'], 15,10) }}" width="150" height="100" alt="#">
                @else
                    -----
                @endif
            </td>
        </tr>

        @if(!empty($course->file))
            <tr>
                <th>فایل</th>
                <td>
                    <a href="{{ $course->file }}">دانلود فایل آپلود شده</a>
                </td>
            </tr>
        @endif

        @if(!empty($course->categories))
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($course->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        @if(!empty($course->terms))
            <tr>
                <th>دوره(ها)</th>
                <td>
                    @foreach($course->terms as $term)
                        <span class="badge">{{ $term->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        @if(!empty($course->tags))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($course->tags as $tag)
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
            <td>{{ $course['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $course['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('course-show', $course) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop