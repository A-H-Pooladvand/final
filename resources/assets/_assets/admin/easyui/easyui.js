require('./files/jquery.easyui.min');
require('./files/easyui-rtl');
require('./files/datagrid-filter');
require('./files/easyui-lang-fa');
require('./files/filter');
require('./files/datagrid');
require('./files/append');
// require('./files/treegrid-dnd');


// JEasyUi Default Setups

$('#dg').datagrid({
    pageList: [10, 20, 50, 100],
    remoteFilter: true,
    striped: true,
    pagination: true,
    filterBtnIconCls: 'fa fa-chevron-down',
    // filterMenuIconCls: 'fa fa-check',
    filterDelay: 1000,
    rownumbers: true,
    height: 500,
    iconCls: 'fa fa-diamond',
    collapsible: true,
    maximizable: true,
});

let $tg = $('#tt').treegrid({
    lines: true,
    animate: true,
    // checkbox: true,
    pageList: [10, 20, 50, 100],
    remoteFilter: true,
    singleSelect: false,
    striped: true,
    pagination: true,
    filterBtnIconCls: 'fa fa-chevron-down',
    // filterMenuIconCls: 'fa fa-check',
    filterDelay: 1000,
    rownumbers: true,
    height: 500,
    iconCls: 'fa fa-diamond',
    collapsible: true,
    maximizable: true,

    onLoadSuccess: function () {
        // $tg.treegrid('collapseAll');
        // $tg.treegrid('enableDnd');
        $tg.treegrid('enableFilter');



    }
});

$.fn.datebox.defaults.formatter = function (date) {
    let y = date.getFullYear();
    let m = date.getMonth() + 1;
    let d = date.getDate();
    return y + '/' + (m < 10 ? '0' + m : m) + '/' + (d < 10 ? '0' + d : d);
};


$.fn.datebox.defaults.parser = function (s) {
    if (s) {
        let a = s.split('/');
        let d = new Number(a[0]);
        let m = new Number(a[1]);
        let y = new Number(a[2]);
        let dd = new Date(d, m - 1, y);
        return dd;
    } else {
        return new Date();
    }
};








