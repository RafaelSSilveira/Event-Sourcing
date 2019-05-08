<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'bootstrap.php';
require_once './src/Controllers/NewEntry.php';
require_once './src/Events/Event.php';

use Controllers\NewEntry as Entry;
use Events\Event as Event;

/**
 * Lista de todos os lancamentos
 */
$app->get('/entry', function (Request $request, Response $response) use ($app) {
    $newEntry = new Entry();
    $newEntry->attach(new Event());
    $newEntry->newEntry();
    $return = $response->withJson(['msg' => 'works!'], 200);
 
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    var_dump($manager);

    return $return;
});

/**
 * Novo Lançamento
 */
$app->post('/entry', function (Request $request, Response $response) use ($app) {
    $return = $response->withJson(['msg' => "Cadastrando um livro"], 201);
    return $return;
});


$app->run();
