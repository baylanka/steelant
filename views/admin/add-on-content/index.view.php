<?php

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button class="btn btn-sm btn-primary background-blue" type="button" id="create-add-on">Create Add-on
                </button>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Title</th>
                    <th class="text-center">status</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>

                <tr class="align-middle">
                    <td class="text-left">Privacy & Policy</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Our Partners</td>
                    <td class="text-center"><span class="badge text-bg-danger">non-published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Notice 1</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Notice 2</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                </tbody>

            </table>

        </div>
    </div>
</div>


<div class="modal fade" id="addOn" tabindex="-1" aria-labelledby="createAddOn" aria-hidden="true">

</div>



<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script src="https://cdn.tiny.cloud/1/39y77bbnodzcw45bboz4dzbi7c07mh4pr5nvitr1hhfj3tm8/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    modalId = "addOn";
    $(document).on("click", "#create-add-on", async function () {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/add-on/create?tableLang=${language}`;
        const btn = $(this);
        const loadingBtnText = btn.text();
        try {
            loadButton(btn, "loading ...");
            await loadModal(modalId, path);
            resetButton(btn, loadingBtnText);
            tinymce.init({
                selector: 'textarea',
                plugins: 'textcolor link lists', // Additional plugins for text color, links, and lists
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | link unlink | numlist bullist', // Toolbar configuration
                content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }' // Optional content styles
            });

        } catch (err) {
            toast.error("An error occurred while attempting to open the create add on.. " + err);
            resetButton(btn, loadingBtnText);
        }
    });
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

