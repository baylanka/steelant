<?php
        use helpers\pools\LanguagePool;
        use model\Connector;
?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">
        <div class="card-header d-flex">

            <div class="w-25 d-flex gap-3 align-middle">
                <?php
                    $queryLanguage = LanguagePool::getByLabel($_GET['tableLang'] ?? 'de')->getLabel();
                ?>
                <a href="?tableLang=<?=LanguagePool::GERMANY()->getLabel()?>"
                   title="<?=LanguagePool::GERMANY()->getLabel()?>"
                   class="lang"
                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                >
                    <img src="<?= assets("img/flags/de.png") ?>" height="25"
                         class="flag <?=$queryLanguage === LanguagePool::GERMANY()->getLabel() ? 'selected-flag':'' ?>"/>
                </a>
                <a href="?tableLang=<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                   title="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                   class="lang"
                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                >
                    <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                         class="flag <?=$queryLanguage === LanguagePool::UK_ENGLISH()->getLabel() ? 'selected-flag':'' ?>"/>
                </a>
                <a href="?tableLang=<?=LanguagePool::FRENCH()->getLabel()?>"
                   title="<?=LanguagePool::FRENCH()->getLabel()?>"
                   class="lang"
                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                >
                    <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                         class="flag <?=$queryLanguage === LanguagePool::FRENCH()->getLabel() ? 'selected-flag':'' ?>"/>
                </a>
                <a href="?tableLang=<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                   title="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                   class="lang"
                   data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                >
                    <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                         class="flag <?=$queryLanguage === LanguagePool::US_ENGLISH()->getLabel() ? 'selected-flag':'' ?>"/>
                </a>
            </div>


            <form method="GET" class="d-flex justify-content-center w-75" id="search-form">
                <div class="input-group mb-3 w-75">
                    <input type="search" class="form-control" placeholder="Search" aria-label="search"
                           aria-describedby="search" name="search"
                           value="<?= isset($_GET["search"]) ? $_GET["search"] : "" ?>" style="text-align: center;">
                    <button type="submit" class="btn btn-primary background-blue"><i class="bi bi-search"></i></button>
                </div>
            </form>


            <div class="w-25 d-flex justify-content-end align-middle">
                <button class="btn btn-sm btn-primary align-self-start background-blue" type="button" id="create-connector">Create
                    Connector
                </button>
            </div>


        </div>
        <div class="card-body p-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th class="text-left">
                        Category
                        <a href="#" class="btn btn-light m-1 filter-btn" data-filter-name="category" data-filter-mode="<?=$_GET['filters']['category']??'none'?>"><i class="bi bi-arrow-down-up"></i></a>
                    </th>

                    <th class="text-left" style="width: 17%">
                        <select class="form-select published-state-filter"
                                aria-label="Default select example">
                            <?php $publishedStatus =  isset($_GET['published']) ? (int)$_GET['published'] : -1 ?>
                            <option value="none">All</option>
                            <option
                                    value="<?=Connector::PUBLISHED?>"
                                    <?= $publishedStatus  === Connector::PUBLISHED ? 'selected':''?>
                            >published</option>
                            <option
                                    value="<?=Connector::UNPUBLISHED?>"
                                    <?= $publishedStatus === Connector::UNPUBLISHED ? 'selected':''?>
                            >non-published</option>
                        </select>
                    </th>
                    <th class="text-center">Name
                        <a href="#" class="btn btn-light m-1 filter-btn" data-filter-name="name"  data-filter-mode="<?=$_GET['filters']['name']??'none'?>"><i class="bi bi-arrow-down-up"></i></a></th>
                    <th class="text-center">Steel grade
                        <a href="#" class="btn btn-light m-1 filter-btn" data-filter-name="grade"  data-filter-mode="<?=$_GET['filters']['grade']??'none'?>"><i class="bi bi-arrow-down-up"></i></a></th>
                    <th class="text-center">Steel thickness
                        <a href="#" class="btn btn-light m-1 filter-btn" data-filter-name="thickness" data-filter-mode="<?=$_GET['filters']['thickness']??'none'?>"><i class="bi bi-arrow-down-up"></i></a></th>
                    <th class="text-center">Standard length
                        <a href="#" class="btn btn-light m-1 filter-btn"data-filter-name="length"  data-filter-mode="<?=$_GET['filters']['length']??'none'?>"><i class="bi bi-arrow-down-up"></i></a></th>
                    <th class="text-center">Weight</th>
                    <!--<th>Max. tensile strength</th>-->
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody id="connector-body">
                    <?php foreach ($connectors as $connector):?>
                        <tr class="align-middle">
                            <td class="text-left"><small><?=$connector->categoryTree?></small></td>
                            <td class="text-left">
                                    <?php if($connector->isPublished): ?>
                                        <span class="badge text-bg-success">published</span>
                                    <?php else: ?>
                                         <span class="badge text-bg-warning">non-published</span>
                                    <?php endif; ?>
                            </td>
                            <td class="text-center"><?= $connector->name?></td>
                            <td class="text-center"><?= $connector->grade ?></td>
                            <td class="text-center">
                                <?php if(sizeof($connector->thickness)===1):?>
                                    <?=array_values($connector->thickness)[0]?>
                                <?php else: ?>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <?php foreach ($connector->thickness as $label=> $each):?>
                                            <tr>
                                                <th role="row">
                                                    <?= $label !== 'general' ? $label: ''?>
                                                </th>
                                                <td>
                                                    <?=$each?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(sizeof($connector->standardLength)===1):?>
                                    <?=array_values($connector->standardLength)[0]?>
                                <?php else: ?>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <?php foreach ($connector->standardLength as $label=> $each):?>
                                            <tr>
                                                <th role="row">
                                                    <?= $label !== 'general' ? $label: ''?>
                                                </th>
                                                <td>
                                                    <?=$each?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if(sizeof($connector->weights)===1):?>
                                    <?=array_values($connector->weights)[0]?>
                                <?php else: ?>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <?php foreach ($connector->weights as $label=> $each):?>
                                                <tr>
                                                    <th role="row">
                                                        <?= $label !== 'general' ? $label: ''?>
                                                    </th>
                                                    <td>
                                                        <?=$each?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item connector-view" href="#"  data-id="<?=$connector->id?>">
                                                View <i class="bi bi-exclamation-circle float-end"></i></a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li><a class="dropdown-item connector-edit" href="#"  data-id="<?=$connector->id?>">
                                                Edit <i class="bi bi-pencil float-end"></i></a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li><a class="dropdown-item connector-delete" href="#" data-id="<?=$connector->id?>">
                                                Delete <i class="bi bi-trash3 float-end"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="base-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>
