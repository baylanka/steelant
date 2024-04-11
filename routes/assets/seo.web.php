<?php
global $app;

/////////////   connector routes with category for seo friendly  version - en //////////////////////


/// cofferdam

$app->get('/cofferdam/larssen/corner-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/larssen/omega-corner-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/larssen/t-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/larssen/cross-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/larssen/weld-on-connectors', ["user\ContentController", "getContentsByCategoryId"]);

$app->get('/cofferdam/ball+socket/us-corner-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/ball+socket/us-t-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/ball+socket/us-cross-connectors', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/ball+socket/mf-weld-on-connectors', ["user\ContentController", "getContentsByCategoryId"]);

$app->get('/cofferdam/cold_formed/cf-corner-connector', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/cofferdam/cold_formed/cf-weld_on-connector', ["user\ContentController", "getContentsByCategoryId"]);

/// cofferdam


/// Pipe pile steel walls

$app->get('/pipe-pile-steel-walls/mf', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile-steel-walls/mdf', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile-steel-walls/lbp', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile-steel-walls/fd', ["user\ContentController", "getContentsByCategoryId"]);

/// Pipe pile steel walls


///DTH driving method

$app->get('/dth-driving-method/mf-dth', ["user\ContentController", "getContentsByCategoryId"]);

///DTH driving method


///Pipe pile + sheet pile combined walls

$app->get('/pipe-pile+sheet-pile-combined-walls/l-(larssen)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/lpb-(larssen)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/mf-(ball+socket)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/mdf-(ball+socket)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/cf-(cold-formed)', ["user\ContentController", "getContentsByCategoryId"]);

/// Pipe pile + sheet pile combined walls


///H-pile walls

$app->get('/h-pile-walls/mf', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/h-pile-walls/mdf', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/h-pile-walls/fd', ["user\ContentController", "getContentsByCategoryId"]);

///H-pile walls


///H-pile + sheet pile combined walls

$app->get('/h-pile+sheet-pile-combined-walls/lpb-(larssen)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/h-pile+sheet-pile-combined-walls/mf-(ball+socket)', ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/h-pile+sheet-pile-combined-walls/mdf-(ball+socket)', ["user\ContentController", "getContentsByCategoryId"]);

///H-pile + sheet pile combined walls


///Cell structures

$app->get('/cell-structures/fsc', ["user\ContentController", "getContentsByCategoryId"]);

///Cell structures


/////////////   connector routes with category for seo friendly //////////////////////


$app->get('/cofferdam/larssen/Connecteurs-d-angle', ["user\ContentController", "getContentsByCategoryId"]);








