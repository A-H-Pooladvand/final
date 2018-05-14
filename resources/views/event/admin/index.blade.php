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
                    title: 'لیست برنامه های آتی',
                    url: '{{ route('admin.event.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'title', sortable: true, title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.event.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'summary', sortable: true, width: 200, title: 'خلاصه', align: 'center'},
                        {
                            field: 'province', title: 'استان', align: 'center',
                            formatter: function (val, row) {
                                return row.province.title;
                            }
                        },
                        {
                            field: 'province_city', title: 'شهر', align: 'center',
                            formatter: function (val, row) {
                                return row.province_city.title;
                            }
                        },
                        {
                            field: 'place', title: 'مکان', align: 'center',
                            formatter: function (val, row) {
                                if (row.place != undefined)
                                    return row.place.title;
                                return '';
                            }
                        },
                        {
                            field: 'releases_at', width: 150, sortable: true, title: 'تاریخ نمایش', align: 'center',
                            formatter: function (val, row) {
                                return row.releases_at_farsi;
                            }
                        },
                        {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                        {field: 'updated_at', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.event.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.event.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.event.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['releases_at', 'created_at', 'updated_at'],
                        label: ['province', 'province_city', 'place'],
                    }
                });
        </script>
    @endpush

@stop