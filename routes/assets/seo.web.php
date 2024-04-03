<?php
global $app;

/////////////   connector routes with category for seo friendly  version - en //////////////////////


/// cofferdam

$app->get('/cofferdam/larssen/corner-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/larssen/omega-corner-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/larssen/t-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/larssen/cross-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/larssen/weld-on-connectors',  ["user\ConnectorController", "index"]);

$app->get('/cofferdam/ball+socket/us-corner-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/ball+socket/us-t-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/ball+socket/us-cross-connectors',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/ball+socket/mf-weld-on-connectors',  ["user\ConnectorController", "index"]);

$app->get('/cofferdam/cold_formed/cf-corner-connector',  ["user\ConnectorController", "index"]);
$app->get('/cofferdam/cold_formed/cf-weld_on-connector',  ["user\ConnectorController", "index"]);

/// cofferdam


/// Pipe pile steel walls

$app->get('/pipe-pile-steel-walls/mf',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile-steel-walls/mdf',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile-steel-walls/lbp',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile-steel-walls/fd',  ["user\ConnectorController", "index"]);

/// Pipe pile steel walls


///DTH driving method

$app->get('/dth-driving-method/mf-dth',  ["user\ConnectorController", "index"]);

///DTH driving method


///Pipe pile + sheet pile combined walls

$app->get('/pipe-pile+sheet-pile-combined-walls/l-(larssen)',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/lpb-(larssen)',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/mf-(ball+socket)',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/mdf-(ball+socket)',  ["user\ConnectorController", "index"]);
$app->get('/pipe-pile+sheet-pile-combined-walls/cf-(cold-formed)',  ["user\ConnectorController", "index"]);

/// Pipe pile + sheet pile combined walls



///H-pile walls

$app->get('/h-pile-walls/mf',  ["user\ConnectorController", "index"]);
$app->get('/h-pile-walls/mdf',  ["user\ConnectorController", "index"]);
$app->get('/h-pile-walls/fd',  ["user\ConnectorController", "index"]);

///H-pile walls




///H-pile + sheet pile combined walls

$app->get('/h-pile+sheet-pile-combined-walls/lpb-(larssen)',  ["user\ConnectorController", "index"]);
$app->get('/h-pile+sheet-pile-combined-walls/mf-(ball+socket)',  ["user\ConnectorController", "index"]);
$app->get('/h-pile+sheet-pile-combined-walls/mdf-(ball+socket)',  ["user\ConnectorController", "index"]);

///H-pile + sheet pile combined walls




///Cell structures

$app->get('/cell-structures/fsc',  ["user\ConnectorController", "index"]);

///Cell structures




/////////////   connector routes with category for seo friendly //////////////////////




$app->get('/cofferdam/larssen/Connecteurs-d-angle',  ["user\ConnectorController", "index"]);








