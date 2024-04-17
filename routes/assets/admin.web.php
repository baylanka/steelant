<?php
global $app;


//Connector routes
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);
$app->get('/admin/connectors/create',  ["admin\ConnectorController", "create"]);
$app->post('/admin/connectors',  ["admin\ConnectorController", "store"]);
$app->get('/admin/connectors/edit',  ["admin\ConnectorController", "edit"]);
$app->post('/admin/connectors/update',  ["admin\ConnectorController", "update"]);
$app->get('/admin/connectors/templates',  ["admin\ConnectorController", "showAllTemplates"]);
$app->delete('/admin/connectors/delete',  ["admin\ConnectorController", "destroy"]);

//Ad-on routes
$app->get('/admin/ad-on',  ["admin\AdOnController", "index"]);
$app->get('/admin/ad-on/create',  ["admin\AdOnController", "create"]);
$app->post('/admin/ad-on-content/store',  ["admin\AdOnController", "store"]);
$app->get('/admin/ad-on-content/templates',  ["admin\AdOnController", "showAllTemplates"]);
$app->get('/admin/ad-on-content/edit',  ["admin\AdOnController", "edit"]);
$app->post('/admin/ad-on-content/update',  ["admin\AdOnController", "update"]);
$app->delete('/admin/ad-on-content/delete',  ["admin\AdOnController", "destroy"]);

//Category routes
$app->get('/admin/categories', ["admin\CategoryController", "index"]);
$app->delete('/admin/categories/destroy', ["admin\CategoryController", "destroy"]);

$app->get('/admin/categories/main/store', ["admin\CategoryController", "createMainCategory"]);
$app->post('/admin/categories/main/store', ["admin\CategoryController", "storeMainCategory"]);

$app->get('/admin/categories/sub/store', ["admin\CategoryController", "createSubCategory"]);
$app->post('/admin/categories/sub/store', ["admin\CategoryController", "storeSubCategory"]);

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
$app->get('/admin/orders/change/status',  ["admin\OrderController", "changeStatus"]);
$app->get('/admin/orders/delete',  ["admin\OrderController", "destroy"]);