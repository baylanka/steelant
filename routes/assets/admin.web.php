<?php
global $app;


//Connector routes
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);
$app->get('/admin/connectors/create',  ["admin\ConnectorController", "create"]);
$app->post('/admin/connectors',  ["admin\ConnectorController", "store"]);
$app->get('/admin/connectors/edit',  ["admin\ConnectorController", "edit"]);
$app->post('/admin/connectors/update',  ["admin\ConnectorController", "update"]);
$app->get('/admin/connectors/templates',  ["admin\ConnectorController", "showAllTemplates"]);

//Add-on routes
$app->get('/admin/add-on',  ["admin\AddOnController", "index"]);
$app->get('/admin/add-on/create',  ["admin\AddOnController", "create"]);
$app->post('/admin/add-on-content/store',  ["admin\AddOnController", "store"]);


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
$app->get('/admin/pages/view',  ["admin\PageController", "show"]);

//contents routes
$app->post('/admin/contents/display_order_update',  ["admin\ContentController", "updateDisplayOrderList"]);

//users
$app->get('/admin/users',  ["admin\UserController", "index"]);
$app->get('/admin/users/create',  ["admin\UserController", "create"]);
$app->post('/admin/users/create',  ["admin\UserController", "store"]);

//orders
$app->get('/admin/orders',  ["admin\OrderController", "index"]);
