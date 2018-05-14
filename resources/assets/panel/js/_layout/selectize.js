let $input_tags = $('#input_tags');

let $selectize = $input_tags.selectize({
    plugins: ['remove_button'],
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    },
    dropdownParent: 'body',
    render: {
        option_create: function(data, escape) {
            return '<div class="create">اضافه کردن <strong>' + escape(data.input) + '</strong>&hellip;</div>';
        }
    },
});

let selectize = $selectize[0].selectize;

$('.selectize--tags').on('keyup', '.selectize-input', function () {
    let $keywords = $(this).find('input').val();
    if ($keywords.length >= 2) {
        $.post($selectize_url, {keywords: $keywords}).done(function (response) {
            let $selectOptions = [];
            $.each(response, function (i, val) {
                $selectOptions.push({
                    text: val.title,
                    value: val.id
                });
            });

            selectize.addOption($selectOptions);
            $keywords = '';
        });
    }
});

// CATEGORIES SETTING
$('#selectize--input_category').selectize({
    create: true,
    dropdownParent: 'body',
    render: {
        option_create: function(data, escape) {
            return '<div class="create">اضافه کردن <strong>' + escape(data.input) + '</strong>&hellip;</div>';
        }
    },

});