<?php

require 'vendor/autoload.php';

\Slim\Slim::registerAutoloader();

//$app = new \Slim\Slim();
$app = new \Slim\Slim(array( 'debug' => true ));

$product = new \Slim\Model\Produtos();

$app->get('/', function () use ($product) { $product->getAllWorships(); });

$app->get('/church', function () use ($product) { $product->getAllWorships(); });

$app->get('/worship/:_id', function ($_id) use ($product) { $product->viewWorship($_id); });

$app->post('/addWorship', function () use ($product) { $product->addWorship(); });

$app->put('/updateWorship', function () use ($product) { $product->updateWorship(); });

$app->delete('/deleteWorship', function () use ($product) { $product->deleteWorship(); });

$app->run();