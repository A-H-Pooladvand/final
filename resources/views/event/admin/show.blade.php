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
                <a href="{{ route('admin.user.show', $event->author->id) }}">{{ $event->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $event->title }}</td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($event->image, 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>

        <tr>
            <th>خلاصه</th>
            <td>{{ $event->summary }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $event->content !!}</td>
        </tr>

        <tr>
            <th>استان</th>
            <td>{!! $event->province->title !!}</td>
        </tr>

        <tr>
            <th>شهر</th>
            <td>{!! $event->province_city->title !!}</td>
        </tr>

        <tr>
            <th>مکان</th>
            <td>{!! $event->place->title !!}</td>
        </tr>

        @if(!empty($event->tags))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($event->tags as $item)
                        <span class="label label-info m-l-1-5">
                            <i class="fa fa-hashtag fa-fw"></i>
                            {{ $item->title }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!$event->categories->isEmpty())
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($event->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif
        <tr>
            <th>تاریخ نمایش</th>
            <td>{{ $event->releases_at_fa }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $event->created_at }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $event->updated_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('event-show', $event) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop