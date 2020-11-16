<?php declare(strict_types=1);

namespace Acme\Application;

use Acme\Application\OnlineShop\HardCodedProductRepository;
use Acme\OnlineShop\ProductRepository;
use FastRoute\Dispatcher as RouteDispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use mindplay\middleman\Delegate;
use mindplay\middleman\Dispatcher as HttpMiddlewareDispatcher;
use Symfony\Component\Templating\EngineInterface as TemplatingEngine;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\Response\SapiEmitter;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class AcmeDependencies {

    function templatingEngine (): TemplatingEngine {
        return new PhpEngine(new TemplateNameParser(), new FilesystemLoader([__DIR__.'/%name%']));
    }

    function productRepository (): ProductRepository {
        return new HardCodedProductRepository;
    }

    private function router (): RouteDispatcher {
        $factory = new AcmeControllerFactory($this);

        return simpleDispatcher(function (RouteCollector $routing) use ($factory)
        {
            $routing->addRoute('GET', '/', new Delegate([$factory->productsController(), 'handle']));
        });
    }

    function httpRequestDispatcher (): HttpMiddlewareDispatcher {
        $router = $this->router();
        $middlewares = [
            new FastRoute($router),
            new RequestHandler(),
        ];

        return new HttpMiddlewareDispatcher($middlewares);
    }

    function responseEmitter (): EmitterInterface {
        return new SapiEmitter();
    }
}
