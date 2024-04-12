<?php
    use helpers\translate\Translate;
?>
<!DOCTYPE html>
<html lang="<?=Translate::getLang()?>">
<?php require_once "head.layout.php" ?>
<body id="user-page-body">

<?php require_once "nav.layout.php" ?>

<?php if (isset($_GET["alert"])) { ?>
    <div class="alert alert-<?= isset($_GET["alert_type"]) ? $_GET["alert_type"] : "info"  ?> alert-dismissible fade show" role="alert">
     <?= $_GET["alert"] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php } ?>
<div class="modal fade" id="baseModal" tabindex="-1" aria-labelledby="baseModal" aria-hidden="true">

</div>
