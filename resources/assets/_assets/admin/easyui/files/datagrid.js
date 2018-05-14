$.fn.iDataGrid = function (options, rules) {

    let $columns = getColumns(options.toolbar);

    let $data_grid_setup = {
        title: '&nbsp;' + options.title,
        url: options.url,
        columns: options.columns,
        toolbar: $columns
    };

    this.datagrid($data_grid_setup);

    this.datagridFilter(rules);
};

$.fn.iTreeGrid = function (options, rules) {

    let $columns = treeColumns(options.toolbar);

    let $data_grid_setup = {
        title: '&nbsp;' + options.title,
        url: options.url,
        columns: options.columns,
        idField: options.idField,
        treeField: options.treeField,
        toolbar: $columns
    };

    this.treegrid($data_grid_setup);

    this.datagridFilter(rules);

};

function getColumns(toolbar) {

    let $columns = [];

    if (toolbar) {

        $.each(toolbar, function (i, val) {


            switch (val.name) {

                case 'show':
                    $columns.push({
                        text: 'نمایش',
                        iconCls: 'fa fa-eye',
                        handler: function () {
                            window.open(multipleId(val.link), '_blank');
                        }
                    });
                    break;
                case 'edit':
                    $columns.push({
                        text: 'ویرایش',
                        iconCls: 'fa fa-pencil',
                        handler: function () {
                            window.open(singleId(val.link), '_blank'
                            );
                        }
                    });
                    break;
                case 'delete':
                    $columns.push({
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
                                            $.post(multipleId(val.link), {_method: 'delete'}).done(function (response) {
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
                    });
                    break;
                case 'soft':
                    $columns.push({
                        text: 'معلق/غیر معلق',
                        iconCls: 'fa fa-ban',
                        handler: function () {
                            $.post(multipleId(val.link), {_method: 'delete'}).done(function () {
                                $('#dg').datagrid('reload');
                            });
                        }
                    });
                    break;
                case 'link':
                    $columns.push({
                        text: val.text,
                        iconCls: val.icon,
                        handler: function () {
                            window.open(singleId(val.link), '_blank'
                            );
                        }
                    });
            }

        });

    }

    return $columns;

}

function id() {
    return $('#dg').datagrid('getSelected').id;
}

function ids() {
    let ids = [];
    let rows = $('#dg').datagrid('getSelections');
    for (let i = 0; i < rows.length; i++) {
        ids.push(rows[i].id);
    }
    return ids;
}

function treeId() {
    return $('#tt').treegrid('getSelected').id;
}

function treeIds() {
    let ids = [];
    let rows = $('#tt').treegrid('getSelections');
    for (let i = 0; i < rows.length; i++) {
        ids.push(rows[i].id);
    }
    return ids;
}

// Takes a string and replaces {id} with real id
function singleId(link) {
    return link.replace('{id}', ids()[0]);
}

// Takes a string and replaces {id} with array of ids
function multipleId(link) {
    return link.replace('{id}', ids());
}

// Takes a string and replaces {id} with real id
function treeSingleId(link) {
    return link.replace('{id}', treeId());
}

// Takes a string and replaces {id} with array of ids
function treeMultipleId(link) {
    return link.replace('{id}', treeIds());
}


function treeColumns(toolbar) {

    let $columns = [];

    if (toolbar) {

        $.each(toolbar, function (i, val) {

            switch (val.name) {

                case 'show':
                    $columns.push({
                        text: 'نمایش',
                        iconCls: 'fa fa-eye',
                        handler: function () {
                            window.open(treeMultipleId(val.link), '_blank');
                        }
                    });
                    break;
                case 'edit':
                    $columns.push({
                        text: 'ویرایش',
                        iconCls: 'fa fa-pencil',
                        handler: function () {
                            window.open(treeSingleId(val.link), '_blank'
                            );
                        }
                    });
                    break;
                case 'delete':
                    $columns.push({
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
                                            $.post(treeMultipleId(val.link), {_method: 'delete'}).done(function (response) {
                                                if (response['error']) {
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
                                                }

                                                if (response['delete_errors']) {
                                                    $.alert({
                                                        title: 'هشدار!',
                                                        content: response['delete_errors'],
                                                        icon: 'fa fa-exclamation-triangle text-warning',
                                                        buttons: {
                                                            ok: {
                                                                text: 'باشه',
                                                                btnClass: 'btn-primary',
                                                            }
                                                        }
                                                    });
                                                }
                                                $('#tt').treegrid('reload');
                                            });
                                        }
                                    }
                                }
                            });
                        }
                    });
                    break;
                case 'soft':
                    $columns.push({
                        text: 'معلق/غیر معلق',
                        iconCls: 'fa fa-ban',
                        handler: function () {
                            $.post(treeMultipleId(val.link), {_method: 'delete'}).done(function () {
                                $('#tt').treegrid('reload');
                            });
                        }
                    });
                    break;
                case 'link':
                    $columns.push({
                        text: val.text,
                        iconCls: val.icon,
                        handler: function () {
                            window.open(singleId(val.link), '_blank'
                            );
                        }
                    });
            }

        });

    }

    return $columns;

}