<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    const modalId = 'base-modal';
    $(document).on("click", "#create-connector", async function () {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/connectors/create?tableLang=${language}`;
        const btn = $(this);
        const loadingBtnText = btn.text();
        try {
            loadButton(btn, "loading ...");
            const modal = await loadModal(modalId, path);
            resetButton(btn, loadingBtnText);

            $(document).off('storeConnectorSuccessEvent');
            $(document).on('storeConnectorSuccessEvent', async function (event) {
                modal.hide();
                const connector = event.originalEvent.detail.connector;
                const row = getRow(connector);
                $('#connector-body').append(row);
                await getConnectorEditModal(connector.id);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
            resetButton(btn, loadingBtnText);
        }
    });

    $(document).on("click", ".connector-edit", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        await getConnectorEditModal(connectorId);
    });

    $(document).on('submit', 'form#search-form', function(e){
        e.preventDefault();
        refreshConnectors();
    })

    $(document).on('click', 'a.lang', function(e){
        e.preventDefault();
        $('a.lang img').removeClass('selected-flag');
        $(this).find('img').addClass('selected-flag');
        refreshConnectors();
    });

    $(document).on('click','.filter-btn', function(e){
        e.preventDefault();
        const directions = ['asc', 'desc', 'none'];
        const filterMode = $(this).attr('data-filter-mode');
        let currentDirectionIndex = directions.indexOf(filterMode);
        let nextIndex = (currentDirectionIndex+1)  < directions.length ? (currentDirectionIndex+1) : 0;
        $(this).attr('data-filter-mode',  directions[nextIndex]);


        refreshConnectors();
    })

    $(document).on('change','select.published-state-filter', function(){
        refreshConnectors();
    });

    $(document).on("click", ".connector-view", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        let path = `admin/connectors/templates?id=${connectorId}`;
        try {
            await loadModal(modalId, path);

        } catch (err) {
            toast.error("An error occurred while attempting to open the view connector.. " + err);
        }
    });

    $(document).on("click", ".connector-delete", async function (e) {
        e.preventDefault();
        const notice = `
                <p class="text-danger"><b>If you proceed with deleting the connector content:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                </ol>
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const connectorId = $(this).attr('data-id');
        let URL = `${getBaseUrl()}/admin/connectors/delete?id=${connectorId}`;
        const trTag = $(this).closest('tr');
        try {
            spinnerEnabled();
            const response = await makeAjaxCall(URL,{}, 'DELETE');
            toast.success(response.message);
            trTag.remove();
        }catch (err) {
            toast.error("An error occurred while attempting to delete the connector.. ");
        }finally {
            spinnerDisable();
        }
    });


    function getWeight(connector)
    {
        let weight = '';
        if(Object.values(connector.weights).length ===1){
            weight = Object.values(connector.weights)[0];
        }else{

            weight = `<table class="table table-striped table-bordered">
                            <tbody>`
            for(let label in connector.weights){
                weight += `
                    <tr>
                        <th role="row">
                            ${label !== 'general' ? label: ''}
                        </th>
                        <td>
                            ${connector.weights[label]}
                        </td>
                    </tr>
                 `;
            }

            weight += `    </tbody>
                       </table>`;
        }

        return weight;
    }

    function getThickness(connector)
    {
        let thickness = '';
        if(Object.values(connector.thickness).length ===1){
            thickness = Object.values(connector.thickness)[0];
        }else{

            thickness = `<table class="table table-striped table-bordered">
                            <tbody>`
            for(let label in connector.thickness){
                thickness += `
                    <tr>
                        <th role="row">
                            ${label !== 'general' ? label: ''}
                        </th>
                        <td>
                            ${connector.thickness[label]}
                        </td>
                    </tr>
                 `;
            }

            thickness += `    </tbody>
                       </table>`;
        }

        return thickness;
    }

    function getLength(connector)
    {
        let thickness = '';
        if(Object.values(connector.standardLength).length ===1){
            thickness = Object.values(connector.standardLength)[0];
        }else{

            thickness = `<table class="table table-striped table-bordered">
                            <tbody>`
            for(let label in connector.standardLength){
                thickness += `
                    <tr>
                        <th role="row">
                            ${label !== 'general' ? label: ''}
                        </th>
                        <td>
                            ${connector.standardLength[label]}
                        </td>
                    </tr>
                 `;
            }

            thickness += `    </tbody>
                       </table>`;
        }

        return thickness;
    }

    function getRow(connector)
    {
        const weight = getWeight(connector);
        const thickness = getThickness(connector);
        const length = getLength(connector);

        return `
                <tr class="align-middle">
                    <td class="text-left"><small>${connector.categoryTree}</small></td>
                    <td class="text-left">
                        ${connector.isPublished
            ? '<span class="badge text-bg-success">published</span>'
            : '<span class="badge text-bg-warning">non-published</span>'
        }
                    </td>
                    <td class="text-center">${connector.name}</td>
                    <td class="text-center">${connector.grade}</td>
                    <td class="text-center">${thickness}</td>
                    <td class="text-center">${length}</td>
                    <td class="text-center">${weight}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                        <li><a class="dropdown-item connector-view" href="#"  data-id="${connector.id}">
                                                View <i class="bi bi-exclamation-circle float-end"></i></a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li><a class="dropdown-item connector-edit" href="#"  data-id="${connector.id}">
                                                Edit <i class="bi bi-pencil float-end"></i></a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li><a class="dropdown-item connector-delete" href="#" data-id="${connector.id}">
                                                Delete <i class="bi bi-trash3 float-end"></i></a>
                                        </li>
                            </ul>
                        </div>
                    </td>
                </tr>
        `;
    }

    function getFilterValues()
    {
        const filters = {};
        $('.filter-btn').each(function(){
            const mode = $(this).attr('data-filter-mode');
            if(mode !== 'none'){
                const key = $(this).attr('data-filter-name');
                filters[key] = $(this).attr('data-filter-mode');
            }

        });

        return filters;
    }

    function refreshConnectors()
    {
        const publishedFilter = $('select.published-state-filter').val();
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        const params = {
            'tableLang': language,
        };

        if(publishedFilter !== 'none'){
            params['published'] =  publishedFilter;
        }

        const searchKey = $('form#search-form [name="search"]').val();
        if(!isEmpty(searchKey)){
            params['search'] = searchKey
        }

        params['filters'] = getFilterValues();
        const queryParams = $.param(params);
        window.location.href = `${getBaseUrl()}/admin/connectors?${queryParams}`;
    }

    async function getConnectorEditModal(connectorId)
    {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/connectors/edit?tableLang=${language}&id=${connectorId}`;
        const trTag = $(`a[data-id="${connectorId}"]`).closest('tr');
        try {
            const modal = await loadModal(modalId, path);

            $(document).off('updateCategorySuccessEvent');
            $(document).on('updateCategorySuccessEvent', function (event) {
                modal.hide();
                const connector = event.originalEvent.detail.connector;
                const row = getRow(connector);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.prepend(row);
                    return
                }

                trTag.remove();
                trTagParent.after(row);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

