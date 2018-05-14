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
                <a href="{{ route('admin.user.show', $meeting->author->id) }}">{{ $meeting->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $meeting['title'] }}</td>
        </tr>


        <tr>
            <th>خلاصه</th>
            <td>{{ $meeting['summary'] }}</td>
        </tr>

        <tr>
            <th>توضیحات</th>
            <td>{!! $meeting['description'] !!}</td>
        </tr>


        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($meeting['image'], 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>
        @if(!empty($meeting['categories']))
            <tr>
                <th>دسته بندی ها</th>
                <td>
                    @foreach($meeting['categories'] as $item)
                        <span class="label label-info m-l-0-5 inline-block">
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!empty($meeting['course']))
            <tr>
                <th>درس ها</th>
                <td>
                    <span class="label label-info m-l-0-5 inline-block">
                        {{ $item['course']['title'] }}
                    </span>
                </td>
            </tr>

        @endif

        <tr>
            <th>محل برگذاری</th>
            <td>
                 <span class=" m-l-0-5 inline-block m-b-0-5">
                     {{ $meeting['place']['title'] }}
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
                                latitude: parseFloat('{{ $meeting->place->map_lat  }}'),
                                longitude: parseFloat('{{ $meeting->place->map_lng  }}'),
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
            <td>{{ $meeting['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $meeting['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('meeting-show', $meeting) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.meeting.edit', $meeting->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop