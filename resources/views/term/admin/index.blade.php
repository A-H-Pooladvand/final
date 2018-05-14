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
                    title: 'لیست دوره ها',
                    url: '{{ route('admin.term.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'title', sortable: true, title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.term.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {
                            field: 'start_at', sortable: true, width: 150, title: 'تاریخ شروع', align: 'center',
                            formatter: function (val, row) {
                                return row.start_at_farsi;
                            }
                        },
                        {
                            field: 'end_at', sortable: true, width: 150, title: 'تاریخ پایان', align: 'center',
                            formatter: function (val, row) {
                                return row.end_at_farsi;
                            }
                        },
                        {field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.term.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.term.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.term.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at', 'start_at', 'end_at'],
                    }
                });

        </script>
    @endpush

@stop