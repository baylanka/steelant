<?php
global $app;

$app->get('/test',  ["TestController", "test"]);
$app->get('/migrate', ["AppAssistanceController", "migrate"]);
$app->get('/add_storage_link', ["AppAssistanceController", "linkStorage"]);
$app->get('/remove_storage_link', ["AppAssistanceController", "unlinkStorage"]);