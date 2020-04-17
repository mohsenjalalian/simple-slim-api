<?php

namespace Chatter\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;


class Logging
{
    /**
     * @param Request $request
     * @param RequestHandler $handler
     * @return \Psr\Http\Message\ResponseInterface|Response
     */
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);

        error_log($request->getMethod() . " ||--|| " . $request->getUri());

        return $response;
    }
}