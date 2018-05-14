@extends('_layouts.admin.index')

@section('content')

    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)

    <form action="{{ route('admin.user.permission.update', $user['id']) }}" method="post" id="form">
        {{ method_field('put') }}

        <div class="jumbotron">

            <h4 class="text-primary m-b-3">لطفا دسترسی های <span>»» {{ $user->fullName() }} ««</span> را مشخص نمایید.</h4>

            <div class="row">
                @foreach($permissionTitles as $title)
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <h5 class="m-b-2 m-t-2">
                                <i class="fa fa-hashtag fa-fw text-warning"></i>
                                <strong>{{ $title['title'] }}</strong>
                            </h5>
                            @foreach($title['permissions'] as $permission)

                                <label for="input_checkbox" class="sr-only"></label>
                                <div class="pretty p-default p-curve p-pulse">
                                    <input type="checkbox" id="input_checkbox" name="permissions[]" value="{{ $permission['id'] }}" type="checkbox" {{ in_array($permission['id'], $userPermissions) === true ? 'checked' : '' }} />
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


        @push('scripts')
            <script>
                $('#lfm').filemanager('image');
            </script>
        @endpush

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('user-edit-permission', $user) }}
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop