var allEditorIds = [
    '#about-description-',
    '#help-description-',
    '#description-'
];

let validEditorIds = getValidEditorIds(allEditorIds);

for (let lang of avilableLangs) {
    for (let i = 0; i < validEditorIds.length; i++) {
        ClassicEditor
            .create(document.querySelector(validEditorIds[i] + lang), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    }
}

function getValidEditorIds(allEditorIds) {
    let defaultLang = 'ru';
    let validEditorIds = [];

    for (let editorId of allEditorIds) {
        if (document.querySelector(editorId + defaultLang) !== null)
            validEditorIds.push(editorId);
    }

    return validEditorIds;
}
