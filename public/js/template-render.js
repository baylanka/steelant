function populateTitleFields() {

    $("span.template-img-heading").each(function () {
        if ($(this).find('input').length === 0) {
            let head_key = $(this).attr("data-heading");
            $(this).after(`
            <div class=" d-flex align-middle gap-2">
                <input class="img-heading form-control" type="text" data-heading="${head_key}"
                 data-default="true" placeholder="Heading"
             
                > 
            </div>
        `);
            $(this).remove();
        } else {
            $(this).remove();
        }
    });
}


$(document).off("click", "img.template-img");
$(document).on("click", "img.template-img", function () {
    $(this).closest("div.template-img-container").find("input[type=file]").click();
});


$(document).off("change", "input.template-img-input");
$(document).on("change", "input.template-img-input", async function (e) {
    e.preventDefault();
    spinnerEnabled();
    const inputField = $(this);
    let imageValue = inputField.val();
    const inputFieldContainer = inputField.closest('.template-img-container');
    const imageLanguageField = inputFieldContainer.find('.image-language');
    const imagePlaceholderField = inputFieldContainer.find('.image-placeholder');
    const imagePlaceholderValue = Number(inputFieldContainer.find('.image-placeholder').val());

    if (isEmpty(imageValue)) {
        spinnerDisable();
        return;
    }
    const pathField = inputFieldContainer.find('.file_src');
    pathField.remove();

    const imageContent = await imageToBase64($(this));
    inputFieldContainer.find('.template-img').attr('src', imageContent);

    let thisElementIndex;
    let LanguageFieldName;
    let placeholderFieldName;

    //once a field set name attributes, no need to assign again and again with incremented index value
    //for the reason keeps data-index attribute
    //if there is such an attribute then, it must be file added field
    if (!inputField.attr('data-index')) {
        //getting image file set count
        let existingImageElementsCount = Number($('.template-img-input[data-file-set="true"]').length);

        //counting unique Image URL counts
        let srcArr = [];
        $('.file_src').each(function () {
            const src = $(this).val();
            if (!srcArr.includes(src)) {
                srcArr.push(src)
            }
        });
        // sum of both counts : `this count value will be next index value`
        existingImageElementsCount += srcArr.length;

        thisElementIndex = existingImageElementsCount > 0 ? existingImageElementsCount : 0;
        inputField.attr('data-file-set', 'true');
        // if there is no previous image (FILE URL), then 'data-default' become true
        // now image set to the field so, making it false
        inputFieldContainer.find('.template-img').attr('data-default', false);


        inputField.attr('data-index', thisElementIndex);


        const inputName = `images[${thisElementIndex}]`;
        LanguageFieldName = `images[language][${thisElementIndex}][]`;
        placeholderFieldName = `images[placeholder][${thisElementIndex}][]`;

        inputField.attr('name', inputName);
        imageLanguageField.attr('name', LanguageFieldName);
        imagePlaceholderField.attr('name', placeholderFieldName);
    } else {
        LanguageFieldName = imageLanguageField.attr('name');
        placeholderFieldName = imagePlaceholderField.attr('name');
    }


    const totalImgContainer = $('.template-img-container').length;
    let iCount = 0;
    //treating all existing media containers
    $('.template-img-container').each(function () {
        iCount++;
        const otherContainer = $(this);
        const otherInputField = otherContainer.find('.template-img-input');
        const otherImageTag = otherContainer.find('.template-img');

        const otherImageLanguageField = otherContainer.find('.image-language');
        const otherImagePlaceholderField = otherContainer.find('.image-placeholder');
        const otherElementPlaceHolderValue = Number(otherImagePlaceholderField.val());




        if (imagePlaceholderValue === otherElementPlaceHolderValue
            && otherImageTag.attr('data-default') == 'true'
        ) {
            otherImageLanguageField.attr('name', LanguageFieldName);
            otherImagePlaceholderField.attr('name', placeholderFieldName);
            otherContainer.find('.template-img').attr('src', imageContent);
            otherImageTag.attr('data-default', false);
            otherImageTag.closest("div.template-img-container").find("a.remove-image-btn").removeClass("d-none");
        }

        if (totalImgContainer === iCount) {
            spinnerDisable();
        }
    });


    $(this).closest("div.template-img-container").find("a.remove-image-btn").removeClass("d-none");
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'bottom',
    })

});

function getTitleFieldName(imageContainer) {
    const imagePlaceHolder = imageContainer.find('.image-placeholder');
    const imagePlaceHolderName = imagePlaceHolder.length ? imagePlaceHolder.attr('name') : '';
    return imagePlaceHolderName.replace('placeholder', 'title');
}

