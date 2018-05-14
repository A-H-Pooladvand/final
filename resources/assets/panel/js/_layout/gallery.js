$(function () {
    let $lfm_counter = 0;
    let $gallery_input = $('.lfm--gallery-input');
    setLinkButton();
    appendNewImage();

// Prepare a new image tag to append for gallery
    function appendNewImage() {
        $('#lfm--wrapper').append(
            $('<div />', {class: 'col-lg-3 col-sm-3 display-none lfm--images__wrapper'}).append(
                $('<div />', {class: 'form-group form-group-sm'}).append(
                    $('<div />', {class: 'position-relative thumbnail'}).append(
                        $('<div />', {class: 'btn-remove'}),
                        $('<img />', {id: 'gallery-preview' + $lfm_counter, class: 'lfm--images full-width m-b-1', height: 150}),
                        $('<input />', {class: 'form-control m-b-1', type: 'text', name: 'lfm_gallery_title[]', placeholder: 'عنوان'}),
                        $('<input />', {class: 'form-control', type: 'number', name: 'lfm_gallery_priority[]', placeholder: 'اولویت 1-255'}),
                        $('<input />', {type: 'hidden', id: 'gallery-path' + $lfm_counter, name: 'lfm_gallery_path[]'})
                    )
                )
            )
        );
    }

    $(document).on('click', '.btn-remove', function () {
        $(this).closest('.lfm--images__wrapper').remove();
    });

// Set attributes for the <a> tag
    function setLinkButton() {
        $gallery_input.attr('data-preview', 'gallery-preview' + $lfm_counter).attr('data-input', 'gallery-path' + $lfm_counter);
    }


    $gallery_input.filemanager('image');

    $(document).on('change', '.lfm--images', function () {
        $(document).find('.lfm--images__wrapper').show();
        $lfm_counter++;
        setLinkButton();
        appendNewImage();
    });
});