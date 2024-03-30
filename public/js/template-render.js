$(document).ready(function () {

    $("span.template-img-heading").each(function () {
        let head_key = $(this).attr("data-heading");
        $(this).after(`
            <span class=" d-flex align-middle gap-2">
                <input class="img-heading" type="text" data-heading="${head_key}" data-default="true" placeholder="Heading"> 
                <span class=" d-flex flex-column"><input type="checkbox" class="sync-switch"><small>sync</small></span>
            </span>
        `);
    });


    $("span.template-img-heading").remove();
});


$(document).off("click", "img.template-img");
$(document).on("click", "img.template-img", function () {
    $(this).closest("div.template-img-container").find("input[type=file]").click();
    $(this).attr("data-default", "true");
});


$(document).off("change", "input.template-img-input");
$(document).on("change", "input.template-img-input", function () {

    let input = $(this);
    let file = this.files[0];
    let reader = new FileReader();

    let image = $(this).closest("div.template-img-container").find("img.template-img");
    let alert_note = $(this).closest("div.template-img-container").find("span.img-size-text");



    reader.onload = function (e) {

        let img = new Image();
        img.src = e.target.result;

        img.onload = function () {
            alert_note.css("color", "gray");

            let img_name = image.attr("data-img");

            $("img[data-img=" + img_name + "]").each(function () {

                if ($(this).attr("data-default") === "true") {
                    $(this).attr('src', e.target.result);
                    $(this).attr("data-default", false);

                    $(this).closest("div.template-img-container").find("input[type=file]").remove();
                    $(this).after(input.clone()[0]);


                }
            })

        };

    }

    reader.readAsDataURL(file);


});


$(document).off("keyup", ".img-heading");
$(document).on("keyup", ".img-heading", function () {
    let heading_key = $(this).attr("data-heading");
    let value = $(this).val();
    if ($(this).closest("div.template-img-container").find("input[type=checkbox]").is(':checked')) {

        $(".img-heading").each(function () {


            if ($(this).attr("data-heading") == heading_key) {

                $(this).val(value);

            }


        });


    }

})


