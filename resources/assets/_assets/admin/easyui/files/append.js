if ($.fn.datagrid) {
    $.extend($.fn.datagrid.defaults.operators, {
        nofilter: {text: 'بدون فیلتر'},
        contains: {text: 'شامل'},
        equal: {text: 'مساوی'},
        notequal: {text: 'نامساوی'},
        beginwith: {text: 'شروع شود با'},
        endwith: {text: 'پایان یابد با'},
        less: {text: 'کوچکتر'},
        lessorequal: {text: 'کوچکتر مساوی'},
        greater: {text: 'بزرگتر'},
        greaterorequal: {text: 'بزرگتر مساوی'},
        active: {text: 'فعال'},
        inactive: {text: 'غیر فعال'}
    });
}
$(function () {

    $(document).find('.datagrid-header-row td .datebox').each(function (i, val) {

        $(this).append('<input style="cursor: pointer" type="text" class="form-control text-center dg-date-picker"\n' +
            'id="date-input' + i + '"\n' +
            'data-mddatetimepicker="true"\n' +
            'data-trigger="click"\n' +
            'data-targetselector="#date-input' + i + '"\n' +
            'data-groupid="group1"\n' +
            'data-fromdate="true"\n' +
            'data-enabletimepicker="false"\n' +
            'data-englishnumber="true"\n' +
            'data-format="dd/MM/yyyy"\n' +
            'data-placement="bottom" readonly/>');
    });

    $(document).on('change', '.dg-date-picker', function () {
        $(this).closest('span').find('.textbox-value').val($(this).val());
    });


});