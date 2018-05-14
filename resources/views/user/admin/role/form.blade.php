@extends('_layouts.admin.index')

@section('content')

    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-7">

                <div class="form-group">
                    <label for="input_name" class="control-label">نامک</label>
                    <input type="text" name="name" id="input_name" class="form-control" placeholder="فقط حروف انگلیسی و یا زیر خط و یا خط تیره" value="{{ $role->name ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_display_name" class="control-label">نام نمایشی</label>
                    <input type="text" name="display_name" id="input_display_name" class="form-control" placeholder="برای نمایش برای دیگران" value="{{ $role->display_name ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_description" class="control-label">توضیحات</label>
                    <textarea name="description" id="input_description" class="form-control" cols="30" rows="6" placeholder="توضیحاتی در مورد این دسترسی">{{ $role->description ?? '' }}</textarea>
                </div>

            </div>

        </div>

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

                                <label for="input_permissions"></label>
                                <div class="pretty p-default p-curve p-pulse">
                                    <input type="checkbox" id="input_permissions" name="permissions[]" value="{{ $permission['id'] }}" type="checkbox" @if(!empty($rolePermissions) && in_array($permission['id'], $rolePermissions)) checked @endif />
                                    <div class="state p-primary">
                                        <label>{{ $permission['display_name'] }}</label>
                                    </div>
                                </div>
                                <br>

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>


    </form>
@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($role))
                {{ Breadcrumbs::render('role-edit', $role) }}
            @else
                {{ Breadcrumbs::render('role-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop