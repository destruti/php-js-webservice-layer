<?php

require '../vendor/autoload.php';

\Slim\Slim::registerAutoloader();

//$app = new \Slim\Slim();
$app = new \Slim\Slim(array( 'debug' => true ));

$worship = new \Slim\Model\Worship();

$app->get('/', function () use ($worship) { $worship->getAllWorships(); });

$app->get('/church', function () use ($worship) { $worship->getAllWorships(); });

$app->get('/worship/:_id', function ($_id) use ($worship) { $worship->viewWorship($_id); });

$app->get('/remove', function () use ($worship) { $worship->remove(); });

$app->post('/addWorship', function () use ($worship) { $worship->addWorship(); });

$app->put('/updateWorship', function () use ($worship) { $worship->updateWorship(); });

$app->delete('/deleteWorship', function () use ($worship) { $worship->deleteWorship(); });

$app->run();