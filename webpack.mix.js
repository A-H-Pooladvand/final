let mix = require('laravel-mix');

// Admin Panel Layout Scripts
mix.js([
    'resources/assets/admin/js/app.js',
    'resources/assets/admin/js/_layout/sidebar.js',
    'resources/assets/admin/js/_layout/header.js',
    'resources/assets/admin/js/_layout/ajax_post.js',
    'public/vendor/laravel-filemanager/js/lfm.js',
    'resources/assets/admin/js/_layout/gallery.js',
], 'public/js/admin.js')
    .sass('resources/assets/admin/sass/app.scss', 'public/css/admin.css');

/* File-Manager assets */
mix.scripts([
    'resources/assets/admin/file-manager/js/jquery.min.js',
    'resources/assets/admin/file-manager/js/bootstrap.min.js',
    'resources/assets/admin/file-manager/js/bootbox.min.js',
    'resources/assets/admin/file-manager/js/jquery-ui.min.js',
    'resources/assets/admin/file-manager/js/cropper.min.js',
    'resources/assets/admin/file-manager/js/jquery.form.min.js',
    'resources/assets/admin/file-manager/js/dropzone.min.js',
], 'public/js/file-manager.js')
    .sass('resources/assets/admin/file-manager/css/app.scss', 'public/css/file-manager.css');


//  Panel Layout Scripts
mix.js([
    'resources/assets/panel/js/app.js',
    'resources/assets/panel/js/_layout/sidebar.js',
    'resources/assets/panel/js/_layout/header.js',
    'resources/assets/panel/js/_layout/ajax_post.js',
    'public/vendor/laravel-filemanager/js/lfm.js',
    'resources/assets/panel/js/_layout/gallery.js',
], 'public/js/panel.js')
    .sass('resources/assets/panel/sass/app.scss', 'public/css/panel.css');


// ----- Front -----


// Admin Panel Layout Scripts
mix.js([
    'resources/assets/front/js/app.js',
], 'public/js/front.js')
    .sass('resources/assets/front/sass/app.scss', 'public/css/front.css');


// ----- Global -----

// jquery-confirm
mix.scripts([
    'node_modules/jquery-confirm/dist/jquery-confirm.min.js',
    'resources/assets/admin/js/_layout/jquery-confirm.js',
], 'public/assets/jquery-confirm/jquery-confirm.js')
    .copy('node_modules/jquery-confirm/dist/jquery-confirm.min.css', 'public/assets/jquery-confirm/jquery-confirm.css');

// jquery-location-picker
mix.js([
    'resources/assets/_assets/public/jquery-location-picker/jquery-location-picker.js',
], 'public/assets/location-picker/location-picker.js');

// Tiny MCE
mix.js('resources/assets/_assets/admin/tinymce/init.js', 'public/assets/tinymce/tinymce.js')
    .copyDirectory('node_modules/tinymce/skins', 'public/assets/tinymce/skins')
    .copyDirectory('node_modules/tinymce/plugins', 'public/assets/tinymce/plugins')
    .copy('node_modules/tinymce-i18n/langs/fa_IR.js', 'public/assets/tinymce/langs/fa_IR.js');

// JEasyUi
mix.js('resources/assets/_assets/admin/easyui/easyui.js', 'public/assets/easyui/easyui.js')
    .sass('resources/assets/admin/sass/_components/easyui/_init.scss', 'public/assets/easyui/easyui.css')
    .copy('resources/assets/_assets/admin/easyui/files/filter.png', 'public/assets/easyui/filter.png')
    .copyDirectory('resources/assets/_assets/admin/easyui/files/icons', 'public/assets/easyui/images');


// Bootstrap Date Picker
mix.scripts([
    'node_modules/md.bootstrappersiandatetimepicker/MD.BootstrapPersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jalaali.js',
    'node_modules/md.bootstrappersiandatetimepicker/MD.BootstrapPersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js',
], 'public/assets/datepicker/datepicker.js')
    .copy(
        'node_modules/md.bootstrappersiandatetimepicker/MD.BootstrapPersianDateTimePicker/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css',
        'public/assets/datepicker/datepicker.css');

// Selectize
mix.babel([
    'node_modules/selectize/dist/js/standalone/selectize.js',
    'resources/assets/admin/js/_layout/selectize.js'
], 'public/assets/selectize/selectize.js')
    .copy('node_modules/selectize/dist/css/selectize.css', 'public/assets/selectize/selectize.css');