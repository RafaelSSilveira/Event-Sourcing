<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'bootstrap.php';
require_once './src/Controllers/Main.php';
 
use Controllers\Main as Main;

/**
 * New entry
 */
$app->post('/entry', function (Request $request, Response $response) use ($app) {
    $params = (object) $request->getParams();
    $params->status = true;
    $main = new Main();
    $result = $main->newEntry($params);
    $return = $response->withJson([
        'success' => true,
        'msg' => 'New Entry!',
        'data' => [
            'entry_id' => $result
        ]
    ], 200);

    return $return;
});
 
/**
 * Get entrys
 */
$app->get('/entry', function (Request $request, Response $response) use ($app) {
    $main = new Main();
    $result  = $main->getEntry();
    $return = $response->withJson([
        'success' => true,
        'data' => [
            'entrys' => $result
        ]
    ], 200);

    return $return;
});

/**
 * Alter entrys
 */
$app->put('/entry/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $params = (object) $request->getParams();
    $params->status = true;
    $main = new Main();
    $main->newEntry($params, intval($id));
    $return = $response->withJson([
        'success' => true,
        'msg' => 'Altered Entry!',
        'data' => [
            'entry_id' => $id
        ]
    ], 200);

    return $return;
});

/**
 * Delete entrys
 */
$app->delete('/entry/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $main = new Main();
    $main->newEntry(null, intval($id));
    $return = $response->withJson([
        'success' => true,
        'msg' => 'Altered Entry!',
        'data' => [
            'entry_id' => $id
        ]
    ], 200);

    return $return;
});


/**
 * Get Balance
 */
$app->get('/balance', function (Request $request, Response $response) use ($app) {
    $main = new Main();
    $result  = $main->getBalance();
    $return = $response->withJson([
        'success' => true,
        'data' => [
            'balance' => $result
        ]
    ], 200);

    return $return;
});


/**
 * Get Events
 */
$app->get('/events', function (Request $request, Response $response) use ($app) {
    $main = new Main();
    $result  = $main->getEvents();
    $return = $response->withJson([
        'success' => true,
        'data' => [
            'events' => $result
        ]
    ], 200);

    return $return;
});

 
$app->run();
