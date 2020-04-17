<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';
include 'bootstrap.php';

use Chatter\Middleware\Logging as ChatterLogging;
use Chatter\Models\Message;

$app = AppFactory::create();
$app->add(new ChatterLogging());

$app->get('/messages', function (Request $request, Response $response, $args) {
    $_message = new Message();

    $messages = $_message->all();

    $payload = [];
    foreach($messages as $_msg) {
        $payload[$_msg->id] = ['body' => $_msg->body, 'user_id' => $_msg->user_id, 'created_at' => $_msg->created_at];
    }

    $payload = json_encode($payload);
    $response->getBody()->write($payload);
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->run();
