@extends('_layouts.front.index')

@section('content')
    <div class="auth__wrapper">
        <div class="container position-relative">

            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="auth__from position-relative">
                            <i class="fa fa-lock fa-5x text-primary"></i>
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group-lg form-group">
                                <h3 class="text-center text-primary m-t-6 m-b-3">
                                    <strong>تغییر رمز عبور</strong>
                                </h3>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="ایمیل">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="رمز عبور جدید">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="تکرار رمز عبور جدید">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">تغییر رمز</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
