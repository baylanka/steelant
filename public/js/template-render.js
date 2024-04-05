function populateTitleFields()
{

    $("span.template-img-heading").each(function () {
        if($(this).find('input').length === 0){
            let head_key = $(this).attr("data-heading");
            $(this).after(`
            <div class=" d-flex align-middle gap-2">
                <input class="img-heading" type="text" data-heading="${head_key}" data-default="true" placeholder="Heading"
             
                > 
                <span class=" d-flex flex-column"><input type="checkbox" class="sync-switch"><small>sync</small></span>
            </div>
        `);
            $(this).remove();
        }else{
            $(this).remove();
        }
    });
}


$(document).off("click", "img.template-img");
$(document).on("click", "img.template-img", function () {
    $(this).closest("div.template-img-container").find("input[type=file]").click();
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
    if(!inputField.attr('data-index')){
        //getting image file set count
        let existingImageElementsCount = Number($('.template-img-input[data-file-set="true"]').length);

        //counting unique Image URL counts
        let srcArr = [];
        $('.file_src').each(function(){
            const src = $(this).val();
            if(!srcArr.includes(src)){
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
    }else{
        LanguageFieldName = imageLanguageField.attr('name');
        placeholderFieldName =  imagePlaceholderField.attr('name');
    }


    //treating all existing media containers
    $('.template-img-container').each(function(){
        const otherContainer = $(this);
        const otherInputField = otherContainer.find('.template-img-input');
        const otherImageTag = otherContainer.find('.template-img');

        const otherImageLanguageField = otherContainer.find('.image-language');
        const otherImagePlaceholderField = otherContainer.find('.image-placeholder');
        const otherElementPlaceHolderValue = Number(otherImagePlaceholderField.val());


        if(imagePlaceholderValue === otherElementPlaceHolderValue
            && otherImageTag.attr('data-default') == 'true'
        ){
            otherImageLanguageField.attr('name', LanguageFieldName);
            otherImagePlaceholderField.attr('name', placeholderFieldName);
            otherContainer.find('.template-img').attr('src', imageContent);
            otherImageTag.attr('data-default', false);
        }
    });
});


$(document).off("keyup", ".img-heading");
$(document).on("keyup", ".img-heading", function () {
    let heading_key = $(this).attr("data-heading");
    let value = $(this).val();
    const imagePlaceHolder = $(this).closest('.template-img-container').find('.image-placeholder');
    const imagePlaceHolderName = imagePlaceHolder.length ? imagePlaceHolder.attr('name') : '';
    const titleFieldName = imagePlaceHolderName.replace('placeholder', 'title');
    $(this).attr('name', titleFieldName);

    if ($(this).closest("div.template-img-container").find("input[type=checkbox]").is(':checked')) {
        $(".img-heading").each(function () {
            if ($(this).attr("data-heading") === heading_key) {
                $(this).val(value);
                $(this).attr('name', titleFieldName);
            }
        });
    }
});


$(document).off("change", ".sync-switch");
$(document).on("change", ".sync-switch", function () {
    const inputField = $(this).closest('div').find('.img-heading');
    let heading_key = inputField.attr("data-heading");
    let value = inputField.val();

    const imagePlaceHolder = inputField.closest('.template-img-container').find('.image-placeholder');
    const imagePlaceHolderName = imagePlaceHolder.length ? imagePlaceHolder.attr('name') : '';
    const titleFieldName = imagePlaceHolderName.replace('placeholder', 'title');
    inputField.attr('name', titleFieldName);


    if ($(this).closest("div.template-img-container").find("input[type=checkbox]").is(':checked')) {

        $(".img-heading").each(function () {

            if ($(this).attr("data-heading") === heading_key) {

                const syncSwitch = $(this).closest('div').find('.sync-switch');
                syncSwitch.prop('checked', true);
                $(this).val(value);
                $(this).attr('name', titleFieldName);
            }
        });

    }

});



