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

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $term->author->id) }}">{{ $term->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $term['title'] }}</td>
        </tr>


        <tr>
            <th>خلاصه</th>
            <td>{!! $term['summary'] !!}</td>
        </tr>

        <tr>
            <th>توضیحات</th>
            <td>{!! $term['description'] !!}</td>
        </tr>


        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($term['image'], 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>


        <tr>
            <th>تاریخ شروع</th>
            <td>{{ jdate($term['start_at'])->format('Y/m/d') }}</td>
        </tr>

        <tr>
            <th>تاریخ پایان</th>
            <td>{{ jdate($term['end_at'])->format('Y/m/d') }}</td>
        </tr>

        @if(!empty($term['categories']))
            <tr>
                <th>دسته بندی ها</th>
                <td>
                    @foreach($term['categories'] as $item)
                        <span class="label label-info m-l-0-5 inline-block">
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!empty($term['exams']))
            <tr>
                <th>دوره ها</th>
                <td>
                    @foreach($term['exams'] as $item)
                        <span class="label label-info m-l-0-5 inline-block">
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!empty($term['courses']))
            <tr>
                <th>درس ها</th>
                <td>
                    @foreach($term['courses'] as $item)
                        <span class="label label-info m-l-0-5 inline-block">
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        <tr>
            <th>محل برگذاری</th>
            <td>
                 <span class=" m-l-0-5 inline-block m-b-0-5">
                     {{ $term['place']['title'] }}
                 </span>
                @script(location-picker/location-picker.js)
                @push('top-scripts')
                    <script type="text/javascript" src="{{ env('GOOGLE_MAP') }}"></script>
                @endpush

                <div class="form-group">
                    <div id="location-picker" class="thumbnail full-width" style="height: 400px;"></div>

                </div>

                @push('scripts')
                    <script>
                        $('#location-picker').locationpicker({
                            location: {
                                latitude: parseFloat('{{ $term->place->map_lat  }}'),
                                longitude: parseFloat('{{ $term->place->map_lng  }}'),
                            },
                            radius: 0,
                            zoom: 13,
                        });
                    </script>
                @endpush
            </td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $term['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $term['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('term-show', $term) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.term.edit', $term->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop