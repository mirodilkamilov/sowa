var avilableLangs = ['ru', 'en', 'uz'];

function changeLangTabs(obj) {
    var allClassNames = obj.className;
    var currentLang = allClassNames.substring(allClassNames.length - 16, allClassNames.length - 14);

    if (!avilableLangs.includes(currentLang))
        return;

    for (let lang of avilableLangs) {
        if (currentLang === lang) {
            $('.' + currentLang + '-tab-justified').addClass('active');
            $('.tab-pane-' + currentLang).addClass('active');
            continue;
        }
        $('.' + lang + '-tab-justified').removeClass('active');
        $('.tab-pane-' + lang).removeClass('active');
    }
}
