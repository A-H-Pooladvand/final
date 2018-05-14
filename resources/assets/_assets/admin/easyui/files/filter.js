(function ($) {
    "use strict";

    $.fn.datagridFilter = function (rules) {

        let datagrid = $(this);

        let filters = [];

        $.each(rules.filters.text, function (i, v) {
            filters.push({
                field: v,
                type: 'text',
                op: ['contains', 'beginwith', 'endwith', 'equal'],
                options: {}
            })
        });

        $.each(rules.filters.integer, function (i, v) {
            filters.push({
                field: v,
                type: 'numberbox',
                op: ['contains', 'equal', 'notequal', 'less', 'lessorequal', 'greater', 'greaterorequal'],
                options: {precision: 0}
            });
        });

        $.each(rules.filters.date, function (i, v) {
            filters.push({
                field: v,
                type: 'datebox',
                op: [/*'contains',*/ 'equal', /*'notequal',*/ 'less', /*'lessorequal',*/ 'greater', /*'greaterorequal'*/],
                options: {}
            });
        });

        $.each(rules.filters.label, function (i, v) {
            filters.push({
                field: v,
                type: 'label',
            });
        });

        $.each(rules.filters.combobox, function (i, v) {

            filters.push({
                field: i,
                type: 'combobox',
                options: {
                    data: v,
                    panelHeight: 'auto',
                    onChange: function (value) {
                        if (value === '') {
                            datagrid.datagrid('removeFilterRule', i);
                        } else {
                            datagrid.datagrid('addFilterRule', {
                                field: i,
                                op: 'equal',
                                value: value,
                            });

                        }
                        datagrid.datagrid('doFilter');
                    }
                },
            });
        });

        /*$.each(datagrid.datagrid('getColumnFields'), function (i, v) {
            if (typeof filters[v] === 'undefined') {
                filters.push({
                    field: v,
                    type: 'label'
                });
            }
        });*/

        datagrid.datagrid('enableFilter', filters);

    };

}(jQuery));