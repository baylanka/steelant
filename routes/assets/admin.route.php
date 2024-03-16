<?php
global $app;

$app->get('/admin/dashboard',  ["admin\DashboardController", "index"]);
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);

//Category routes
require_once basePath("routes/assets/admin.category.route.php");
//Template routes
$app->get('/admin/templates', ["admin\TemplateController", "index"]);
$app->get('/admin/templates/create', ["admin\TemplateController", "create"]);
$app->post('/admin/templates/store', ["admin\TemplateController", "store"]);

