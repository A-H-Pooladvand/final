@extends('_layouts.admin.index')

@section('content')

    @script(easyui/easyui.js)
    @style(easyui/easyui.css)
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)
    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <table id="dg"></table>

    @push('scripts')
        <script>
            $('#dg').iDataGrid({
                    title: 'لیست اماکن',
                    url: '{{ route('admin.place.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {field: 'title', sortable: true, title: 'عنوان', align: 'center'},
                        {
                            field: 'province', sortable: true, title: 'استان', align: 'center',
                            formatter: function (val, row) {
                                return row.province.title;
                            }
                        },
                        {
                            field: 'province_city', sortable: true, title: 'شهر', align: 'center',
                            formatter: function (val, row) {
                                return row.province_city.title;
                            }
                        },
                        {
                            field: 'gender', sortable: true, title: 'جنسیت', align: 'center',
                            formatter: function (val, row) {
                                return row.gender_farsi;
                            }
                        },
                        {field: 'first_address', sortable: true, title: 'آدرس اول', width: 200, align: 'center'},
                        {field: 'first_phone', sortable: true, title: 'تلفن اول', align: 'center'},
                        {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                        {field: 'updated_at', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.place.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.place.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.place.index') }}' + '/' + '{id}',
                        }
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at'],
                        label: ['place', 'province', 'province_city'],
                        combobox: {
                            'gender': [
                                {'text': 'همه', 'value': ''},
                                {'text': 'اقا', 'value': 'male'},
                                {'text': 'خانم', 'value': 'female'},
                                {'text': 'هردو', 'value': 'both'}
                            ]
                        }
                    }
                });
        </script>
    @endpush

@stop