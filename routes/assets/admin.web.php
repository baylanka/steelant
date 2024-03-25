<?php
global $app;


//Connector routes
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);
$app->get('/admin/connectors/create',  ["admin\ConnectorController", "create"]);



//Category routes
$app->get('/admin/categories', ["admin\CategoryController", "index"]);
$app->get('/admin/categories/main/store', ["admin\CategoryController", "createMainCategory"]);
$app->post('/admin/categories/main/store', ["admin\CategoryController", "storeMainCategory"]);

$app->get('/admin/categories/sub/store', ["admin\CategoryController", "createSubCategory"]);
$app->post('/admin/categories/sub/store', ["admin\CategoryController", "storeSubCategory"]);
$app->delete('/admin/categories/sub/destroy', ["admin\CategoryController", "destroySubCategory"]);

$app->get('/admin/categories/edit', ["admin\CategoryController", "edit"]);
$app->post('/admin/categories/update', ["admin\CategoryController", "update"]);

//Template routes
$app->get('/admin/templates', ["admin\TemplateController", "index"]);
$app->get('/admin/templates/create', ["admin\TemplateController", "create"]);
$app->post('/admin/templates/store', ["admin\TemplateController", "store"]);
$app->get('/admin/templates/type/edit', ["admin\TemplateController", "edit"]);
$app->post('/admin/templates/type/update', ["admin\TemplateController", "update"]);
$app->delete('/admin/templates/destroy', ["admin\TemplateController", "destroy"]);


//Page routes
$app->get('/admin/pages',  ["admin\PageController", "index"]);
$app->get('/admin/pages/view',  ["admin\PageController", "page"]);


//Add-on routes
$app->get('/admin/add-on',  ["admin\AddOnController", "index"]);

