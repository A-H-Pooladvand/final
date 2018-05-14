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
            <th>نامک</th>
            <td>{{ $role['name'] }}</td>
        </tr>

        <tr>
            <th>نام نمایشی</th>
            <td>{{ $role['display_name'] }}</td>
        </tr>

        <tr>
            <th>توضیحات</th>
            <td>{{ $role['description'] }}</td>
        </tr>

        </tbody>
    </table>

    <div class="jumbotron">

        <h3 class="text-primary m-b-3">
            <strong>دسترسی ها</strong>
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
                                <i class="fa fa-fw {{ in_array($permission['id'], $rolePermissions) === true ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
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
            {{ Breadcrumbs::render('role-show', $role) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop