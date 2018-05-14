@extends('_layouts.admin.index')


@section('content')

    <div class="form-group">
        <h1>{{ $about->title }}</h1>
    </div>

    <div class="form-group">
        <img src="{{ image_url($about->image, 30,30,true) }}" alt="{{ $about->title }}">
    </div>

    <div class="form-group">
        <p class="well">{!! $about->content !!}</p>
    </div>

@stop

@section('helper_block')
    <div class="form-group helper-block">
        <div class="text-right">
            <a href="{{ route('admin.about.edit', 1) }}" class="btn btn-info">ویرایش</a>
        </div>
    </div>
@stop