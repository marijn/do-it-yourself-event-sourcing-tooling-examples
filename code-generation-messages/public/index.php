<?php declare(strict_types = 1);

use Acme\Application\OnlineShop\ProductsController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use mindplay\middleman\Delegate;
use mindplay\middleman\Dispatcher as HttpMiddlewareDispatcher;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$router = function (RouteCollector $routing)
{
    $routing->addRoute('GET', '/', new Delegate([new ProductsController(), 'handle']));
};
$middlewares = [
    new FastRoute(simpleDispatcher($router)),
    new RequestHandler(),
];
$dispatcher = new HttpMiddlewareDispatcher($middlewares);
$emitter = new SapiEmitter();

$emitter->emit($dispatcher->dispatch($request));
