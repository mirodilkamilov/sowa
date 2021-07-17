let maxId = $('.content-body:last-child').attr('id');
let validEditorKeys = getValidEditorKeys(maxId);


for (let lang of avilableLangs) {
    for (let i = 0; i < validEditorKeys.length; i++) {
        ClassicEditor
            .create(document.querySelector('#description-' + lang + '-' + validEditorKeys[i]), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    }
}

function getValidEditorKeys(maxId) {
    let defaultLang = 'ru';
    let validEditorKeys = [];

    for (let i = 0; i <= maxId; i++) {
        if (document.querySelector('#description-' + defaultLang + '-' + i) !== null)
            validEditorKeys.push(i);
    }

    return validEditorKeys;
}
