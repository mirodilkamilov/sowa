function changeContentType(select) {
    // * remove existing content if any
    var changedContent = $(select).parents('.card');
    changedContent.find('.card-body').remove();
    var changedContentId = changedContent.attr('id');

    createContent(changedContentId, select.value);
}

$('.add-content-btn').on('click', function () {
    createSingleTemplate();
});

$('.add-template-btn').on('click', function () {
    var templateMessage = $('.content-container .template-message');
    let existingContent = $('.content-body').length;

    if (existingContent === 0) {
        createFullTemplate();
        return;
    }

    if (templateMessage.length > 0)
        templateMessage.remove();

    templateMessage = `<div class="template-message alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="mb-0"><i class="feather icon-alert-circle"></i>
                        Cannot generate template. Content already exist
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
    $('.content-container').append(templateMessage);
});

function createFullTemplate() {
    var contentType;

    for (let i = 1; i <= 6; i++) {
        if (i % 2 === 1)
            contentType = 'text';
        else if (i === 2)
            contentType = 'image-small';
        else if (i === 4)
            contentType = 'slide';
        else if (i === 6)
            contentType = 'image-big';

        let contentId = createSingleTemplate(contentType);
        createContent(contentId, contentType);
    }
}

function createSingleTemplate(contentType = 'none') {
    let lastContentId = $('.content-body').last().attr('id') ?? 0;
    ++lastContentId;

    var singleTemplate = `<div class="card mb-1 content-body" id="` + lastContentId + `">
               <div class="card-header">
                  <label for="content-type-` + lastContentId + `">Content type</label>
                  <select form="project-create-form" id="content-type-` + lastContentId + `" class="custom-select" name="content[` + lastContentId + `][type]" onchange="changeContentType(this)">
                     <option disabled="" selected="" value="">-- select a type --</option>
                     <option value="text" ` + (contentType === 'text' ? 'selected' : '') + `>Text</option>
                     <option value="image-small" ` + (contentType === 'image-small' ? 'selected' : '') + `>Small Image</option>
                     <option value="image-big" ` + (contentType === 'image-big' ? 'selected' : '') + `>Wide Image</option>
                     <option value="slide" ` + (contentType === 'slide' ? 'selected' : '') + `>Slide</option>
                  </select>
               </div>

               <div class="card-content pb-1"></div>

                <div class="card-footer">
                  <i class="feather icon-trash-2 text-danger pr-1 remove-content" onclick="removeContent(this)"></i>
               </div>
            </div>`;

    $('.content-container').append(singleTemplate);
    return lastContentId;
}

function createContent(contentId, contentType) {
    var content;

    switch (contentType) {
        case 'text':
            content = `<div class="card-body pb-0 text-copy-content">
                 <ul class="nav nav-tabs language-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                       <a class="nav-link text-uppercase active ru-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#ru-just" role="tab" aria-controls="ru-just"
                          aria-selected="true">
                          ru
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-uppercase en-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#en-just" role="tab" aria-controls="en-just" aria-selected="false">
                          en
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-uppercase uz-tab-justified" onclick="changeLangTabs(this)"
                          data-toggle="tab" href="#uz-just" role="tab" aria-controls="uz-just" aria-selected="false">
                          uz
                       </a>
                    </li>
                 </ul>
                 <div class="tab-content pt-2 col-md-12 col-12 pr-0 pl-0 text-content">
                    <div class="tab-pane active tab-pane-ru" role="tabpanel" aria-labelledby="ru-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-ru-` + contentId + `" class="form-control " placeholder="Title (ru)" rows="4"
                                   name="content[` + contentId + `][title][ru]">` + (contentId === 3 ? 'Задача' : '') + (contentId === 5 ? 'Сделано' : '') + `</textarea>
                                <label for="title-ru-` + contentId + `">Title (ru)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group small-ckeditor">
                                <textarea form="project-create-form" id="description-ru-` + contentId + `" class="form-control " placeholder="Description (ru)" rows="4"
                                   name="content[` + contentId + `][description][ru]"></textarea>
                                <label for="description-ru-` + contentId + `">Description (ru)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane tab-pane-en" role="tabpanel" aria-labelledby="en-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-en-` + contentId + `" class="form-control " placeholder="Title (en)" rows="4"
                                   name="content[` + contentId + `][title][en]"></textarea>
                                <label for="title-en-` + contentId + `">Title (en)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group small-ckeditor">
                                <textarea form="project-create-form" id="description-en-` + contentId + `" class="form-control " placeholder="Description (en)" rows="4"
                                   name="content[` + contentId + `][description][en]"></textarea>
                                <label for="description-en-` + contentId + `">Description (en)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane tab-pane-uz" role="tabpanel" aria-labelledby="uz-tab-justified">
                       <div class="row">
                          <div class="col-md-6 col-12">
                             <div class="form-label-group">
                                <textarea form="project-create-form" id="title-uz-` + contentId + `" class="form-control " placeholder="Title (uz)" rows="4"
                                   name="content[` + contentId + `][title][uz]"></textarea>
                                <label for="title-uz-` + contentId + `">Title (uz)</label>
                             </div>
                          </div>
                          <div class="col-md-6 col-12">
                             <div class="form-label-group small-ckeditor">
                                <textarea form="project-create-form" id="description-uz-` + contentId + `" class="form-control " placeholder="Description (uz)" rows="4"
                                   name="content[` + contentId + `][description][uz]"></textarea>
                                <label for="description-uz-` + contentId + `">Description (uz)</label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="wrapper pt-1" style="display: flex; justify-content: center;">
                       <div class="form-label-group mb-1">
                          <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                             placeholder="Position" value="` + contentId + `">
                          <label for="position-` + contentId + `">Position</label>
                       </div>
                    </div>
                 </div>
              </div>
           </div>`;
            break;

        case 'slide':
            content = `<div class="card-body pb-0 slide-copy-content">
                     <div class="row mr-0 ml-0 pt-1">
                        <fieldset class="form-group col-md-8 col-8 image-input-container pl-0">
                           <label for="basicInputFile" style="position: absolute; top: -1.3rem;">Image</label>
                           <div class="custom-file">
                              <input form="project-create-form" type="file" class="custom-file-input image-input " name="content[` + contentId + `][slide][]"
                                 id="input-file-` + contentId + `" onchange="setPreview(this)" multiple="">
                              <label class="custom-file-label" for="input-file-` + contentId + `"></label>
                           </div>
                        </fieldset>

                        <div class="col-md-4 col-4 pr-0">
                           <div class="form-label-group mb-0">
                              <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                                 placeholder="Position" value="` + contentId + `">
                              <label for="position-` + contentId + `">Position</label>
                           </div>
                        </div>
                     </div>
                     <fieldset class="form-group col-md-12 col-12 mb-0 p-0">
                        <div class="slide-preview"></div>
                     </fieldset>
                  </div>
               </div>`;
            break;

        case 'image-small':
        case 'image-big':
            content = `<div class="card-body pb-0 image-copy-content">
                     <div class="row mr-0 ml-0 pt-1">
                        <fieldset class="form-group col-md-6 col-6 image-input-container pl-0">
                           <label for="input-file-` + contentId + `" style="position: absolute; top: -1.3rem;">Image</label>
                           <div class="custom-file">
                              <input form="project-create-form" type="file" class="custom-file-input image-input " name="content[` + contentId + `][image]" id="input-file-` + contentId + `"
                                 onchange="setPreview(this)">
                              <label class="custom-file-label" for="input-file-` + contentId + `"></label>
                           </div>
                        </fieldset>

                        <div class="col-md-6 col-6 pr-0">
                           <div class="form-label-group mb-0">
                              <input form="project-create-form" type="number" id="position-` + contentId + `" class="form-control " name="content[` + contentId + `][position]"
                                 placeholder="Position" value="` + contentId + `">
                              <label for="position-` + contentId + `">Position</label>
                           </div>
                        </div>
                     </div>
                     <fieldset class="form-group col-md-6 col-6 mb-0 pl-0" style="display: flex; justify-content: center;">
                        <img class="preview" id="preview" src="#" alt="preview" style="display: none;">
                     </fieldset>
                  </div>
               </div>`;
            break;
    }

    $('.content-body#' + contentId + ' .card-content').append(content);

    // ? Initialize ckeditor
    if (contentType === 'text') {
        for (let lang of avilableLangs) {
            ClassicEditor
                .create(document.querySelector('#description-' + lang + '-' + contentId), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}

function removeContent(obj) {
    $(obj).parents('.card').remove();
}
