$(function () {
    let $lfm_counter = 0;
    let $gallery_input = $('.lfm--gallery-input');
    $gallery_input.filemanager('image');
    let firstLink = true;
    let $activeSection;
    setLinkButton();


    // Set attributes for the <a> tag
    function setLinkButton() {

        if (firstLink) {
            $.each($gallery_input, function (i, val) {

                $(val).attr('data-preview', 'gallery-preview' + $lfm_counter)
                    .attr('data-input', 'gallery-path' + $lfm_counter)
                    .attr('id', 'gallery--trigger-button' + i)
                    .closest('.lfm--gallery-container')
                    .find('.lfm--gallery-wrapper')
                    .attr('id', 'lfm--gallery-wrapper' + i)
                    .attr('data-id', i);

                defaultImageSetup(i);
            });
            firstLink = false;
        } else {
            $gallery_input.attr('data-preview', 'gallery-preview' + $lfm_counter).attr('data-input', 'gallery-path' + $lfm_counter);
        }

    }

    // Prepare a new image to append for gallery
    function defaultImageSetup(i) {
        $(document).find('#lfm--gallery-wrapper' + i).append(
            $('<div />', {class: 'col-lg-3 col-sm-3 display-none lfm--images__wrapper'}).append(
                $('<div />', {class: 'form-group form-group-sm'}).append(
                    $('<div />', {class: 'position-relative thumbnail'}).append(
                        $('<div />', {class: 'btn-remove'}),
                        $('<img />', {class: 'lfm--images full-width m-b-1 gallery-preview' + $lfm_counter, height: 150}),
                        $('<input />', {class: 'form-control m-b-1', type: 'text', name: 'lfm_gallery_title' + i + '[]', placeholder: 'عنوان'}),
                        $('<input />', {class: 'form-control', type: 'number', name: 'lfm_gallery_priority' + i + '[]', placeholder: 'اولویت 1-255'}),
                        $('<input />', {type: 'hidden', class: 'gallery-path' + $lfm_counter, name: 'lfm_gallery_path' + i + '[]'})
                    )
                )
            )
        );
    }

    // Prepare a new image to append for gallery
    function appendNewImage(dataId) {
        $activeSection.append(
            $('<div />', {class: 'col-lg-3 col-sm-3 display-none lfm--images__wrapper'}).append(
                $('<div />', {class: 'form-group form-group-sm'}).append(
                    $('<div />', {class: 'position-relative thumbnail'}).append(
                        $('<div />', {class: 'btn-remove'}),
                        $('<img />', {class: 'lfm--images full-width m-b-1 gallery-preview' + $lfm_counter, height: 150}),
                        $('<input />', {class: 'form-control m-b-1', type: 'text', name: 'lfm_gallery_title' + dataId + '[]', placeholder: 'عنوان'}),
                        $('<input />', {class: 'form-control', type: 'number', name: 'lfm_gallery_priority' + dataId + '[]', placeholder: 'اولویت 1-255'}),
                        $('<input />', {type: 'hidden', class: 'gallery-path' + $lfm_counter, name: 'lfm_gallery_path' + dataId + '[]'})
                    )
                )
            )
        );
    }

    $(document).on('click', '.btn-remove', function () {
        $(this).closest('.lfm--images__wrapper').remove();
    });

    $(document).on('change', '.lfm--images', function () {
        let $dataId = $(this).closest('.lfm--gallery-wrapper').attr('data-id');
        let $currentSection = $('#lfm--gallery-wrapper' + $dataId);
        $activeSection = $currentSection;

        $currentSection.find('.lfm--images__wrapper').show();
        $lfm_counter++;
        setLinkButton();
        appendNewImage($dataId);
    });

    /* *********************
    | **********************
    | **********************
    | ***** MULTIMEDIA *****
    | **********************
    | **********************
    | **********************
    */
    let firstMultiMedia = true;
    let $multimedia_input = $('.lfm--multimedia-input');
    $multimedia_input.filemanager('file');
    setMultimediaButton();

// Set attributes for the <a> tag
    function setMultimediaButton() {

        if (firstMultiMedia) {
            $.each($multimedia_input, function (i, val) {

                $(val).attr('data-input', 'multimedia-path' + $lfm_counter)
                    .attr('id', 'multimedia--trigger-button' + i)
                    .closest('.lfm--multimedia-container')
                    .find('.lfm--multimedia-wrapper')
                    .attr('id', 'lfm--multimedia-wrapper' + i)
                    .attr('data-id', i);

                defaultMultimediaSetup(i);
            });
            firstMultiMedia = false;
        } else {
            $multimedia_input.attr('data-input', 'multimedia-path' + $lfm_counter);
        }


    }

    // Prepare a new image to append for multimedia
    function defaultMultimediaSetup(i) {
        $(document).find('#lfm--multimedia-wrapper' + i).append(
            $('<div />', {class: 'col-lg-3 col-sm-3 display-none lfm--images__wrapper'}).append(
                $('<div />', {class: 'form-group form-group-sm'}).append(
                    $('<div />', {class: 'position-relative thumbnail text-center'}).append(
                        $('<div />', {class: 'btn-remove'}),
                        $('<i />', {class: 'fa fa-play-circle fa-5x p-t-3 p-b-3 text-info'}),
                        $('<div />', {class: 'full-width lfm--multimedia-text alert alert-success'}),
                        $('<input />', {class: 'form-control m-b-1', type: 'text', name: 'lfm_multimedia_title' + i + '[]', placeholder: 'عنوان'}),
                        $('<input />', {class: 'form-control', type: 'number', name: 'lfm_multimedia_priority' + i + '[]', placeholder: 'اولویت 1-255'}),
                        $('<input />', {type: 'hidden', class: 'lfm--multimedia multimedia-path' + $lfm_counter, name: 'lfm_multimedia_path' + i + '[]'})
                    )
                )
            )
        );
    }

    // Prepare a new Multimedia to append for multimedia
    function appendNewMultimedia(dataId) {
        $activeSection.append(
            $('<div />', {class: 'col-lg-3 col-sm-3 display-none lfm--images__wrapper'}).append(
                $('<div />', {class: 'form-group form-group-sm'}).append(
                    $('<div />', {class: 'position-relative text-center thumbnail'}).append(
                        $('<div />', {class: 'btn-remove'}),
                        $('<i />', {class: 'fa fa-play-circle fa-5x p-t-3 p-b-3 text-info'}),
                        $('<div />', {class: 'full-width lfm--multimedia-text alert alert-success'}),
                        $('<input />', {class: 'form-control m-b-1', type: 'text', name: 'lfm_multimedia_title' + dataId + '[]', placeholder: 'عنوان'}),
                        $('<input />', {class: 'form-control', type: 'number', name: 'lfm_multimedia_priority' + dataId + '[]', placeholder: 'اولویت 1-255'}),
                        $('<input />', {type: 'hidden', class: 'lfm--multimedia multimedia-path' + $lfm_counter, name: 'lfm_multimedia_path' + dataId + '[]'})
                    )
                )
            )
        );
    }

    $(document).on('change', '.lfm--multimedia', function () {
        let $dataId = $(this).closest('.lfm--multimedia-wrapper').attr('data-id');
        let $currentSection = $('#lfm--multimedia-wrapper' + $dataId);
        $activeSection = $currentSection;

        $currentSection.find('.lfm--images__wrapper').show();
        $lfm_counter++;
        setMultimediaButton();
        appendNewMultimedia($dataId);
    });

});
