@extends('_layouts.front.index')


@section('content')
    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area">
            <div class="container">
                <div class="kopa-contact-form">
                    <div>
                        {!! $contact->content !!}
                    </div>

                    <hr>
                    {{--<h2>ارسال پیام</h2>--}}

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @else

                        <div role="form" class="wpcf7">

                            <form method="post" class="wpcf7-form" novalidate="novalidate" action="{{ route('contact.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <p>
                                                <label>
                                            <span class="name">
                                                <input type="text" name="name" aria-required="true" aria-invalid="false" placeholder="نام و نام خانوادگی">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <p>
                                                <label>
                                            <span class="email">
                                                <input type="email" name="email" aria-required="true" aria-invalid="false" placeholder="ایمیل">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <p>
                                                <label>
                                            <span class="title">
                                                <input type="text" name="title" aria-invalid="false" placeholder="موضوع پیام">
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <p>
                                                <label>
                                            <span class="mobile">
                                                <input type="text" name="mobile" aria-invalid="false" placeholder="شماره تماس">
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('mobile') }}</strong>
                                                    </span>
                                                @endif
                                            </span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <p>
                                                <label>
                                            <span class="content">
                                                <textarea name="content" cols="40" rows="10" aria-invalid="false" placeholder="پیام شما..."></textarea>
                                                @if ($errors->has('content'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('content') }}</strong>
                                                    </span>
                                                @endif
                                            </span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <p>
                                            <input type="submit" value="ارسال پیـــام">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @endif

                </div>
            </div>
        </section>

    </div>

@stop
