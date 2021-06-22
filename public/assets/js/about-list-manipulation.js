function addListItem(obj) {
    // * btnId = 1-ru
    let btnId = $(obj).attr('id');
    let listId = btnId.substring(0, 1);
    let listLang = btnId.substring(2, 4);

    var listItem = `<div class="list-item-container">
                  <div class="list-item">
                    <input
                        name="list[` + listId + `][list][` + listLang + `][]"
                        type="text"
                        class="form-control" autofocus>
                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item" onclick="removeListItem(this)"></i>
                  </div>
                </div>`;

    $(obj).parents('.row').find('.list-container-' + btnId + ' .form-label-group').append(listItem);
}

function removeListItem(obj) {
    $(obj).parent().find('p.text-danger').remove();
    $(obj).parents('.list-item-container').remove();
}