$(document).off("change", ".img-heading");
$(document).on("change", ".img-heading", function () {
    spinnerEnabled();
    let heading_key = $(this).attr("data-heading");
    let value = $(this).val();
    const imageContainer = $(this).closest('.template-img-container');
    $(this).attr('name', getTitleFieldName(imageContainer));

    if ($(this).closest("div.template-img-container")) {
        const totalHeadingFields = $(".img-heading").length;
        let iCount = 0;
        $(".img-heading").each(function () {
            iCount++;
            const eachImageContainer = $(this).closest('.template-img-container');
            if ($(this).attr("data-heading") === heading_key && isEmpty($(this).val())) {
                $(this).val(value);
                $(this).attr('name', getTitleFieldName(eachImageContainer));
            }

            if (totalHeadingFields === iCount) {
                spinnerDisable();
            }
        });
    } else {
        spinnerDisable();
    }
});


$(document).off("mouseenter", "a.remove-image-btn");
$(document).on("mouseenter","a.remove-image-btn",function (){
    $(this).closest("div.template-img-container").find("img.template-img").css("filter","grayscale(1)")
});


$(document).off("mouseleave", "a.remove-image-btn");
$(document).on("mouseleave","a.remove-image-btn",function (){
    $(this).closest("div.template-img-container").find("img.template-img").css("filter","grayscale(0)")
});




$(document).off("click", "a.remove-image-btn");
$(document).on("click","a.remove-image-btn",async function (){
    const notice = `
                <p class="text-danger"><b>If you reset the media:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                    <li>Previously set media file will be deleted permanently.</li>
                </ol>
            `;

    const mediaContainer = $(this).closest('.template-img-container');
    const prevMediaUrlHiddenField = mediaContainer.find('.file_src');
    if(prevMediaUrlHiddenField.length === 1){
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }
    }

    spinnerEnabled();
    const removeBtn = $(this);
    removeBtn.addClass("d-none");
    const defaultImageURL = `${getBaseUrl()}/public/themes/user/img/img-size-180-180.png`;
    let prevMediaPlaceHolderClonedValue = null;
    if(prevMediaUrlHiddenField.length === 1){
        prevMediaPlaceHolderClonedValue = prevMediaUrlHiddenField.clone();
        prevMediaUrlHiddenField.remove();
    }

    const mediaFileSelector = mediaContainer.find('.template-img-input');
    const mediaFileSelectorNameAttr = mediaFileSelector.attr('name');
    mediaFileSelector.removeAttr('name');

    const mediaPlaceholderField = mediaContainer.find('.image-placeholder');
    const mediaPlaceholderFieldNameAttr = mediaPlaceholderField.attr('name');
    mediaPlaceholderField.removeAttr('name');

    const mediaLanguageField = mediaContainer.find('.image-language');
    const mediaLanguageFieldNameAttr = mediaLanguageField.attr('name');
    mediaLanguageField.removeAttr('name');

    const mediaShowCase = mediaContainer.find('.template-img');
    const mediaShowCaseURL = mediaShowCase.attr('src');
    mediaShowCase.attr('src', defaultImageURL);

    const mediaHeadingField = mediaContainer.find('.img-heading');
    let  mediaHeadingValue = mediaHeadingField.val();
    let  mediaHeadingName = mediaHeadingField.attr('name');
    if(mediaHeadingField.length > 0) {
        mediaHeadingField.val('');
        mediaHeadingField.attr('disabled', true);
    }

    try {
        if(prevMediaUrlHiddenField.length === 1){
            const response = await update();
            const templates = response.templatePreviews;
            $('#nav-de').html(templates['de']);
            $('#nav-uk').html(templates['en-gb']);
            $('#nav-fr').html(templates['fr']);
            $('#nav-us').html(templates['en-us']);

            const downlodableContents = response.downloadableContents;
            $('#profile').replaceWith(downlodableContents);


            populateTitleFields();
        }

    }catch(err){
        toast.error(err);
        removeBtn.removeClass("d-none");
        if(!isEmpty(prevMediaPlaceHolderClonedValue)){
            mediaContainer.append(prevMediaPlaceHolderClonedValue);
        }

        mediaFileSelector.attr('name', mediaFileSelectorNameAttr);
        mediaPlaceholderField.attr('name', mediaPlaceholderFieldNameAttr);
        mediaLanguageField.attr('name', mediaLanguageFieldNameAttr);
        mediaShowCase.attr('src', mediaShowCaseURL);
        if(mediaHeadingField.length > 0) {
            mediaHeadingField.attr('name', mediaHeadingName);
            mediaHeadingField.val(mediaHeadingValue);
            mediaHeadingField.attr('disabled', false);
        }
    }finally {
        spinnerDisable();
    }

});


