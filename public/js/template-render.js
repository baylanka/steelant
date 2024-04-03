function populateTitleFields()
{

    $("span.template-img-heading").each(function () {
        let head_key = $(this).attr("data-heading");
        $(this).after(`
            <div class=" d-flex align-middle gap-2">
                <input class="img-heading" type="text" data-heading="${head_key}" data-default="true" placeholder="Heading"> 
                <span class=" d-flex flex-column"><input type="checkbox" class="sync-switch"><small>sync</small></span>
            </div>
        `);
    });


    $("span.template-img-heading").remove();
}


$(document).off("click", "img.template-img");
$(document).on("click", "img.template-img", function () {
    $(this).closest("div.template-img-container").find("input[type=file]").click();
    $(this).attr("data-default", "true");
});


$(document).off("change", "input.template-img-input");
$(document).on("change", "input.template-img-input", async  function (e) {
    e.preventDefault();
    const inputField = $(this);
    let imageValue = inputField.val();
    const inputFieldContainer = inputField.closest('.template-img-container');
    const imageLanguageField = inputFieldContainer.find('.image-language');
    const imagePlaceholderField = inputFieldContainer.find('.image-placeholder');
    const imagePlaceholderValue= Number(inputFieldContainer.find('.image-placeholder').val());

    if(isEmpty(imageValue)){
        return;
    }

    const imageContent = await imageToBase64($(this));
    inputFieldContainer.find('.template-img').attr('src', imageContent);

    let thisElementIndex;
    let LanguageFieldName;
    let placeholderFieldName;
    if(!inputField.attr('data-index')){
        let existingImageElementsCount = Number($('.template-img-input[data-file-set="true"]').length);
        let srcArr = [];
        $('.file_src').each(function(){
            const src = $(this).val();
            if(!srcArr.includes(src)){
                srcArr.push(src)
            }
        });

        existingImageElementsCount += srcArr.length;

        thisElementIndex = existingImageElementsCount > 0 ? existingImageElementsCount : 0;
        inputField.attr('data-index', thisElementIndex);
        inputField.attr('data-file-set', 'true');

        const inputName = `images[${thisElementIndex}]`;
        LanguageFieldName = `images[language][${thisElementIndex}][]`;
        placeholderFieldName = `images[placeholder][${thisElementIndex}][]`;

        inputField.attr('name', inputName);
        imageLanguageField.attr('name', LanguageFieldName);
        imagePlaceholderField.attr('name', placeholderFieldName);
    }


    $('.template-img-container').each(function(){
        const otherContainer = $(this);
        const otherElementPlaceHolder = Number(otherContainer.find('.image-placeholder').val());
        const OtherInputField = otherContainer.find('.template-img-input');

        const otherImageLanguageField = otherContainer.find('.image-language');
        const otherImagePlaceholderField = otherContainer.find('.image-placeholder');

        if(imagePlaceholderValue === otherElementPlaceHolder && !OtherInputField.attr('data-index')){
            otherImageLanguageField.attr('name', LanguageFieldName);
            otherImagePlaceholderField.attr('name', placeholderFieldName);
            otherContainer.find('.template-img').attr('src', imageContent);
        }
    });
});


$(document).off("keyup", ".img-heading");
$(document).on("keyup", ".img-heading", function () {
    let heading_key = $(this).attr("data-heading");
    let value = $(this).val();
    if ($(this).closest("div.template-img-container").find("input[type=checkbox]").is(':checked')) {

        $(".img-heading").each(function () {
            if ($(this).attr("data-heading") === heading_key) {
                $(this).val(value);
            }
        });
    }
});


$(document).off("change", ".sync-switch");
$(document).on("change", ".sync-switch", function () {
    const inputField = $(this).closest('div').find('.img-heading');
    let heading_key = inputField.attr("data-heading");
    let value = inputField.val();
    if ($(this).closest("div.template-img-container").find("input[type=checkbox]").is(':checked')) {

        $(".img-heading").each(function () {
            if ($(this).attr("data-heading") === heading_key) {
                const syncSwitch = $(this).closest('div').find('.sync-switch');
                syncSwitch.prop('checked', true);
                $(this).val(value);
            }
        });

    }

});



