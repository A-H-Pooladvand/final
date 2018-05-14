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
            <th>تصویر کاربری</th>
            <td><img src="{{ $user['avatar'] }}" class="img-circle" width="150" height="150" alt="{{ $user->fullName() }}" title="{{ $user->fullName() }}"></td>
        </tr>

        <tr>
            <th>نام</th>
            <td>{{ $user['name'] }}</td>
        </tr>

        <tr>
            <th>نام خانوادگی</th>
            <td>{{ $user['family'] }}</td>
        </tr>

        <tr>
            <th>نام کاربری</th>
            <td>{{ $user['username'] }}</td>
        </tr>

        <tr>
            <th>ایمیل</th>
            <td>{{ $user['email'] }}</td>
        </tr>

        <tr>
            <th>وضعیت</th>
            <td>{!! $user['deleted_at_status'] !!}</td>
        </tr>

        @if(!empty($user['roles']))

            <tr>
                <th>نقش (ها)</th>
                <td>
                    @foreach($user['roles'] as $item)
                        <p>{{ $item['display_name'] }}</p>
                    @endforeach
                </td>
            </tr>

        @endif

        <tr>
            <th>تلفن همراه</th>
            <td>{{ $user['mobile'] }}</td>
        </tr>

        <tr>
            <th>تلفن تماس</th>
            <td>{{ $user['phone'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد حساب</th>
            <td>{{ $user['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش کاربر</th>
            <td>{{ $user['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

    <div class="jumbotron">

        <h3 class="text-primary m-b-5">
            <strong>دسترسی های فردی کاربر</strong>
        </h3>

        <div class="row">
            @foreach($permissionTitles as $title)
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <h5 class="m-b-2 m-t-2">
                            <i class="fa fa-hashtag fa-fw text-warning"></i>
                            <strong>{{ $title['title'] }}</strong>
                        </h5>
                        @foreach($title['permissions'] as $permission)
                            <div>
                                <i class="fa fa-fw {{ in_array($permission['id'], $userPermissions) === true ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                                <span>{{ $permission['display_name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

@section('helper_block')
    <div class="form-group helper-block">
        <div class="pull-left">
            {{ Breadcrumbs::render('user-show', $user) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info">ویرایش</a>
        </div>
    </div>
@stop