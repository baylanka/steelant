<?php

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->


<div class="row">
    <div class="card mb-4">

        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">type</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Job / Position</th>
                    <th class="text-center">Division</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Country / State</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Website</th>
                    <th class="text-center">email</th>
                    <th class="text-center" style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user){
                    $user_type_color = "";
                    switch ($user->type){
                        case "admin":
                            $user_type_color = "primary";
                            break;
                        case "developer":
                            $user_type_color = "secondary";
                            break;
                        default:
                            $user_type_color = "info";
                            break;
                    }
                    ?>

                <tr>
                    <td class="text-left"><span class="badge rounded-pill bg-<?=  $user_type_color ?>"><small><?= $user->type ?></small></span></td>
                    <td class="text-center"><?= $user->title ?> <?= $user->name ?></td>
                    <td class="text-center"><?= $user->job_position ?></td>
                    <td class="text-center"><?= $user->division ?></td>
                    <td class="text-center"><?= $user->company_name ?></td>
                    <td class="text-center"><?= $user->country_or_state ?></td>
                    <td class="text-center"><?= $user->phone ?></td>
                    <td class="text-center"><a data-toggle="tooltip" title="<?= $user->website ?>" href="<?= $user->website ?>" target="_blank"><i class="bi bi-box-arrow-up-right text-dark"></i></a> </td>
                    <td class="text-center"><a  data-toggle="tooltip" title="<?= $user->email ?>" href="mailto:<?= $user->email ?>" target="_blank"><i class="bi bi-envelope-at text-dark"></i></a></td>
                    <td class="text-center" style="width: 40px"></td>
                </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>


</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

