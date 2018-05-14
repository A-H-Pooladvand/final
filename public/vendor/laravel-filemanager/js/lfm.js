(function ($) {

    $.fn.filemanager = function (type, options) {
        type = type || 'file';

        this.on('click', function (e) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/file-manager';
            localStorage.setItem('target_input', $(this).data('input'));
            localStorage.setItem('target_preview', $(this).data('preview'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (url, file_path) {
                //set the value of the desired input to image url
                var target_input = $('#' + localStorage.getItem('target_input'));
                target_input.val(file_path).trigger('change');

                //set or change the preview image src
                var target_preview = $('#' + localStorage.getItem('target_preview'));
                target_preview.attr('src', url).trigger('change');
            };
            return false;
        });

        $('.lfm--gallery-input').click(function (e) {
            var $this = $(this);

            var route_prefix = (options && options.prefix) ? options.prefix : '/file-manager';
            localStorage.setItem('target_input', $(this).attr('data-input'));
            localStorage.setItem('target_preview', $(this).attr('data-preview'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');

            window.SetUrl = function (url, file_path) {

                // var target_input = $('#' + localStorage.getItem('target_input'));
                var target_input = $this.closest('.lfm--gallery-container').find('input[type="hidden"]').last();

                target_input.val(file_path).trigger('change');

                // var target_preview = $this.closest('.lfm--gallery-container').find('.' + localStorage.getItem('target_preview'));
                var target_preview = $this.closest('.lfm--gallery-container').find('img').last();
                target_preview.attr('src', url).trigger('change');

            };
            return false;
        });

        $('.lfm--multimedia-input').click(function (e) {
            var $this = $(this);

            var route_prefix = (options && options.prefix) ? options.prefix : '/file-manager';
            localStorage.setItem('target_input', $(this).attr('data-input'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');

            window.SetUrl = function (url, file_path) {

                // var target_input = $('#' + localStorage.getItem('target_input'));
                var target_input = $this.closest('.lfm--multimedia-container').find('input[type="hidden"]').last();
                var target_span = $this.closest('.lfm--multimedia-container').find('.lfm--multimedia-text').last();

                var last = url.substring(url.lastIndexOf("/") + 1, url.length);

                target_span.text(last);
                target_input.val(file_path).trigger('change');
            };
            return false;
        });
    }

})(jQuery);