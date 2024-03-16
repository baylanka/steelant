<?php
global $app;

$app->get('/admin/categories', ["admin\CategoryController", "index"]);
$app->get('/admin/categories/main/store', ["admin\CategoryController", "createMainCategory"]);
$app->post('/admin/categories/main/store', ["admin\CategoryController", "storeMainCategory"]);

$app->get('/admin/categories/sub/store', ["admin\CategoryController", "createSubCategory"]);
$app->post('/admin/categories/sub/store', ["admin\CategoryController", "storeSubCategory"]);
$app->delete('/admin/categories/sub/destroy', ["admin\CategoryController", "destroySubCategory"]);

$app->get('/admin/categories/edit', ["admin\CategoryController", "edit"]);
$app->post('/admin/categories/update', ["admin\CategoryController", "update"]);