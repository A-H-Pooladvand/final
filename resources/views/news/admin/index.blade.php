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
                    title: 'لیست یادداشت و مصاحبه ها',
                    url: '{{ route('admin.news.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'title', sortable: true, width: '200', title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.news.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'summary', sortable: true, width: '200', title: 'خلاصه', align: 'center'},
                        {
                            field: 'status', sortable: true, title: 'وضعیت', align: 'center',
                            formatter: function (val, row) {
                                return row.status_farsi;
                            }
                        },
                        {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                        {field: 'updated_at', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.news.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.news.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.news.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at'],
                        combobox: {
                            'status': [
                                {'text': 'همه', 'value': ''},
                                {'text': 'منتشر شده', 'value': 'publish'},
                                {'text': 'پیشنویس', 'value': 'draft'},
                            ]
                        }
                    }
                });
        </script>
    @endpush

@stop
