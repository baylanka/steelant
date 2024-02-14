<?php
global $app;

$app->get('/',  ["controllers/HomeController.php", "index"]);
$app->get('/dashboard',  ["controllers/DashboardController.php", "index"]);