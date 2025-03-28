<?php
    use helpers\translate\Translate;
?>
<!DOCTYPE html>
<html lang="<?=Translate::getLang()?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SteelWall - admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base-url" content="<?= url("/"); ?>">
    <meta name="title" content="Steelwall">
    <meta name="description" content="Steelwall">
    <meta name="keywords" content="steelwall, walls">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= assets("img/favicon/apple-touch-icon.png") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= assets("img/favicon/favicon-32x32.png") ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= assets("img/favicon/favicon-32x32.png") ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="<?= assets("themes/admin/css/overlayscrollbars.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= assets("themes/admin/css/adminlte.css") ?>">
    <link rel="stylesheet" href="<?= assets("themes/admin/css/apexcharts.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="<?= assets("css/steel-wall.css") ?>?v=<?=  date("h:i:sa") ?>">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">