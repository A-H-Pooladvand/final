@extends('_layouts.front.index')

@section('content')

    @include('_includes.breadcrumb')

    <div class="auth__wrapper">
        <div class="container position-relative">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="auth__from position-relative">
                            <i class="fa fa-user-secret fa-5x text-primary"></i>

                            <div class="form-group">
                                <h3 class="text-center m-t-6 m-b-3">
                                    <strong>ثبت نام</strong>
                                </h3>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="نام">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('family') ? ' has-error' : '' }}">

                                <div>
                                    <input id="family" type="text" class="form-control" name="family" value="{{ old('family') }}" required autofocus placeholder="نام خانوادگی">

                                    @if ($errors->has('family'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('family') }}</strong>
                            </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="ایمیل">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="رمز عبور">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-lg form-group">

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="تکرار رمز عبور">
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">ثبت نام</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
