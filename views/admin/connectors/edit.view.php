<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Connector</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">
            <div class="wizard my-2">

                <ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation" data-position="1">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                           aria-controls="home" aria-selected="true">
                            <i class="bi bi-ui-radios size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation" data-position="2">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                           aria-controls="contact" aria-selected="false">
                            <i class="bi bi-images size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation" data-position="3">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                           aria-controls="profile" aria-selected="false">
                            <i class="bi bi-download size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation" data-position="4">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab"
                           aria-controls="contact2" aria-selected="false">
                            <i class="bi bi-card-image size-20"></i>
                        </a>
                    </li>
                </ul>

                <form action="<?= url('/admin/connectors/update') ?>" id="connector-update">
                    <input type="hidden" name="id" value="<?=$connector->id?>"/>
                    <?php if($fixed_category == 1): ?>
                        <input type="hidden" name="category" value="<?=$connector->categoryId?>"/>
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <?php include_once basePath('/views/admin/connectors/assets/edit.details_tab.view.php') ?>
                        <?php include_once basePath('/views/admin/connectors/assets/edit.templates_tab.view.php') ?>
                        <?php include_once basePath('/views/admin/connectors/assets/edit.downloadable_files_tab.view.php') ?>
                        <?php include_once basePath('/views/admin/connectors/assets/edit.template_media_tab.view.php') ?>
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
    $(document).off('click', '.nav-item');
    $(document).on('click', '.nav-item', function(){
        const tabPosition = Number($(this).attr('data-position'));
        tabActiveEventHandler(tabPosition);
    });


    async function tabActiveEventHandler(tabPosition)
    {
        if(tabPosition > 2){
            const templateId = $('input[name="template"]:checked').val();
            if(isEmpty(templateId)){
                toast.error("It is required to select a template to continue.");
                const secondTab = $('.nav-item[data-position="2"]').find('a').trigger('click');
                const tab = new bootstrap.Tab(secondTab[0]);
                tab.show();
                return;
            }
        }


        if(tabPosition === 4){
            try {
                const response = await update();
                const templates = response.templatePreviews;
                $('#nav-de').html(templates['de']);
                $('#nav-uk').html(templates['en-gb']);
                $('#nav-fr').html(templates['fr']);
                $('#nav-us').html(templates['en-us']);

                const downlodableContents = response.downloadableContents;
                $('#profile').replaceWith(downlodableContents);
                populateTitleFields();
            }catch(err){
                toast.error(err);
                const secondTab = $('.nav-item[data-position="1"]').find('a').trigger('click');
                const tab = new bootstrap.Tab(secondTab[0]);
                tab.show();
            }
        }
    }

    async function update()
    {
        return new Promise(async (resolve, reject)=>{
            const form = $("form#connector-update");
            try{
                spinnerEnabled();
                let response = await makePostFileRequest(form);
                resolve(response);
            }catch (err){
                reject(err);
            }finally {
                spinnerDisable();
            }
        });

    }


    $('button#update-btn').off('click');
    $('button#update-btn').on('click', async function updateConnector(e){
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating ...");
        try{
            const response = await update();
            toast.success(response.message);
            // raise an event to close the modal
            const event = new CustomEvent('updateCategorySuccessEvent', {
                detail: { connector: response.data }
            });
            document.dispatchEvent(event);
        }catch (err){
            toast.error(err);
        }finally {
            resetButton(btn, btnLabel);
        }

    });

    //triggering next tab
    $(document).off("click", ".next");
    $(document).on("click", ".next", function () {
        const activeTabLink = $(".nav-tabs .active");
        let nextTabLink = activeTabLink
            .closest("li").next("li")
            .find("a");
        if (nextTabLink[0]) {
            const nextTab = new bootstrap.Tab(nextTabLink[0]);
            nextTab.show();
            const currentActiveTab = nextTabLink.closest('li');
            const currentActivePosition = Number(currentActiveTab.attr('data-position'));
            tabActiveEventHandler(currentActivePosition);
        }
    });

    //triggering previous tab
    $(document).off("click", ".previous");
    $(document).on("click", ".previous", function () {
        const activeTabLink = $(".nav-tabs .active");
        let prevTabLink = activeTabLink
            .closest("li").prev("li")
            .find("a");
        if (prevTabLink[0]) {
            const prevTab = new bootstrap.Tab(prevTabLink[0]);
            prevTab.show();
            const currentActiveTab = prevTabLink.closest('li');
            const currentActivePosition = Number(currentActiveTab.attr('data-position'));
            tabActiveEventHandler(currentActivePosition);
        }
    });


    $(document).ready(function () {
        $("input.label").hide();

        $(".select2").select2({
            dropdownParent: $('#' + modalId),
            theme: 'bootstrap-5'
        });
    });
</script>
<script src="<?= assets("js/template-render.js?v=1.0") ?>"></script>
<!--<script src="--><?php //= assets("js/template-render.min.js") ?><!--"></script>-->