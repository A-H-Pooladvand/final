@extends('_layouts.front.index')

@section('content')
    <div class="auth__wrapper">
        <div class="container position-relative">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="auth__from position-relative">
                            <i class="fa fa-envelope fa-5x text-primary"></i>

                            <div class="form-group">
                                <h3 class="text-center text-primary m-t-6 m-b-3">
                                    <strong>بازیابی رمز عبور</strong>
                                </h3>
                            </div>

                            <div class="form-group">
                                <h5 class="text-center">برای بازیابی رمز عبور خود لطفا ایمیل حساب کاربری خود را وارد نمایید.</h5>
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="ایمیل">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">ارسال ایمیل بازیابی رمز عبور</button>
                            </div>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
