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
                    title: 'لیست کاربران',
                    url: '{{ route('admin.user.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'name', sortable: true, title: 'نام', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.user.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'family', sortable: true, title: 'نام خانوادگی', align: 'center'},
                        {field: 'username', sortable: true, title: 'نام کاربری', align: 'center'},
                        {field: 'mobile', sortable: true, title: 'موبایل', align: 'center'},
                        {
                            field: 'is_active', sortable: true, title: 'وضعیت حساب', align: 'center',
                            formatter: function (val, row) {
                                if (val === true)
                                    return 'فعال';
                                else
                                    return 'غیرفعال';
                            }
                        },
                        {
                            field: 'deleted_at', sortable: true, title: 'تاریخ معلق شدن', align: 'center',
                            formatter: function (val, row) {
                                if (val === null)
                                    return 'فعال';
                                else
                                    return val;
                            }
                        },
                        {field: 'created_at', sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.user.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.user.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.user.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'soft',
                            link: '{{ route('admin.user.index') }}' + '/soft/{id}',
                        },
                        {
                            name: 'link',
                            text: 'دسترسی ها',
                            icon: 'fa fa-lock',
                            link: '{{ route('admin.user.index') }}' + '/permissions/edit/{id}',
                        },
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