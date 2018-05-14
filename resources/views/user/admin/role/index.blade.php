@extends('_layouts.admin.index')

@section('content')

    @script(easyui/easyui.js)
    @style(easyui/easyui.css)
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)

    <table id="dg"></table>

    @push('scripts')
        <script>

            $('#dg').iDataGrid({
                    title: 'لیست نقش ها',
                    url: '{{ route('admin.role.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'display_name', sortable: true, title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.role.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'description', sortable: true, title: 'توضیحات', align: 'center'},
                        {field: 'created_at', sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                        {field: 'updated_at', sortable: true, title: 'تاریخ ویرایش', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.role.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.role.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.role.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at']
                    }
                });
        </script>
    @endpush

@stop