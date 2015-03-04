<?php

require '../vendor/autoload.php';

\Slim\Slim::registerAutoloader();

//$app = new \Slim\Slim();
$app = new \Slim\Slim();

$clientDatabase = new \Slim\Model\clientDatabase();

$app->get('/', function () use ($clientDatabase) { $clientDatabase->getAllClientDatabases(); });

$app->get('/church', function () use ($clientDatabase) { $clientDatabase->getAllClientDatabases(); });

$app->get('/clientDatabase/:_id', function ($_id) use ($clientDatabase) { $clientDatabase->viewClientDatabase($_id); });

$app->get('/remove', function () use ($clientDatabase) { $clientDatabase->remove(); });

$app->get('/removeOne/:_id', function ($_id) use ($clientDatabase) { $clientDatabase->removeOne($_id); });

$app->post('/view', function () use ($clientDatabase) { $clientDatabase->view(); });

$app->post('/addClientDatabase', function () use ($clientDatabase) { $clientDatabase->addClientDatabase(); });

$app->post('/updateClientDatabase', function () use ($clientDatabase) { $clientDatabase->updateClientDatabase(); });

$app->put('/updateClientDatabase', function () use ($clientDatabase) { $clientDatabase->updateClientDatabase(); });

$app->delete('/deleteClientDatabase', function () use ($clientDatabase) { $clientDatabase->deleteClientDatabase(); });

$app->run();