<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Add-On</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">
            <div class="wizard my-2">

                <ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation" data-position="1">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="home-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab"
                           aria-controls="home" aria-selected="true">
                            <i class="bi bi-ui-radios size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation" data-position="2">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact-tab" data-bs-toggle="tab" data-bs-target="#templates" type="button" role="tab"
                           aria-controls="contact" aria-selected="false">
                            <i class="bi bi-images size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation" data-position="4">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact2-tab" data-bs-toggle="tab" data-bs-target="#template" type="button" role="tab"
                           aria-controls="contact2" aria-selected="false">
                            <i class="bi bi-card-image size-20"></i>
                        </a>
                    </li>
                </ul>

                <form action="<?= url('/admin/connectors/update') ?>" id="connector-update">
                    <div class="tab-content" id="myTabContent">
                        <?php include_once basePath('/views/admin/add-on-content/assets/create.details_tab.view.php') ?>
                        <?php include_once basePath('/views/admin/add-on-content/assets/create.templates_tab.view.php') ?>
                        <?php include_once basePath('/views/admin/add-on-content/assets/create.template_media_tab.view.php') ?>
                    </div>
                </form>
            </div>


        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update-btn">Update</button>
        </div>

    </div>
</div>

<script>
    $(document).off("click", ".set-checked");
    $(document).on("click", ".set-checked", function () {
        $("input[name=template]").attr("checked", false);
        $(this).find("input[type=radio]").attr("checked", true);

    });
</script>



