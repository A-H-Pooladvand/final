if ($.fn.pagination){
	$.fn.pagination.defaults.beforePageText = 'صفحه';
	$.fn.pagination.defaults.afterPageText = 'از {pages}';
	$.fn.pagination.defaults.displayMsg = 'نمایش {from} تا {to} از {total} رکورد';
}
if ($.fn.datagrid){
	$.fn.datagrid.defaults.loadMsg = 'در حال پردازش لطفا شکیبا باشید';
}
if ($.fn.treegrid && $.fn.datagrid){
	$.fn.treegrid.defaults.loadMsg = $.fn.datagrid.defaults.loadMsg;
}
if ($.messager){
	$.messager.defaults.ok = 'تایید';
	$.messager.defaults.cancel = 'انصراف';
}
$.map(['validatebox','textbox','passwordbox','filebox','searchbox',
		'combo','combobox','combogrid','combotree',
		'datebox','datetimebox','numberbox',
		'spinner','numberspinner','timespinner','datetimespinner'], function(plugin){
	if ($.fn[plugin]){
		$.fn[plugin].defaults.missingMessage = 'این فیلد مورد نیاز است';
	}
});
if ($.fn.validatebox){
	$.fn.validatebox.defaults.rules.email.message = 'لطفا آدرس ایمیل صحیح وارد نمایید';
	$.fn.validatebox.defaults.rules.url.message = 'لطفا آدرس صحیحی وارد نمایید';
	$.fn.validatebox.defaults.rules.length.message = 'لطفا مفداری از {0} و {1} انتخاب نمایید';
	$.fn.validatebox.defaults.rules.remote.message = 'لطفا این فیلد را تصحیح نمایید';
}
if ($.fn.calendar){
	$.fn.calendar.defaults.weeks = ['S','M','T','W','T','F','S'];
	$.fn.calendar.defaults.months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
}
if ($.fn.datebox){
	$.fn.datebox.defaults.currentText = 'Today';
	$.fn.datebox.defaults.closeText = 'بستن';
	$.fn.datebox.defaults.okText = 'تایید';
}
if ($.fn.datetimebox && $.fn.datebox){
	$.extend($.fn.datetimebox.defaults,{
		currentText: $.fn.datebox.defaults.currentText,
		closeText: $.fn.datebox.defaults.closeText,
		okText: $.fn.datebox.defaults.okText
	});
}
