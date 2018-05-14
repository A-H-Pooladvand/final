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
                    title: 'لیست صفحات',
                    url: '{{ route('admin.page.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'title', sortable: true, title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.page.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                        {field: 'updated_at', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                    ]],bar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.page.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.page.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.page.index') }}' + '/' + '{id}',
                        }
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at'],
                        combobox: {
                            'is_active': [
                                {'text': 'همه', 'value': ''},
                                {'text': 'فعال', 'value': 1},
                                {'text': 'غیرفعال', 'value': 0},
                            ]
                        }
                    }
                });
        </script>
    @endpush

@stop