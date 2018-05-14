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
            let dataGrid = $('#dg').datagrid({
                title: '&nbsp;لیست تماس ها',
                url: '{{ route('admin.contact.contacts.items') }}',
                columns: [[
                    {field: 'checkbox', checkbox: true},
                    {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                    {
                        field: 'name', sortable: true, title: 'نام', align: 'center',
                        formatter: function (val, row) {
                            return '<a href="' + '{{ route('admin.contact.contacts.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                        }
                    },
                    {field: 'email', sortable: true, title: 'ایمیل', align: 'center'},
                    {field: 'mobile', sortable: true, title: 'تلفن تماس', align: 'center'},
                    {field: 'title', sortable: true, title: 'موضوع تماس', align: 'center'},
                    {field: 'created_at', sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                ]],

                // singleSelect: true,
                toolbar: [{
                    text: 'نمایش',
                    iconCls: 'fa fa-eye',
                    handler: function () {
                        window.open('{{ route('admin.contact.contacts.index') }}' + '/' + id(), '_blank');
                    }
                }, '-', {
                    text: 'حذف',
                    iconCls: 'fa fa-trash-o',
                    handler: function () {
                        $.confirm({
                            title: 'حذف رکورد؟',
                            content: 'آیا از حذف این رکورد(ها) مطمئن هستید؟',
                            buttons: {
                                close: {
                                    text: 'خیر',
                                    btnClass: 'btn-danger',
                                },
                                confirm: {
                                    text: 'بله',
                                    btnClass: 'btn-primary',
                                    action: function () {
                                        $.post('{{ route('admin.contact.contacts.index') }}' + '/' + ids(), {_method: 'delete'}).done(function (response) {
                                            if (response['error'])
                                                $.alert({
                                                    title: 'خطا!',
                                                    content: response['error'],
                                                    buttons: {
                                                        ok: {
                                                            text: 'باشه',
                                                            btnClass: 'btn-primary',
                                                        }
                                                    }
                                                });

                                            $('#dg').datagrid('reload');
                                        });
                                    }
                                }
                            }
                        });
                    }
                }
                ]
            });

            dataGrid.datagrid('enableFilter');
        </script>
    @endpush

@stop

{{--@section('helper_block')
    <div class="form-group helper-block">
        <div class="pull-left">
            <p>Breadcrumb</p>
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ویرایش</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-danger">انصراف</a>
        </div>
    </div>
@stop--}}
