var preview = $('.preview');
var placeholder = $('.placeholder');
preview.css('display', 'none');
placeholder.css('display', 'block');

function readURL(input, preview = null, width = '300px') {
    if (preview === null)
        preview = $(input).closest('.card-body').find('.preview');
        placeholder = $(input).closest('.card-body').find('.placeholder');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.attr('src', e.target.result);
            preview.css('width', width);
            placeholder.css('display', 'none');
            preview.css('display', 'block');
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}


// * Multiple images preview
function imagesPreview(input, placeToInsertImagePreview) {
    placeToInsertImagePreview.find('img').remove();
    if (input.files) {
        var filesAmount = input.files.length;

        for (var i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function (event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}

function setPreview(obj) {
    var imageType = $(obj).parents('.card').find('.custom-select').children('option:selected').val();
    var previewClassName = $(obj).closest('.card-body').find('.preview').hasClass('preview') ? 'preview' : 'slide-preview';
    var preview = $(obj).closest('.card-body').find('.' + previewClassName);

    switch (imageType) {
        case 'image-big':
            readURL(obj, preview, '100%');
            break;
        case 'slide':
            imagesPreview(obj, preview);
            break;
        default:
            readURL(obj, preview);
            break;
    }
}
