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
                    title: 'لیست کتاب ها',
                    url: '{{ route('admin.book.items') }}',
                    columns: [
                        [
                            {field: 'checkbox', checkbox: true},
                            {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                            {
                                field: 'title', sortable: true, title: 'عنوان', align: 'center',
                                formatter: function (val, row) {
                                    return '<a href="' + '{{ route('admin.book.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                                }
                            },
                            {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                            {field: 'updated_at', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                        ]
                    ],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.book.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.book.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.book.index') }}' + '/' + '{id}',
                        }
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at'],
                    }
                });
        </script>
    @endpush

@stop