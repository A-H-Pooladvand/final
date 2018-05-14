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
            <td>{{ $page['title'] }}</td>
        </tr>

        <tr>
            <th>نامک</th>
            <td>{{ $page['slug'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $page['content'] !!}</td>
        </tr>

        <tr>
            <th>نوع نمایش تصاویر</th>
            <td>{!! $page['gallery_type_fa'] !!}</td>
        </tr>

        <tr>
            <th>نویسنده</th>
            <td>
                <a href="{{ route('admin.user.show', $page['user']['id']) }}" target="_blank">
                    <strong>
                        {{ $page['user']->fullName() }}
                    </strong>
                </a>
            </td>
        </tr>

        @if(!empty($page['tags']))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($page['tags'] as $item)
                        <span class="label label-info m-l-1-5">
                            <i class="fa fa-hashtag fa-fw"></i>
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $page['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $page['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('page-show', $page) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.page.edit', $page->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop