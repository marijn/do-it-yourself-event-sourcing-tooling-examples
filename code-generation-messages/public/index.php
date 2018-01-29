<?php declare(strict_types = 1);

use Acme\Application\OnlineShop\ProductsController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use mindplay\middleman\Delegate;
use mindplay\middleman\Dispatcher as HttpMiddlewareDispatcher;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$templatingEngine = new PhpEngine(new TemplateNameParser(), new FilesystemLoader([__DIR__.'/../src/Acme/Application/%name%']));
$router = function (RouteCollector $routing) use ($templatingEngine)
{
    $routing->addRoute('GET', '/', new Delegate([new ProductsController($templatingEngine), 'handle']));
};
$middlewares = [
    new FastRoute(simpleDispatcher($router)),
    new RequestHandler(),
];
$dispatcher = new HttpMiddlewareDispatcher($middlewares);
$emitter = new SapiEmitter();

$emitter->emit($dispatcher->dispatch($request));
