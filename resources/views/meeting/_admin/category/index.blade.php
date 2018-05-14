@extends('_layouts.admin.index')

@section('content')

    @script(easyui/easyui.js)
    @style(easyui/easyui.css)
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)
    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <table id="tt" class="full-width"></table>

    @push('scripts')
        <script>

            $('#tt').iTreeGrid({
                    title: 'لیست دسته بندی های نشست ها',
                    url: '{{ route('admin.meeting.category.items') }}',
                    idField: 'id',
                    treeField: 'title',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'title', title: 'عنوان'},
                        {field: 'slug', title: 'نامک', halign: 'center'},
                        {field: 'created_at', width: 150, align: 'center', title: 'تاریخ ایجاد'},
                        {field: 'updated_at', width: 150, align: 'center', title: 'تاریخ ویرایش'}
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.meeting.category.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.meeting.category.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.meeting.category.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at']
                    }
                }
            );

        </script>
    @endpush

@stop
