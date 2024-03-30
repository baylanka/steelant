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
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </form>


            <div class="w-25 d-flex justify-content-end align-middle">
                <button class="btn btn-sm btn-primary align-self-start" type="button" id="create-connector">Create
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
                                <?=$connector->thickness?>
                            </td>
                            <td class="text-center">
                                <?=($connector->standardLength)?>
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

    function getRow(connector)
    {
        let weight = '';
        if(connector.weights.length ===1){
            weight = connector.weights[0];
        }else{

            weight = `<table class="table table-striped table-bordered">
                            <tbody>`
             for(let label of connector.weights){
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
                    <td class="text-center">${connector.thickness}</td>
                    <td class="text-center">${connector.standardLength}</td>
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
                $('#connector-body').prepend(row);
                await getConnectorEditModal(connector.id);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
            resetButton(btn, loadingBtnText);
        }
    });

    async function getConnectorEditModal(connectorId)
    {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/connectors/edit?tableLang=${language}&id=${connectorId}`;
        const trTag = $(`a[data-id="${connectorId}"]`);
        try {
            const modal = await loadModal(modalId, path);

            $(document).off('updateConnectorSuccessEvent');
            $(document).on('updateConnectorSuccessEvent', function (event) {
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

</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

