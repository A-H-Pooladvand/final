@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-9">

                <div class="row">

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="name" class="control-label">نام</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ $user->name ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="family" class="control-label">نام خانوادگی</label>
                            <input id="family" name="family" type="text" class="form-control" value="{{ $user->family ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="email" class="control-label">پست الکترونیکی</label>
                            <input id="email" name="email" type="email" class="form-control" dir="ltr" value="{{ $user->email ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="username" class="control-label">نام کاربری</label>
                            <input id="username" name="username" type="text" class="form-control" value="{{ $user->username ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone" class="control-label">تلفن ثابت</label>
                            <input id="phone" name="phone" type="tel" class="form-control" dir="ltr" value="{{ $user->phone ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="mobile" class="control-label">تلفن همراه</label>
                            <input id="mobile" name="mobile" type="tel" class="form-control" dir="ltr" value="{{ $user->mobile ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="role" class="control-label">نقش</label>
                            <br>

                            @component('_components.bootstrap-select--multiple')
                                @slot('name') roles @endslot
                                @slot('count') 3 @endslot

                                @slot('options')
                                    @foreach($roles as $role)
                                        <option value="{{ $role['id'] }}" @if(!empty($userRoles) && in_array($role['id'], $userRoles)) selected @endif>
                                            {{ $role['display_name'] }}
                                        </option>
                                    @endforeach
                                @endslot
                            @endcomponent

                        </div>

                    </div>

                    @include('_includes.provinces', [
                    'provinces' => $provinces,
                    'province_id' => $user->province_id,
                    'province_city_id' => $user->province_city_id,
                    'size' => 4
                    ])

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="education" class="control-label">تحصیلات</label>

                            @component('_components.bootstrap-select--single')

                                @slot('search') false @endslot
                                @slot('name') education @endslot
                                @slot('options')

                                    @foreach($user->educations() as $item)
                                        <option @if( !empty($user->education) && $item['value'] === $user->education) selected @endif value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                    @endforeach

                                @endslot

                            @endcomponent

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="birth_certificate" class="control-label">شماره شناسنامه</label>
                            <input id="birth_certificate" name="birth_certificate" type="text" class="form-control" value="{{ $user->birth_certificate ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="national_id" class="control-label">کد ملی</label>
                            <input id="national_id" name="national_id" type="text" class="form-control" value="{{ $user->national_id ?? '' }}">
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="scientific_document" class="control-label">مدرک علمی</label>
                            <input id="scientific_document" name="scientific_document" type="text" class="form-control" value="{{ $user->scientific_document ?? '' }}">
                        </div>

                    </div>

                    @include('user.admin._includes.birthday')

                    <div class="clearfix"></div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="biography" class="control-label">معرفی و بیوگرافی</label>
                            <textarea name="biography" id="biography" cols="30" rows="5" class="form-control">{{ $user->biography ?? '' }}</textarea>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="artwork" class="control-label">آثار ارائه شده</label>
                            <textarea name="artwork" id="artwork" cols="30" rows="5" class="form-control">{{ $user->artwork ?? '' }}</textarea>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="first_address" class="control-label">آدرس 1</label>
                            <textarea name="first_address" id="first_address" cols="30" rows="5" class="form-control">{{ $user->first_address ?? '' }}</textarea>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="second_address" class="control-label">آدرس 2</label>
                            <textarea name="second_address" id="second_address" cols="30" rows="5" class="form-control">{{ $user->second_address ?? '' }}</textarea>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-3">

                <div class="form-group">
                    <label for="avatar" class="control-label">تصویر کاربری</label>
                    <div class="input-group">
                    <span class="input-group-btn">
                            <a id="lfm" data-input="avatar" data-preview="avatar-img" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i>
                                <span>انتخاب</span>
                            </a>
                        </span>
                        <input id="avatar" class="form-control" type="text" name="avatar">
                    </div>
                </div>

                <div class="form-group text-center">
                    <img id="avatar-img" width="140" height="140"  class="img-circle {{ $user->avatar ?? 'hidden' }}" src="{{ image_url($user->avatar ?? '#', 15,15,true) }}">
                </div>

                @if(!empty($user->email))
                    <div class="alert alert-warning">
                        <small class="text-warning">اگر نمیخواهید رمز عبور کاربر را تغییر دهید فیلد رمز عبور را خالی بگذارید.</small>
                    </div>
                @endif

                <div class="form-group">
                    <label for="password" class="control-label">رمز عبور</label>
                    <input id="password" name="password" type="password" class="form-control" dir="ltr">
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="control-label">تکرار رمز عبور</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" dir="ltr">
                </div>

            </div>

        </div>

        @push('scripts')
            <script>
                $('#lfm').filemanager('image');

                $(function () {
                    $('#avatar-img').change(function () {
                        $(this).removeClass('hidden');
                    });
                });

            </script>
        @endpush

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($user))
                {{ Breadcrumbs::render('user-edit', $user) }}
            @else
                {{ Breadcrumbs::render('user-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop